<?php 	

/**
* 
*/
class Grupo_model extends CI_Model
{
	
	/* 	Relationships
	*	Grupo has_many Alumno
	* Grupo belongs_to Plan
	*/

 	function getAll()
	{
		$query=$this->db->get('grupo');

		$grupos = $query->result();

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

	function get_all_alumnos_from_grupo($grupo_id)
		{
			$query = $this->db->get_where('grupo', array('grupo_id' => $grupo_id));

			return $query->result();
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
			$alumnos = $this->alumno_model->get_all_alumnos_from_grupo($grupos->id);
			$grupos->alumnos = $alumnos;
		}
		
		return $grupos;
	}

	/*
	*	Hydrate the object with the others objects of model acoordings its associations
 	*/
	private function insert_model_associations(&$grupos)
	{
		$grupos= $this->insert_plan_in_grupo($grupos);
		$grupos= $this->insert_alumnos_in_grupo($grupos);

		return $grupos;
	}
}