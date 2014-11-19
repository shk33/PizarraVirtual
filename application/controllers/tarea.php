<?php 

class Tarea extends MY_Controller
{
	
	/**
	 * Muestra todos los tareas
	 * Require TUTOR Level Permition
	 */
	function index($status = '')
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data = array();
		$data['main_content'] = 'tarea_index';
		$data['status'] = $status;
		$this->load->model('tarea_model');
		
		if ($query=$this->tarea_model->get_tareas_by_user_type()) {
			$data['tareas'] =$query;
		}

		$this->load->view('includes/template',$data);

	}

	/**
	 * Muestra el formulario para crear un nuevo alumno
	 * Require TUTOR Level Permition
	 */
	public function create()
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data = array();
		$data['main_content'] = 'tarea_create';

		if ($this->permiso_model->is_level_admin()) {
			$this->load->model('tutor_model');
			$data['select_tutor'] = $this->tutor_model->get_options_array();
			$data['tutor_id'] = "1";
			$data['is_admin'] = true;
		}else{ //This else assumes is a Tutor
			$data['is_admin'] = false;
			$data['tutor_id'] =$this->session->userdata('userId');
		}

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo tutor en la base de datos
	 * Require TUTOR Level Permition
	 */
	public function store()
	{
		$this->permiso_model->need_tutor_permition_level();	

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('descripcion','descripcion','trim|required');

		$data = array();

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'tarea_create';

			//Add objects to the dropdown according the type of user
			if ($this->permiso_model->is_level_admin()) {
				$this->load->model('tutor_model');
				$data['select_tutor'] = $this->tutor_model->get_options_array();
				$data['tutor_id'] = "1";
				$data['is_admin'] = true;
			}else{ //Assumes its a Tutor user
				$data['is_admin'] = false;
				$data['tutor_id'] =$this->session->userdata('userId');
			} 

			$this->load->view('includes/template',$data);
		}else{ //All Validations were correct
			$this->load->model('tarea_model');
			$this->tarea_model->save();
			$status="save_success";

			redirect("tarea/index/$status");			
		}
}
	/**
	 * Show the form for editing the specified tarea.
	 * Require TUTOR Level Permition
	 */
	public function edit($id)
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data= array();
		$data['main_content'] = 'tarea_update';
		$this->load->model('tarea_model');
		$data['tarea']=$this->tarea_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 * Require TUTOR Level Permition
	 */
	public function update()
	{
		$this->permiso_model->need_tutor_permition_level();	

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('descripcion','Descripción','trim|required');
		//$this->form_validation->set_rules('contrasena','Contraseña','trim|required');
		$this->load->model('tarea_model');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'tarea_update';
			$data['tarea']=$this->tarea_model->get_by_id($this->input->post('id'));
			$this->load->view('includes/template',$data);
		}else{
			$this->tarea_model->update($this->input->post('id'));
			$status = "update_success";
			redirect("tarea/index/$status");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * Require TUTOR Level Permition
	 */
	public function destroy($id)
	{
		$this->permiso_model->need_tutor_permition_level();	
		
		$this->load->model('tarea_model');
		$this->tarea_model->delete($id);
		$status = "delete_success";
		redirect("tarea/index/$status");
	}
}