<?php 

/**
* 
*/
class login extends CI_Controller
{
	
	function index() {
        if( $this->session->userdata('isLoggedIn') ) { // Accesing a unset userdata returns false
            redirect('sitio/admin'); //Por mientras redirecciona al ADMIN home
        } else {
          $this->show_login(false);
        }
    }

    function login_user() {
        // Create an instance of the user model
        $this->load->model('usuario_model');

        // Grab the email and password from the form POST
        $email = $this->input->post('email');
        $pass  = $this->input->post('password');

        //Ensure values exist for email and pass, and validate the user's credentials
        if( $email && $pass && $this->usuario_model->validate_user($email,$pass)) {
            // If the user is valid, redirect to the main view
            redirect('/sitio/admin');
        } else {
            // Otherwise show the login screen with an error message.
            redirect('/login');
        }
    }

    function show_login( $show_error = false ) { //Corregir el redirecionamiento de esto
        $data['error'] = $show_error;

        $this->load->helper('form');
        $this->load->view('login2',$data);
    }

    function close()
    {
    	$this->session->sess_destroy();
    	redirect('login');
    }

}