<?php  

/**
* 
*/
class Permiso_model extends CI_model
{
	const LEVEL_ALUMNO = 1;
	const LEVEL_TUTOR  = 2;
	const LEVEL_ADMIN  = 3;

	function get_level_permition($user_type)
	{
		$user_level;
		$this->load->model('usuario_model');

		if ($user_type == $this->usuario_model->get_user_type_admin()) {
			$user_level = Permiso_model::LEVEL_ADMIN;
		}

		if ($user_type == $this->usuario_model->get_user_type_tutor()) {
			$user_level = Permiso_model::LEVEL_TUTOR;
		}

		if ($user_type == $this->usuario_model->get_user_type_alumno()) {
			$user_level = Permiso_model::LEVEL_ALUMNO;
		}

		return $user_level;
	}

	

	function need_admin_permition_level()
	{
		if (!$this->is_level_admin()) {
			/*$this->permiso_helper->redirect_to_not_allowed();*/
			redirect('login/not_allowed');
		}
	}

	function need_tutor_permition_level()
	{
		if (!( $this->is_level_admin() || $this->is_level_tutor() ) ) {
			/*$this->permiso_helper->redirect_to_not_allowed();*/
			redirect('login/not_allowed');
		}
	}

	function need_alumno_permition_level()
	{
		if (!( $this->is_level_admin() || $this->is_level_tutor() || $this->is_level_alumno() ) ) {
			/*$this->permiso_helper->redirect_to_not_allowed();*/
			redirect('login/not_allowed');
		}
	}

	function is_level_admin()
	{
		$level_permition = $this->session->userdata('permitionLevel');

		if ($level_permition == Permiso_model::LEVEL_ADMIN ) {
			return true;
		}
			return false;
	}

	function is_level_tutor()
	{
		$level_permition = $this->session->userdata('permitionLevel');
		if ($level_permition == Permiso_model::LEVEL_TUTOR ) {
			return true;
		}
			return false;
	}

	function is_level_alumno()
	{
		$level_permition = $this->session->userdata('permitionLevel');
		if ($level_permition == Permiso_model::LEVEL_ALUMNO ) {
			return true;
		}
			return false;
	}
}