<?php 

/**
* 
*/
class Chat extends MY_Controller
{
	
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