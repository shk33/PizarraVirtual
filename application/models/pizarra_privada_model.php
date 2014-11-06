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

	function get_pizarras_by_user_type()
	{
		$pizarras = array();

		if ($this->permiso_model->is_level_admin()) {
			$pizarras = $this->getAll();
		}

		if ($this->permiso_model->is_level_tutor()) {
			$tutor_id = $this->session->userdata("userId");
			$pizarras = $this->get_pizarras_by_tutor($tutor_id);
		}

		return $pizarras;
	}

	function getAll()
	{
		$query=$this->db->get('pizarra_privada');
		$pizarras = $query->result();

		$pizarras = $this->insert_model_associations($pizarras);

		return $pizarras;
	}

	function get_pizarras_by_tutor($tutor_id)
	{
		$this->load->model('tarea_model');
		$this->load->model('grupo_model');
		$tareas = $this->tarea_model->get_by_tutor_id($tutor_id);

		$pizarras = array();

		foreach ($tareas as $tarea) {
			$planes = $tarea->planes; 

			if (isset($planes)) {

				foreach ($planes as $plan) {

					$grupo = $this->grupo_model->get_by_plan_id($plan->id);
					
					if ($grupo) {
						$pizarras[] = $grupo->pizarra_privada;
					} //end if

				} //end foreach

			}//end if

		} //end foreach

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

	function get_by_grupo($grupo_id)
	{
		$query = $this->db->get_where('pizarra_privada', array('grupo_id' => $grupo_id));
		
		foreach ($query->result() as $pizarra) {
			$found_pizarra = $pizarra;			
		}

		return $found_pizarra;
	}

	function save($grupo_data)
	{
		$insert = $this->db->insert('pizarra_privada',$grupo_data);
		return $insert;
	}

	function update($id)
	{
		$pizarra_data = array(
				'nombre'     => $this->input->post('nombre'),
				'contenido'  => $this->input->post('contenido')
			);
		$this->db->where('id',$id);
		$this->db->update('pizarra_privada',$pizarra_data);
	}

	function update_content($id,$content)
	{
		$pizarra_data = array('contenido' => $content );

		$this->db->where('id',$id);
		$this->db->update('pizarra_privada',$pizarra_data);

	}

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