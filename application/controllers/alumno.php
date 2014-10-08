<?php 

/**
* 
*/
class Alumno extends CI_Controller
{
	
	/**
	 * Muestra todos los alumnos
	 */
	function index($success=false)
	{
		$data = array();
		$data['main_content'] = 'alumno_index';
		$data['success'] = $success;
		$this->load->model('alumno_model');
		
		if ($query=$this->alumno_model->getAll()) {
			$data['alumnos'] =$query;
		}

		$this->load->view('includes/template',$data);
	}

	/**
	 * Muestra el formulario para crear un nuevo alumno
	 */
	public function create()
	{
		$data = array();
		$data['main_content'] = 'alumno_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo alumno en la base de datos
	 */
	public function store()
	{
		$this->load->model('alumno_model');
		$this->alumno_model->save();
		redirect('alumno/index/true');

	}
}