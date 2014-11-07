<?php 

class Tutor extends MY_Controller
{
	
	/**
	 * Muestra todos los tutores
	 * Require ADMIN Level Permition
	 */
	function index($status = '')
	{
		$this->permiso_model->need_admin_permition_level();	

		$data = array();
		$data['main_content'] = 'tutor_index';
		$data['status'] = $status;
		$this->load->model('tutor_model');

		if ($query=$this->tutor_model->getAll()) {
			$data['tutores'] =$query;
		}

		$this->load->view('includes/template',$data);

	}

	/**
	 * Muestra el formulario para crear un nuevo alumno
	 * Require ADMIN Level Permition
	 */
	public function create()
	{
		$this->permiso_model->need_admin_permition_level();	

		$data = array();
		$data['main_content'] = 'tutor_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo tutor en la base de datos
	 * Require ADMIN Level Permition
	 */
	public function store()
	{
		$this->permiso_model->need_admin_permition_level();	

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('apellido','Apellidos','trim|required');
		$this->form_validation->set_rules('seccion','Seccion','trim|required');
		$this->form_validation->set_rules('correo','Correo','trim|required|valid_email');
		$this->form_validation->set_rules('contrasena','Contraseña','required');
		$this->form_validation->set_rules('contrasena2','Confirmación Contraseña','required|matches[contrasena]');

		$data = array();

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'tutor_create'; 
			$this->load->view('includes/template',$data);
		}else{
			$this->load->model('tutor_model');
			$this->tutor_model->save();
			$status="save_success";

			redirect("tutor/index/$status");			
		}
}
	/**
	 * Show the form for editing the specified tutor.
	 * Require ADMIN Level Permition
	 */
	public function edit($id)
	{
		$this->permiso_model->need_admin_permition_level();	

		$data= array();
		$data['main_content'] = 'tutor_update';
		$this->load->model('tutor_model');
		$data['tutor']=$this->tutor_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 * Require ADMIN Level Permition
	 */
	public function update()
	{
		$this->permiso_model->need_admin_permition_level();	

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('apellido','Apellidos','trim|required');
		$this->form_validation->set_rules('seccion','Seccion','trim|required');
		$this->form_validation->set_rules('correo','Correo','trim|required|valid_email');
		$this->load->model('tutor_model');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'tutor_update';
			$data['tutor']=$this->tutor_model->get_by_id($this->input->post('id'));
			$this->load->view('includes/template',$data);
		}else{
			$this->tutor_model->update($this->input->post('id'));
			$status = "update_success";
			redirect("tutor/index/$status");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * Require ADMIN Level Permition
	 */
	public function destroy($id)
	{
		$this->permiso_model->need_admin_permition_level();	
		
		$this->load->model('tutor_model');
		$this->tutor_model->delete($id);
		$status = "delete_success";
		redirect("tutor/index/$status");
	}
}