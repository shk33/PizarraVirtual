<?php 

/**
* 
*/
class Usuario_Model extends CI_model
{
	
    const USER_TYPE_ADMIN  = "admin";
    const USER_TYPE_TUTOR  = "tutor";
    const USER_TYPE_ALUMNO = "alumno";

    function get_user_type_admin()
    {
        return Usuario_Model::USER_TYPE_ADMIN;
    }

    function get_user_type_tutor()
    {
        return Usuario_Model::USER_TYPE_TUTOR;
    }

    function get_user_type_alumno()
    {
        return Usuario_Model::USER_TYPE_ALUMNO;
    }

    function validate_user( $correo, $contrasena ) {
        
        if ($this->validate_credentials($correo, $contrasena, Usuario_Model::USER_TYPE_ADMIN)) {
            return true;
        }
        if ($this->validate_credentials($correo, $contrasena, Usuario_Model::USER_TYPE_ALUMNO)) {
            return true;
        }
        if ($this->validate_credentials($correo, $contrasena, Usuario_Model::USER_TYPE_TUTOR)) {
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
        var_dump($login);
        $this->set_session($tipo_usuario,$login[0]->id,$login[0]->nombre);
        return true;
    }

    return false;
    }
    
    private function set_session($tipo_usuario,$usuario_id,$usuario_nombre) {
        $this->session->set_userdata( array(
                'isLoggedIn'      => true,
                'userType'        => $tipo_usuario,
                'permitionLevel'  => $this->permiso_model->get_level_permition($tipo_usuario),
                'userId'          => $usuario_id,
                'userName'        => $usuario_nombre
            )
        );
    }
}