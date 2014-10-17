<?php 

class Grupo extends CI_Controller
{
	
	/**
	 * Muestra todos los grupos
	 */
	function index($status = '')
	{
		$data = array();
		$data['main_content'] = 'grupo_index';
		$data['status'] = $status;
		$this->load->model('grupo_model');
		
		if ($query=$this->grupo_model->getAll()) {
			$data['grupos'] =$query;
		}

		$this->load->view('includes/template',$data);

	}

	/**
	 * Muestra el formulario para crear un nuevo grupo
	 */
	public function create()
	{
		$data = array();
		$data['main_content'] = 'grupo_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo grupo en la base de datos
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
			$data['main_content'] = 'grupo_create'; 
			$this->load->view('includes/template',$data);
		}else{
			$this->load->model('grupo_model');
			$this->tutor_model->save();
			$status="save_success";

			redirect("grupo/index/$status");			
		}
}
	/**
	 * Show the form for editing the specified grupo.
	 */
	public function edit($id)
	{
		$data= array();
		$data['main_content'] = 'grupo_update';
		$this->load->model('grupo_model');
		$data['grupo']=$this->grupo_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('observaciones','Observaciones','trim|required');
		$this->load->model('grupo_model');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'grupo_update';
			$data['grupo']=$this->grupo_model->get_by_id($this->input->post('id'));
			$this->load->view('includes/template',$data);
		}else{
			$this->grupo_model->update($this->input->post('id'));
			$status = "update_success";
			redirect("grupo/index/$status");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$this->load->model('grupo_model');
		$this->grupo_model->delete($id);
		$status = "delete_success";
		redirect("grupo/index/$status");
	}

	/**
	* Remove the a Alumno from the grupo
	*/
	function remove_alumno()
	{
		$this->load->model('alumno_model');
		$this->alumno_model->remove_grupo($this->input->post('alumno_id'));
		$grupo_id = $this->input->post('grupo_id');

		redirect("grupo/edit/$grupo_id");
	}
}