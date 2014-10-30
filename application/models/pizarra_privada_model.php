<?php 

/**
* 
*/
class Pizarra_privada_model extends CI_model
{
	/*
	* Relationships
	* Pizarra Privada belongs_to Grupo
	*/

	function getAll()
	{
		$query=$this->db->get('pizarra_privada');
		$pizarras = $query->result();

		$pizarras = $this->insert_model_associations($pizarras);

		return $pizarras;
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('pizarra_privada', array('id' => $id));
		
		foreach ($query->result() as $pizarra) {
			$found_pizarra = $pizarra;			
		}
		return $found_pizarra;
	}

	/*function save()
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
	}*/

	function update($id)
	{
		$pizarra_data = array(
				'nombre'     => $this->input->post('nombre'),
				'contenido'  => $this->input->post('contenido')
			);
		$this->db->where('id',$id);
		$this->db->update('pizarra_privada',$pizarra_data);
	}

	/*function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tutor');
	}*/

	function count_all()
	{
		return $this->db->count_all('pizarra_privada');
	}

	/*
	* Imitates behaviour of belongs_to in Rails in this case
	* Pizarra_privada belongs_to Grupo
	*/
	private function insert_grupo_in_pizarra(&$pizarras)
	{
		$this->load->model('grupo_model');
		
		if (gettype($pizarras) == "array") {
			foreach ($pizarras as $pizarra) {
				if (isset($pizarra->grupo_id)) {
					$grupo = $this->grupo_model->get_by_id($pizarra->grupo_id);
					$pizarra->grupo = $grupo;
				}
			}
		}else{ //Asuming is an single object type
			if (isset($pizarra->grupo_id)) {
				$grupo = $this->grupo_model->get_by_id($pizarras->grupo_id);
				$pizarras->grupo = $grupo;
			}
		}

		return $pizarras;
	}

	/*
	*	Hydrate the object with the others objects of model acoordings its associations
 	*/
	private function insert_model_associations(&$pizarras)
	{
		$pizarras= $this->insert_grupo_in_pizarra($pizarras);

		return $pizarras;
	}

}