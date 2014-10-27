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

    function set_session($tipo_usuario) {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        /*$this->session->set_userdata( array(
                'id'=>$this->details->id,
                'name'=> $this->details->firstName . ' ' . $this->details->lastName,
                'email'=>$this->details->email,
                'avatar'=>$this->details->avatar,
                'tagline'=>$this->details->tagline,
                'isAdmin'=>$this->details->isAdmin,
                'teamId'=>$this->details->teamId,
                'isLoggedIn'=>true
            )
        );*/
        $this->session->set_userdata( array(
                'isLoggedIn'=>true,
                'userType' => $tipo_usuario
            )
        );
        
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
        $this->set_session();
        return true;
    }

    return false;
	}
}