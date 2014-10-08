<?php 

/**
* 
*/
class Alumno extends CI_Controller
{
	
	/**
	 * Muestra todos los alumnos
	 */
	function index($success=false)
	{
		$data = array();
		$data['main_content'] = 'alumno_index';
		$data['success'] = $success; //Quickfix to show wheter a new alumno has been created or not
		$this->load->model('alumno_model');
		
		if ($query=$this->alumno_model->getAll()) {
			$data['alumnos'] =$query;
		}

		$this->load->view('includes/template',$data);
	}

	/**
	 * Muestra el formulario para crear un nuevo alumno
	 */
	public function create()
	{
		$data = array();
		$data['main_content'] = 'alumno_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo alumno en la base de datos
	 */
	public function store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('apellido','Apellidos','trim|required');
		$this->form_validation->set_rules('matricula','Matricula','trim|required');
		//$this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
		$this->form_validation->set_rules('correo','Correo','trim|required|valid_email');
		$this->form_validation->set_rules('contrasena','Contraseña','trim|required');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'alumno_create'; 
			$this->load->view('includes/template',$data);
		}else{
			$this->load->model('alumno_model');
			$this->alumno_model->save();
			redirect('alumno/index/true');		
		}
}
	/**
	 * Show the form for editing the specified alumno.
	 */
	public function edit($id)
	{
		$data= array();
		$data['main_content'] = 'alumno_update';
		$this->load->model('alumno_model');
		$data['alumno']=$this->alumno_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update($id)
	{
		$this->load->model('alumno_model');
		$this->alumno_model->update($this->input->post('id'));
		redirect('alumno/');	
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