<?php 

 /**
 * 
 */
 class Plan_model extends CI_model
 {
 	/* 	Relationships
	* Plan belongs_to Tarea
	* Plan has_one Grupo
	*/

	function get_planes_by_user_type()
	{
		$planes;
		if ($this->permiso_model->is_level_admin()) {
			$planes = $this->getAll();
		}

		if ($this->permiso_model->is_level_tutor()) {
			$tutor_id = $this->session->userdata("userId");
			$planes = $this->get_planes_by_tutor($tutor_id);
		}

		return $planes;
	}

 	function getAll()
	{
		$query=$this->db->get('plan');

		$planes = $query->result();

		$planes = $this->insert_model_associations($planes);
		
		return $planes;
	}

	function get_ruta_carpeta($plan_id)
	{
		$query=$this->db->select('ruta_carpeta')->where('id',$plan_id)->get('plan');

		$plan_array = $query->result();

		$ruta_carpeta = $plan_array[0]->ruta_carpeta;

		return $ruta_carpeta;
	}

	function get_planes_by_tutor($tutor_id)
	{
		$this->load->model('tarea_model');
		$tareas = $this->tarea_model->get_by_tutor_id($tutor_id);

		$all_planes = array();
		$partial_planes = array();
		$i = 0;

		foreach ($tareas as $tarea) {
			$planes = $tarea->planes;

			if (isset($planes)) {

				$partial_planes[$i] = $planes;
				$all_planes = array_merge( $all_planes, $partial_planes[$i] );  
				$i++;

			}//end if
			
		} //end foreach
		
		$all_planes = $this->insert_model_associations($all_planes);

		return $all_planes;

	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('plan', array('id' => $id));
		
		foreach ($query->result() as $plan) {
			$found_plan = $plan;			
		}

		$found_plan = $this->insert_model_associations($found_plan);

		return $found_plan;
	}

	function save()
	{
		//Creates the Plan Model
		$new_plan_data = array(
				'nombre'       => $this->input->post('nombre'),
				'materiales'   => $this->input->post('materiales'),
				'tarea_id'     => $this->input->post('tarea_id')
			);
		$insert = $this->db->insert('plan',$new_plan_data);
		$plan_id = $this->db->insert_id(); //Gets the last id inserted

		$this->insert_file_folder_upload_path($plan_id);

		//Then creates the Grupo belonging to this Plan
		//A Grupo is totally dependent of Plan
		$new_grupo_data = array(
				'nombre'     => "Grupo de ".$new_plan_data['nombre'],
				'plan_id'    => $plan_id
			);
		$this->load->model('grupo_model');
		$this->grupo_model->save($new_grupo_data);

		//Then creates the Pizarra Privada belonging to the new Grupo
		//A Pizarra Privada is totally dependent of a Grupo
		$grupo_id = $this->db->insert_id();

		$new_pizarra_data = array(
				'nombre'     => "Pizarra de ".$new_plan_data['nombre'],
				'grupo_id'   => $grupo_id //Gets the last id inserted
			);
		$this->load->model('pizarra_privada_model');
		$this->pizarra_privada_model->save($new_pizarra_data);

		//Then creates the Chat belonging to the new Grupo
		//A Chat is totally dependent of a Grupo
		$new_chat_data = array(
				'grupo_id'   => $grupo_id //Gets the last id inserted
			);
		$this->load->model('chat_model');
		$this->chat_model->save($new_chat_data);

		return $insert;
	}

	function update($id)
	{
		$plan_data = array(
				'nombre'     => $this->input->post('nombre'),
				'materiales'   => $this->input->post('materiales'),
			);
		$this->db->where('id',$id);
		$this->db->update('plan',$plan_data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('plan');
	}

	function get_all_planes_from_tarea($tarea_id)
	{
		$query = $this->db->get_where('plan', array('tarea_id' => $tarea_id));

		return $query->result();
	}

	//Insert the route where the files will be uploaded and create the folder
	private function insert_file_folder_upload_path($plan_id)
	{
		$ruta_carpeta = "uploads/planes/$plan_id";

		//Creating the folder first
		mkdir($ruta_carpeta,0777,TRUE);

		$plan_data = array(
				'ruta_carpeta'  => $ruta_carpeta
			);
		$this->db->where('id',$plan_id);
		$this->db->update('plan',$plan_data);
	}

	/*
	* Imitates behaviour of belongs_to in Rails in this case
	* Plan belongs_to Tarea
	*/
	private function insert_tarea_in_plan(&$planes)
	{
		$this->load->model('tarea_model');
		
		if (gettype($planes) == "array") {
			foreach ($planes as $plan) {
				$tarea = $this->tarea_model->get_by_id($plan->tarea_id);
				$plan->tarea = $tarea;
			}
		}else{ //Asuming is an single object type
			$tarea = $this->tarea_model->get_by_id($planes->tarea_id);
			/*var_dump($planes->ruta_carpeta);
			die();*/
			$planes->tarea = $tarea;
		}

		return $planes;
	}

	/*
	*	Hydrate the object with the others objects of model acoordings its associations
 	*/
	private function insert_model_associations(&$planes)
	{
		$planes= $this->insert_tarea_in_plan($planes);
		//$planes= $this->insert_grupo_in_plan($planes);

		return $planes;
	}

 }