<?php 

/**
* 
*/
class Alumno_model extends CI_Model
{
	function getAll()
	{
		$query=$this->db->get('alumno');
		
		return $query->result();
	}

	function save()
	{
		$new_alumno_data = array(
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'matricula' => $this->input->post('matricula'),
				'correo' => $this->input->post('correo'),
				'contrasena' => md5($this->input->post('password'))
			);
		$insert = $this->db->insert('alumno',$new_alumno_data);
		return $insert;
	}
	
}