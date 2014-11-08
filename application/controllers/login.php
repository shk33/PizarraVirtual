<?php 

/**
* 
*/
class login extends CI_Controller
{
	
	function index() {
        $this->load->model('sesion_model');

        if( $this->session->userdata('isLoggedIn') ) { // Accesing a unset userdata returns false
            $this->sesion_model->succes_login_redirect();
        } else {
            $data['error'] = false;
            $this->load->view('login2',$data);
        }
    }

    function login_user() {
        // Create an instance of the user model
        $this->load->model('usuario_model');
        $this->load->model('sesion_model');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('correo','Correo','trim|required|valid_email');
        $this->form_validation->set_rules('contrasena','Contraseña','required');

        if ($this->form_validation->run() == false) { //Fails Validation
            $this->load->view('login2');
        }else{//Pass all validations
            $email = $this->input->post('correo');
            $pass  = $this->input->post('contrasena');
                    
            if( $this->usuario_model->validate_user($email,$pass)) {
                // If the user is valid, redirect to the main view
                $this->sesion_model->succes_login_redirect();
            } else {
                $data['error'] = true;
                $this->load->view('login2',$data);
            }
        }

    }

    function close()
    {
    	$this->session->sess_destroy();
    	redirect('login');
    }

    function not_allowed()
    {
        $data = array();
        $data['main_content'] = 'errors/not_allowed';
        $this->load->view('includes/template',$data);
    }

}