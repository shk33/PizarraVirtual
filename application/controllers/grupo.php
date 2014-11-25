<?php 

class Grupo extends MY_Controller
{
	
	/**
	 * Muestra todos los grupos
	 * Require TUTOR Level Permition
	 */
	function index($status = '')
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data = array();
		$data['main_content'] = 'grupo_index';
		$data['status'] = $status;
		$this->load->model('grupo_model');
		
		if ($query=$this->grupo_model->get_grupos_by_user_type()) {
			$data['grupos'] =$query;
		}

		$this->load->view('includes/template',$data);

	}

	/**
	 * Muestra el formulario para crear un nuevo grupo
	 * Require TUTOR Level Permition
	 */
	public function create()
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data = array();
		$data['main_content'] = 'grupo_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Show the form for editing the specified grupo.
	 * Require TUTOR Level Permition
	 */
	public function edit($id)
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data= array();
		$data['main_content'] = 'grupo_update';

		$this->load->model('grupo_model');
		$data['grupo']=$this->grupo_model->get_by_id($id);

		$this->load->model('alumno_model');
		$data['not_in_group_alumnos'] = $this->alumno_model->get_alumnos_without_grupo();

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
		$this->form_validation->set_rules('observaciones','Observaciones','trim|required');
		$this->load->model('grupo_model');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'grupo_update';
			$data['grupo']=$this->grupo_model->get_by_id($this->input->post('id'));

			$this->load->model('alumno_model');
			$data['not_in_group_alumnos'] = $this->alumno_model->get_alumnos_without_grupo();

			$this->load->view('includes/template',$data);
		}else{
			$this->grupo_model->update($this->input->post('id'));
			$status = "update_success";
			redirect("grupo/index/$status");
		}
	}

	/**
	* Remove the a Alumno from the grupo
	* Require TUTOR Level Permition
	*/
	function remove_alumno()
	{
		$this->permiso_model->need_tutor_permition_level();	

		$this->load->model('alumno_model');
		$this->alumno_model->remove_grupo($this->input->post('alumno_id'));
		$grupo_id = $this->input->post('grupo_id');

		redirect("grupo/edit/$grupo_id");
	}

	/**
	* Add a array of Alumnos to the grupo
	* Require TUTOR Level Permition
	*/
	function add_alumnos()
	{
		$this->permiso_model->need_tutor_permition_level();	
		
		$grupo_id = $this->input->post('grupo_id'); 
		$this->load->model('alumno_model');

		foreach ($this->input->post() as $alumno => $alumno_id) {
			if ($alumno != "grupo_id") { //One post parameter its the grupi_id and its not an alumno
				$this->alumno_model->assign_grupo($alumno_id, $grupo_id);
			}
		}
		redirect("grupo/edit/$grupo_id");
	}
}