<?php 

class Pizarra_privada extends MY_Controller
{
	
	/**
	 * Muestra todos las pizarras privadas
	 * Require TUTOR Level Permition
	 */
	function index($status = '')
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data = array();
		$data['main_content'] = 'pizarra_privada_index';
		$data['status'] = $status;
		$this->load->model('pizarra_privada_model');
		
		if ($query=$this->pizarra_privada_model->get_pizarras_by_user_type()) {
			$data['pizarras'] =$query;
		}

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
		$data['main_content'] = 'pizarra_privada_update';

		$this->load->model('pizarra_privada_model');
		$data['pizarra_privada']=$this->pizarra_privada_model->get_by_id($id);

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
		$this->form_validation->set_rules('contenido','Contenido','trim|required');

		$this->load->model('pizarra_privada_model');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'pizarra_privada_update';
			$data['pizarra_privada']=$this->pizarra_privada_model->get_by_id($this->input->post('id'));

			$this->load->view('includes/template',$data);
		}else{
			$this->pizarra_privada_model->update($this->input->post('id'));
			$status = "update_success";
			redirect("pizarra_privada/index/$status");
		}
	}

	/*
	* Show the pizarra virtual in a colaborative mode
	* Require ALUMNO Level Permition
	*/
	public function vista_colaborativa($pizarra_id)
	{
		$this->permiso_model->need_alumno_permition_level();	

		$data= array();
		$data['main_content'] = 'pizarra_privada_vista_colaborativa';

		$this->load->model('pizarra_privada_model');
		$this->load->model('message_model');

		$pizarra = $this->pizarra_privada_model->get_by_id($pizarra_id);

		$data['pizarra'] = $pizarra;
		$data['last_message'] = $this->message_model->get_last_message_from_chat($pizarra->grupo->chat->id);

		$this->load->view('includes/template',$data);

	}

	/*
	* Show the pizarra virtual in a colaborative mode to the proper alumno
	* Require ALUMNO Level Permition
	*/
	public function show_pizarra_to_alumno()
	{
		$this->permiso_model->need_alumno_permition_level();	

		$this->load->model('alumno_model');
		$alumno_id = $this->session->userdata('userId');
		$pizarra_id = $this->alumno_model->get_pizarra_privada_id($alumno_id);
		
		if (isset($pizarra_id)) {
			redirect("pizarra_privada/vista_colaborativa/$pizarra_id");
		}else{
			$data= array();
			$data['main_content'] = 'pizarra_privada_null';

			$this->load->view('includes/template',$data);
		}

	}

	/*
	* Used for ajax Petition
	* It gets the new content for the pizarra Privada
	* Require ALUMNO Level Permition
	*/
	public function get_new_content()
	{
		$this->permiso_model->need_alumno_permition_level();

		$this->load->model('pizarra_privada_model');
		$pizarra_id      = $this->input->get('id');

		$pizarra = $this->pizarra_privada_model->get_by_id($pizarra_id);

		$json_respond = array('new_content' =>  $pizarra->contenido);

		header('Content-Type: application/json');
 	 	echo json_encode( $json_respond );
	}

	/*
	* Used for ajax Petition
	* It updates the content of the pizarra virtual when an user
	* decides to share his/her pizarra local content
	* Require ALUMNO Level Permition
	*/
	public function update_content()
	{
		$this->permiso_model->need_alumno_permition_level();

		$id      = $this->input->post('id');
		$content = $this->input->post('content');

		$this->load->model('pizarra_privada_model');
		$pizarra = $this->pizarra_privada_model->update_content($id,$content);

	}
	
}