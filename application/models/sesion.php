<?php 


/**
* Session Class
*/
class Sesion extends CI_model
{
	
	function validate_session()
	{
		if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
	}
}