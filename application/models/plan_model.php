<?php 

 /**
 * 
 */
 class Plan_model extends CI_model
 {
 	/* 	Relationships
	*	Plan belongs_to Tarea
	*/

 	function getAll()
	{
		$query=$this->db->get('plan');

		$planes = $query->result();

		$planes = $this->insert_tarea_in_plan($planes);
		
		return $planes;
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('plan', array('id' => $id));
		
		foreach ($query->result() as $plan) {
			$found_plan = $plan;			
		}
		return $found_plan;
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

	function get_all_planes_from_tarea($tarea_id)
	{
		$query = $this->db->get_where('plan', array('tarea_id' => $tarea_id));

		return $query->result();
	}

	/*
	* Imitates behaviour of belongs_to in Rails in this case
	* Plan belongs_to Tarea
	*/
	private function insert_tarea_in_plan(&$planes)
	{
		$this->load->model('tarea_model');
		
		foreach ($planes as $plan) {
			$tarea = $this->tarea_model->get_by_id($plan->tarea_id);
			$plan->tarea = $tarea;
		}

		return $planes;
	}

 }