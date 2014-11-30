<?php 

/**
* 
*/
class Sitio extends MY_Controller
{
	
	/*Require ADMIN Level Permition*/
	function admin()
	{
		$this->permiso_model->need_admin_permition_level();	
		
		$data = array();
		$data['main_content']  = 'admin_index';

		$this->load->model('tutor_model');
		$data['num_tutor'] = $this->tutor_model->count_all();
		
		$this->load->model('alumno_model');
		$data['num_alumno'] = $this->alumno_model->count_all();
		
		$this->load->model('tarea_model');
		$data['num_tarea'] = $this->tarea_model->count_all();

		$this->load->model('grupo_model');
		$data['num_grupo'] = $this->grupo_model->count_all();

		$this->load->view('includes/template',$data);
	}

}