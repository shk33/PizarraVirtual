<?php 

class Tarea extends MY_Controller
{
	
	/**
	 * Muestra todos los tareas
	 */
	function index($status = '')
	{
		$data = array();
		$data['main_content'] = 'tarea_index';
		$data['status'] = $status;
		$this->load->model('tarea_model');
		
		if ($query=$this->tarea_model->getAll()) {
			$data['tareas'] =$query;
		}

		$this->load->view('includes/template',$data);

	}

	/**
	 * Muestra el formulario para crear un nuevo alumno
	 */
	public function create()
	{
		$data = array();
		$data['main_content'] = 'tarea_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo tutor en la base de datos
	 */
	public function store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('descripcion','descripcion','trim|required');

		$data = array();

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'tarea_create'; 
			$this->load->view('includes/template',$data);
		}else{
			$this->load->model('tarea_model');
			$this->tarea_model->save();
			$status="save_success";

			redirect("tarea/index/$status");			
		}
}
	/**
	 * Show the form for editing the specified tutor.
	 */
	public function edit($id)
	{
		$data= array();
		$data['main_content'] = 'tarea_update';
		$this->load->model('tarea_model');
		$data['tarea']=$this->tarea_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update()
	{
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
	 */
	public function destroy($id)
	{
		$this->load->model('tarea_model');
		$this->tarea_model->delete($id);
		$status = "delete_success";
		redirect("tarea/index/$status");
	}
}