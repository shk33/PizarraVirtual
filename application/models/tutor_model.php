<?php 


class Tutor_model extends CI_Model
{
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
}