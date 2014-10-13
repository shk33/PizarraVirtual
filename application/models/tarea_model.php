<?php 


class Tarea_model extends CI_Model
{

	/* 	Relationships
	*	Tarea has_many Plan
	*/

	function getAll()
	{
		$query=$this->db->get('tarea');

		$tareas = $query->result();
		$tareas= $this->insert_planes_in_tarea($tareas);
		
		return $query->result();
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('tarea', array('id' => $id));
		
		foreach ($query->result() as $tarea) {
			$found_tarea = $tarea;			
		}
		$found_tarea= $this->insert_planes_in_tarea($found_tarea);
		return $found_tarea;
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
	
}