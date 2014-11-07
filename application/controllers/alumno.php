<?php 

/**
* 
*/
class Alumno extends MY_Controller
{
	
	/**
	 * Muestra todos los alumnos
	 * Require TUTOR Level Permition
	 */
	function index($status = '')
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data = array();
		$data['main_content'] = 'alumno_index';
		$data['status'] = $status;
		$this->load->model('alumno_model');
		
		if ($query = $this->alumno_model->get_alumnos_by_user_type()) {
			$data['alumnos'] = $query;
		}

		$this->load->view('includes/template',$data);
	}

	/**
	 * Muestra el formulario para crear un nuevo alumno
	 * Require ADMIN Level Permition
	 */
	function create()
	{
		$this->permiso_model->need_admin_permition_level();	

		$data = array();
		$data['main_content'] = 'alumno_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo alumno en la base de datos
	 * Require ADMIN Level Permition
	 */
	function store()
	{
		$this->permiso_model->need_admin_permition_level();	

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('apellido','Apellidos','trim|required');
		$this->form_validation->set_rules('matricula','Matricula','trim|required');
		$this->form_validation->set_rules('correo','Correo','trim|required|valid_email');
		$this->form_validation->set_rules('contrasena','Contraseña','trim|required');
		$this->form_validation->set_rules('contrasena2','Confirmación Contraseña','required|matches[contrasena]');
		
		$data = array();

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'alumno_create'; 
			$this->load->view('includes/template',$data);
		}else{
			$this->load->model('alumno_model');
			$this->alumno_model->save();
			$status="save_success";

			redirect("alumno/index/$status");			
		}
}
	/**
	 * Show the form for editing the specified alumno.
	 * Require ADMIN Level Permition
	 */
	function edit($id)
	{
		$this->permiso_model->need_admin_permition_level();	

		$data= array();
		$data['main_content'] = 'alumno_update';
		$this->load->model('alumno_model');
		$data['alumno']=$this->alumno_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 * Require ADMIN Level Permition
	 */
	function update()
	{
		$this->permiso_model->need_admin_permition_level();	

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
	 * Require ADMIN Level Permition
	 */
	function destroy($id)
	{
		$this->permiso_model->need_admin_permition_level();	
		
		$this->load->model('alumno_model');
		$this->alumno_model->delete($id);
		redirect('alumno/');	
	}

}