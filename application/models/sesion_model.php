<?php 


/**
* Session Class
*/
class Sesion_model extends CI_model
{
	
	function validate_session()
	{
		if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login');
    }
	}

	function succes_login_redirect()
	{
		$this->load->model('usuario_model');
		$user_type = $this->session->userdata('userType');
		
		if ($user_type == $this->usuario_model->get_user_type_admin()) {
			redirect('sitio/admin');
		}

		if ($user_type == $this->usuario_model->get_user_type_tutor()) {
			redirect('pizarra_general');
		}

		if ($user_type == $this->usuario_model->get_user_type_alumno()) {
			redirect('pizarra_general');
		}
	}
}