<?php 

/**
* 
*/
class Alumno_model extends CI_model
{
	/* 	Relationships
	*	 Alumnos belongs_to Grupo
	*/
	function getAll()
	{
		$query=$this->db->get('alumno');

		$alumnos = $query->result();

		$alumnos = $this->insert_model_associations($alumnos);
		
		return $alumnos;
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('alumno', array('id' => $id));
		
		foreach ($query->result() as $alumno) {
			$found_alumno = $alumno;			
		}

		$found_alumno = $this->insert_model_associations($found_alumno);

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

	function get_all_alumnos_from_grupo($grupo_id)
	{
		$query = $this->db->get_where('alumno', array('grupo_id' => $grupo_id));

		return $query->result();
	}

	function remove_grupo($alumno_id)
	{
		$alumno_data = array(
				'grupo_id'   => NULL
			);
		$this->db->where('id',$alumno_id);
		$this->db->update('alumno',$alumno_data);
	}

	function assign_grupo($alumno_id,$grupo_id)
	{
		$alumno_data = array(
				'grupo_id'   => $grupo_id
			);
		$this->db->where('id',$alumno_id);
		$this->db->update('alumno',$alumno_data);	
	}

	function get_alumnos_without_grupo()
	{
		$query = $this->db->get_where('alumno', array('grupo_id' => NULL));

		$alumnos = $query->result();

		return $alumnos;
	}

	/*
	* Rails Active Record Associations imitations starts here
	*/

	/*
	* Imitates behaviour of belongs_to in Rails in this case
	* Alumno belongs_to Grupo
	*/
	private function insert_grupo_in_alumno(&$alumnos)
	{
		$this->load->model('grupo_model');
		
		if (gettype($alumnos) == "array") {
			foreach ($alumnos as $alumno) {
				if (isset($alumno->grupo_id)) {
					$grupo = $this->grupo_model->get_by_id($alumno->grupo_id);
					$alumno->grupo = $grupo;
				}
			}
		}else{ //Asuming is an single object type
			if (isset($alumno->grupo_id)) {
				$grupo = $this->grupo_model->get_by_id($alumnos->grupo_id);
				$alumnos->grupo = $grupo;
			}
		}

		return $alumnos;
	}

	/*
	*	Hydrate the object with the others objects of model acoordings its associations
 	*/
	private function insert_model_associations(&$alumnos)
	{
		$alumnos= $this->insert_grupo_in_alumno($alumnos);

		return $alumnos;
	}
}