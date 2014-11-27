<?php 	

/**
* 
*/
class Archivo_model extends CI_Model
{
	
	/* 	Relationships
	* Archivo belongs_to Plan
	*/

 	function getAll()
	{
		$query=$this->db->get('archivo');

		$archivos = $query->result();
		
		return $archivos;
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('archivo', array('id' => $id));
		
		foreach ($query->result() as $archivo) {
			$found_archivo = $archivo;			
		}

		return $found_archivo;
	}

	function get_all_by_plan_id($plan_id)
	{
		$this->db->where('plan_id' , $plan_id);
		$query = $this->db->get('archivo'); 
		$found_archivo = array();

		$archivos = $query->result();

		return $archivos; 
	}

	function save($archivo_data)
	{
		//$archivo_data = array();
		$insert = $this->db->insert('archivo',$archivo_data);
		return $insert;
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('archivo');
	}

}