<?php 

/**
* 
*/
class Message_model extends CI_model
{
	/* 	Relationships
	*	Message Belongs_to Chat
	*/
	function getAll()
	{
		$query=$this->db->get('message');
		
		return $query->result();
	}

	function get_by_id($id)
	{
		$query = $this->db->get_where('message', array('id' => $id));
		
		foreach ($query->result() as $message) {
			$found_message = $message;			
		}
		return $found_message;
	}

	function get_all_messages_from_chat($chat_id)
	{
		$query = $this->db->get_where('message', array('chat_id' => $chat_id));
		
		$messages = $query->result();

		return $messages;

	}

	function get_last_message_from_chat($chat_id)
	{
		$message = null;		

		$this->db->select('*')->from('message')->where('chat_id', $chat_id)->order_by("sent_date", "desc")->limit(1);
		$query = $this->db->get();

		$messages = $query->result(); //This returns an array
		
		if ($messages) {
			$message = $messages[0]; //Here i get the first and only element
		}

		return $message;

	}

	function get_new_message_from_chat($chat_id, $timestamp)
	{
		$where_conditions = array(
			'chat_id'     => $chat_id,
			'sent_date >' => $timestamp,
		);

		$this->db->select('*')->from('message')->where($where_conditions)->order_by("sent_date", "desc");
		$query = $this->db->get();
		
		$messages = $query->result(); //This returns an array

		/*var_dump($messages);
		die();*/

		return $messages;

	}

	function save($data)
	{
		$insert = $this->db->insert('message',$data);
		return $insert;
	}
	
}