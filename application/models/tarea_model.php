<?php 


class Tarea_model extends CI_Model
{

	/* 	Relationships
	* Tarea belongs_to Tutor
	*	Tarea has_many Plan
	*/

	function get_tareas_by_user_type()
	{
		$tareas = array();
		
		if ($this->permiso_model->is_level_admin()) {
			$tareas = $this->getAll();
		}

		if ($this->permiso_model->is_level_tutor()) {
			$tutor_id = $this->session->userdata("userId");
			$tareas = $this->get_by_tutor_id($tutor_id);
		}

		return $tareas;
	}

	function getAll()
	{
		$query=$this->db->get('tarea');

		$tareas = $query->result();
		$tareas = $this->insert_model_associations($tareas);

		return $tareas;
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('tarea', array('id' => $id));
		
		foreach ($query->result() as $tarea) {
			$found_tarea = $tarea;			
		}
		$this->insert_model_associations($found_tarea);
		return $found_tarea;
	}

	function get_by_tutor_id($tutor_id)
	{
		$query = $this->db->get_where('tarea', array('tutor_id' => $tutor_id));
		
		$tareas = $query->result();
		$this->insert_model_associations($tareas);

		return $query->result();
	}

	function save()
	{
		$new_tarea_data = array(
				'nombre'     => $this->input->post('nombre'),
				'descripcion'   => $this->input->post('descripcion')
			);
		$insert = $this->db->insert('tarea',$new_tarea_data);
		return $insert;
	}

	function update($id)
	{
		$tarea_data = array(
				'nombre'     => $this->input->post('nombre'),
				'descripcion'   => $this->input->post('descripcion')
				);
		$this->db->where('id',$id);
		$this->db->update('tarea',$tarea_data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tarea');
	}
	/*End of basic CRUD functionality*/

	function get_options_array()
	{
		$options = array();

		foreach ($this->getAll() as $tarea) {
			$options[$tarea->id] = $tarea->nombre;
		}

		return $options;
		
	}

	function get_all_tareas_from_tutor($tutor_id)
	{
		$query = $this->db->get_where('tarea', array('tutor_id' => $tarea_id));

		return $query->result();
	}

	function count_all()
	{
		return $this->db->count_all('tarea');
	}

	/*
	* Rails Active Record Associations imitations starts here
	*/

	/*
	* Imitates behaviour of has_many in Rails in this case
	* Tarea has_many Plan
	*/
	private function insert_planes_in_tarea(&$tareas)
	{
		$this->load->model('plan_model');

		if (gettype($tareas) == "array") {
			foreach ($tareas as $tarea) {
				$planes = $this->plan_model->get_all_planes_from_tarea($tarea->id);
				$tarea->planes = $planes;
			}
		}else{ //Asuming is an object type
			$planes = $this->plan_model->get_all_planes_from_tarea($tareas->id);
			$tareas->planes = $planes;
		}
		
		return $tareas;
	}

	/*
	* Imitates behaviour of belongs_to in Rails in this case
	* Tarea belongs_to Tutor
	*/
	private function insert_tutor_in_tarea(&$tareas)
	{
		$this->load->model('tutor_model');
		
		if (gettype($tareas) == "array") {
			foreach ($tareas as $tarea) {
				$tutor = $this->tutor_model->get_by_id($tarea->tutor_id);
				$tarea->tutor = $tutor;
			}
		}else{ //Asuming is an single object type
			$tutor = $this->tutor_model->get_by_id($tareas->tutor_id);
			/*var_dump($tareas->ruta_carpeta);
			die();*/
			$tareas->tutor = $tutor;
		}

		return $tareas;
	}

	/*
	*	Hydrate the object with the others objects of model acoordings its associations
 	*/
	private function insert_model_associations(&$tareas)
	{
		$tareas= $this->insert_planes_in_tarea($tareas);
		$tareas= $this->insert_tutor_in_tarea($tareas);

		return $tareas;
	}
	
}