<?php 

/**
* 
*/
class Chat extends MY_Controller
{
	
	/*
	* Used for ajax Petition
	* Require ALUMNO Level Permition
	*/
	public function get_new_messages()
	{
		$this->permiso_model->need_alumno_permition_level();

		$this->load->model('message_model');
		$chat_id        = $this->input->get('chat_id');
		$last_timestamp = $this->input->get('last_timestamp');

		$messages = $this->message_model->get_new_message_from_chat($chat_id,$last_timestamp);

		$json_respond = array('messages' => $messages);

		header('Content-Type: application/json');
  		echo json_encode( $json_respond );
	}

	/*
	* Used for ajax Petition
	* Require ALUMNO Level Permition
	*/
	public function sent_message()
	{
		$this->permiso_model->need_alumno_permition_level();
		
		$chat_id  = $this->input->post('chat_id');
		$text     = $this->input->post('text');
		$username = $this->input->post('username');

		if ($text) {
			$this->load->model('chat_model');
			$pizarra = $this->chat_model->update_content($chat_id,$text,$username);
		}

	}

	function test()
	{

		$this->load->model('message_model');

		$messages = $this->message_model->get_new_message_from_chat(1,1416868452);

		$json_respond = array('messages' => $messages);

		header('Content-Type: application/json');
  		echo json_encode( $json_respond );	
	}
}