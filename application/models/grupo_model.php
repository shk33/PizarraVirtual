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

	function save()
	{
		$new_plan_data = array(
				'nombre'     => $this->input->post('nombre'),
				'materiales'   => $this->input->post('materiales'),
				'ruta_carpeta'  => $this->input->post('ruta_carpeta'),
				'tarea_id'     => $this->input->post('tarea_id')
			);
		$insert = $this->db->insert('plan',$new_plan_data);
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
	*	Hydrate the object with the others objects of model acoordings its associations
 	*/
	private function insert_model_associations(&$grupos)
	{
		$grupos= $this->insert_plan_in_grupo($grupos);

		return $grupos;
	}
}