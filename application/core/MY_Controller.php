<?php

/**
* 
*/
class MY_Controller extends CI_Controller
{
	
	function __construct(){

  	parent::__construct();
  	$this->load->model('sesion_model');
    $this->sesion_model->validate_session();
    
	}
}