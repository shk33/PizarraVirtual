<?php 	

/**
* 
*/
class Grupo_model extends CI_Model
{
	
	/* 	Relationships
	*	Grupo has_many Alumno
	* Grupo has_one Pizarra_Privada
	* Grupo belongs_to Plan
	*/
	function get_grupos_by_user_type()
	{
		$grupos = array();

		if ($this->permiso_model->is_level_admin()) {
			$grupos = $this->getAll();
		}

		if ($this->permiso_model->is_level_tutor()) {
			$tutor_id = $this->session->userdata("userId");
			$grupos = $this->get_grupos_by_tutor($tutor_id);
		}

		return $grupos;
	}

 	function getAll()
	{
		$query=$this->db->get('grupo');

		$grupos = $query->result();

		$grupos = $this->insert_model_associations($grupos);
		
		return $grupos;
	}

	function get_grupos_by_tutor($tutor_id)
	{
		$this->load->model('tarea_model');
		$this->load->model('grupo_model');
		$tareas = $this->tarea_model->get_by_tutor_id($tutor_id);

		$grupos = array();

		foreach ($tareas as $tarea) {
			$planes = $tarea->planes; 

			if (isset($planes)) {

				foreach ($planes as $plan) {

					$grupo = $this->grupo_model->get_by_plan_id($plan->id);

					if ($grupo) {
						$grupos[] = $grupo;
					} //end if

				} //end foreach

			}//end if

		} //end foreach

		$grupos = $this->insert_model_associations($grupos);

		return $grupos;

	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('grupo', array('id' => $id));
		
		foreach ($query->result() as $grupo) {
			$found_grupo = $grupo;			
		}

		$found_grupo = $this->insert_model_associations($found_grupo);
		return $found_grupo;
	}

	function get_by_plan_id($plan_id)
	{
		$this->db->where('plan_id' , $plan_id);
		$query = $this->db->get('grupo'); 
		$found_grupo = array();

		$grupo = $query->result();

		if ($grupo) {
			$found_grupo = $grupo[0]; //Getting the first element

			$found_grupo = $this->insert_alumnos_in_grupo($found_grupo);
			$found_grupo = $this->insert_pizarra_in_grupo($found_grupo);
		}
		
		return $found_grupo; 
	}

	function save($grupo_data)
	{
		$insert = $this->db->insert('grupo',$grupo_data);
		return $insert;
	}

	function update($id)
	{
		$grupo_data = array(
				'nombre'     => $this->input->post('nombre'),
				'observaciones'   => $this->input->post('observaciones')
			);
		$this->db->where('id',$id);
		$this->db->update('grupo',$grupo_data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('plan');
	}

	function count_all()
	{
		return $this->db->count_all('grupo');
	}
	/*
	* Rails Active Record Associations imitations starts here
	*/

	/*
	* Imitates behaviour of belongs_to in Rails in this case
	* Grupo belongs_to Plan
	*/
	private function insert_plan_in_grupo(&$grupos)
	{
		$this->load->model('plan_model');
		
		if (gettype($grupos) == "array") {
			foreach ($grupos as $grupo) {
				$plan = $this->plan_model->get_by_id($grupo->plan_id);
				$grupo->plan = $plan;
			}
		}else{ //Asuming is an single object type
			$plan = $this->plan_model->get_by_id($grupos->plan_id);
			$grupos->plan = $plan;
		}

		return $grupos;
	}

	/*
	* Imitates behaviour of has_many in Rails in this case
	* Grupo has_many Alumnos
	*/
	private function insert_alumnos_in_grupo(&$grupos)
	{
		$this->load->model('alumno_model');

		if (gettype($grupos) == "array") {
			foreach ($grupos as $grupo) {
				$alumnos = $this->alumno_model->get_all_alumnos_from_grupo($grupo->id);
				$grupo->alumnos = $alumnos;
			}
		}else{ //Asuming is an object type
			//echo $grupos->id;
			$alumnos = $this->alumno_model->get_all_alumnos_from_grupo($grupos->id);
			$grupos->alumnos = $alumnos;
		}
		
		return $grupos;
	}

	/*
	* Imitates behaviour of has_one in Rails in this case
	* Grupo has_one Pizarra_Privada
	*/
	private function insert_pizarra_in_grupo(&$grupos)
	{
		$this->load->model('pizarra_privada_model');

		if (gettype($grupos) == "array") {
			foreach ($grupos as $grupo) {
				$pizarra = $this->pizarra_privada_model->get_by_grupo($grupo->id);
				$grupo->pizarra_privada = $pizarra;
			}
		}else{ //Asuming is an object type
			$pizarra = $this->pizarra_privada_model->get_by_grupo($grupos->id);
			$grupos->pizarra_privada = $pizarra;
		}
		
		return $grupos;
	}

	/*
	*	Hydrate the object with the others objects of model acoordings its associations
 	*/
	private function insert_model_associations(&$grupos)
	{
		$grupos = $this->insert_plan_in_grupo($grupos);
		$grupos = $this->insert_alumnos_in_grupo($grupos);
		$grupos = $this->insert_pizarra_in_grupo($grupos);

		return $grupos;
	}
}