<?php 

/**
* 
*/
class Usuario_Model extends CI_model
{
	
    function validate_user( $correo, $contrasena ) {
        
        if ($this->validate_credentials($correo, $contrasena, 'admin')) {
        	return true;
        }
        if ($this->validate_credentials($correo, $contrasena, 'tutor')) {
        	return true;
        }
        if ($this->validate_credentials($correo, $contrasena, 'alumno')) {
        	return true;
        }

        return false;
    }


    //Validates login credentials
    private function validate_credentials($correo, $contrasena, $tipo_usuario)
    {
    // Build a query to retrieve the user's details
    // based on the received username and password
    $this->db->from($tipo_usuario);
    $this->db->where('correo',$correo);
    $this->db->where( 'contrasena', md5($contrasena));
    $login = $this->db->get()->result();

    // The results of the query are stored in $login.
    // If a value exists, then the user account exists and is validated
    if ( is_array($login) && count($login) == 1 ) {
        // Call set_session to set the user's session vars via CodeIgniter
        $this->set_session($tipo_usuario);
        return true;
    }

    return false;
    }
    
    private function set_session($tipo_usuario) {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        $this->session->set_userdata( array(
                'isLoggedIn'=>true,
                'userType' => $tipo_usuario
            )
        );
        
    }
}