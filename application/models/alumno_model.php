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

	function get_by_id($id)
	{
		$query = $this->db->get_where('alumno', array('id' => $id));
		
		foreach ($query->result() as $alumno) {
			$found_alumno = $alumno;			
		}
		return $found_alumno;
	}

	function save()
	{
		$new_alumno_data = array(
				'nombre'     => $this->input->post('nombre'),
				'apellido'   => $this->input->post('apellido'),
				'matricula'  => $this->input->post('matricula'),
				'correo'     => $this->input->post('correo'),
				'contrasena' => md5($this->input->post('password'))
			);
		$insert = $this->db->insert('alumno',$new_alumno_data);
		return $insert;
	}

	function update($id)
	{
		$alumno_data = array(
				'nombre'     => $this->input->post('nombre'),
				'apellido'   => $this->input->post('apellido'),
				'matricula'  => $this->input->post('matricula'),
				'correo'     => $this->input->post('correo'),
				'contrasena' => md5($this->input->post('password'))
			);
		$this->db->where('id',$id);
		$this->db->update('alumno',$alumno_data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('alumno');
	}
}