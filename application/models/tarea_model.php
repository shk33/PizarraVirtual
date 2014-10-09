<?php 


class Tarea_model extends CI_Model
{
	function getAll()
	{
		$query=$this->db->get('tarea');
		
		return $query->result();
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('tarea', array('id' => $id));
		
		foreach ($query->result() as $tarea) {
			$found_tarea = $tarea;			
		}
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
	
}