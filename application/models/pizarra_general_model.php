<?php 

/**
* 
*/
class Pizarra_general_model extends CI_model
{
	/*
	* Relationships
	* Will have a Chat
	* Will have a Files
	*/

	function get_unique()
	{
		$query=$this->db->get('pizarra_general');
		$result = $query->result();

		$pizarra = $result[0];

		return $pizarra;
	}

	function update_content($content)
	{
		$pizarra_data = array('contenido' => $content );
		$pizarra = $this->get_unique();

		$this->db->where('id',$pizarra->id);
		$this->db->update('pizarra_general',$pizarra_data);

	}

}