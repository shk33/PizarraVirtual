<?php 

class Tutor extends CI_Controller
{
	
	/**
	 * Muestra todos los tutores
	 */
	function index($status = '')
	{
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
	 */
	public function create()
	{
		$data = array();
		$data['main_content'] = 'tutor_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo tutor en la base de datos
	 */
	public function store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('apellido','Apellidos','trim|required');
		$this->form_validation->set_rules('seccion','Seccion','trim|required');
		$this->form_validation->set_rules('correo','Correo','trim|required|valid_email');
		$this->form_validation->set_rules('contrasena','Contraseña','trim|required');

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
	 */
	public function edit($id)
	{
		$data= array();
		$data['main_content'] = 'tutor_update';
		$this->load->model('tutor_model');
		$data['tutor']=$this->tutor_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('apellido','Apellidos','trim|required');
		$this->form_validation->set_rules('matricula','Matricula','trim|required');
		$this->form_validation->set_rules('correo','Correo','trim|required|valid_email');
		//$this->form_validation->set_rules('contrasena','Contraseña','trim|required');
		$this->load->model('alumno_model');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'alumno_update';
			$data['alumno']=$this->alumno_model->get_by_id($this->input->post('id'));
			$this->load->view('includes/template',$data);
		}else{
			$this->alumno_model->update($this->input->post('id'));
			$status = "update_success";
			redirect("alumno/index/$status");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$this->load->model('alumno_model');
		$this->alumno_model->delete($id);
		redirect('alumno/');	
	}
}