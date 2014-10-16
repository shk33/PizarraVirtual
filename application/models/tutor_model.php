<?php 


class Tutor_model extends CI_Model
{
	/* 	Relationships
	*		Tutor has_many Tarea
	*/
	function getAll()
	{
		$query=$this->db->get('tutor');
		
		return $query->result();
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('tutor', array('id' => $id));
		
		foreach ($query->result() as $tutor) {
			$found_tutor = $tutor;			
		}
		return $found_tutor;
	}

	function save()
	{
		$new_tutor_data = array(
				'nombre'     => $this->input->post('nombre'),
				'apellido'   => $this->input->post('apellido'),
				'seccion'  => $this->input->post('seccion'),
				'correo'     => $this->input->post('correo'),
				'contrasena' => md5($this->input->post('password'))
			);
		$insert = $this->db->insert('tutor',$new_tutor_data);
		return $insert;
	}

	function update($id)
	{
		$tutor_data = array(
				'nombre'     => $this->input->post('nombre'),
				'apellido'   => $this->input->post('apellido'),
				'seccion'  => $this->input->post('seccion'),
				'correo'     => $this->input->post('correo'),
				'contrasena' => md5($this->input->post('password'))
			);
		$this->db->where('id',$id);
		$this->db->update('tutor',$tutor_data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tutor');
	}

	/*
	* Imitates behaviour of has_many in Rails in this case
	* Tutor has_many Tarea
	*/
	private function insert_tareas_in_tutor(&$tutores)
	{
		$this->load->model('tarea_model');

		if (gettype($tutores) == "array") {
			foreach ($tutores as $tutor) {
				$tareas = $this->tarea_model->get_all_tareas_from_tutor($tutor->id);
				$tutor->tareas = $tareas;
			}
		}else{ //Asuming is an object type
			$tareas = $this->plan_model->get_all_tareas_from_tarea($tutores->id);
			$tutores->tareas = $tareas;
		}
		
		return $tutores;
	}
}