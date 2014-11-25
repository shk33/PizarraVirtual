<?php 

/**
* 
*/
class Chat_model extends CI_Model
{
	/*
	* Relationships
	* Chat belongs_to Grupo
	* Chat has_many Message
	*/

 	function getAll()
	{
		$query=$this->db->get('chat');

		$chats = $query->result();

		$chats = $this->insert_model_associations($chats);
		
		return $chats;
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('chat', array('id' => $id));
		
		foreach ($query->result() as $chat) {
			$found_chat = $chat;			
		}

		$found_chat = $this->insert_model_associations($found_chat);
		return $found_chat;
	}

	function get_by_grupo_id($grupo_id)
	{
		$this->db->where('grupo_id' , $grupo_id);
		$query = $this->db->get('chat'); 
		$found_chat = array();

		$chat = $query->result();

		if ($chat) {
			$found_chat = $chat[0]; //Getting the first element
			$found_chat = $this->insert_model_associations($found_chat);
		}
		
		return $found_chat; 
	}

	function save($chat_data)
	{
		$insert = $this->db->insert('chat',$chat_data);
		return $insert;
	}

	function update_content($id,$text,$username)
	{
		$date = new DateTime();
        $sent_date = $date->getTimestamp();

		$this->load->model('message_model');
		$new_message_data = array(
				'text'      => $text,
				'username'  => $username,
				'sent_date' => $sent_date,
				'chat_id'   => $id
			);
		$this->message_model->save($new_message_data);
	}

	/*
	* Rails Active Record Associations imitations starts here
	*/

	/*
	* Imitates behaviour of has_many in Rails in this case
	* Grupo has_many Alumnos
	*/
	private function insert_messages_in_chat(&$chats)
	{
		$this->load->model('message_model');

		if (gettype($chats) == "array") {
			foreach ($chats as $chat) {
				$messages = $this->message_model->get_all_messages_from_chat($chat->id);
				$chat->messages = $messages;
			}
		}else{ //Asuming is an object type
			$messages = $this->message_model->get_all_messages_from_chat($chats->id);
			$chats->messages = $messages;
		}
		
		return $chats;
	}

	/*
	*	Hydrate the object with the others objects of model acoordings its associations
 	*/
	private function insert_model_associations(&$chats)
	{
		$chats = $this->insert_messages_in_chat($chats);

		return $chats;
	}
}