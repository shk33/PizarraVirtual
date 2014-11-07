<?php 

class Pizarra_general extends MY_Controller
{
	
	/*
	* Show the pizarra virtual in colaborative mode
	* Require ALUMNO Level Permition
	*/
	public function index()
	{
		$this->permiso_model->need_alumno_permition_level();	

		$data= array();
		$data['main_content'] = 'pizarra_general_vista_colaborativa';

		$this->load->model('pizarra_general_model');
		$data['pizarra'] = $this->pizarra_general_model->get_unique();

		$this->load->view('includes/template',$data);

	}

	/*
	* Used for ajax Petition
	* It gets the new content for the pizarra Privada
	* Require ALUMNO Level Permition
	*/
	public function get_new_content()
	{
		$this->permiso_model->need_alumno_permition_level();

		$this->load->model('pizarra_general_model');
		$pizarra_id      = $this->input->get('id');

		$pizarra = $this->pizarra_general_model->get_unique();

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

		$this->load->model('pizarra_general_model');
		$pizarra = $this->pizarra_general_model->update_content($content);

	}
	
}