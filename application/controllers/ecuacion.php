<?php 


class Ecuacion extends MY_Controller
{
	
	function evaluate()
	{
		$this->permiso_model->need_alumno_permition_level();	
		$this->load->model('ecuacion_model');
		
		$ecuaciones = $this->input->get('ecuaciones');
		$ecuaciones = explode("\n\r", $str);

		$result_ecuations = array();

		foreach ($ecuaciones as $ecuacion) {
			$is_correct = $this->ecuacion_model->is_correct();
			$result_ecuations[$ecuacion] =  $is_correct;
		}
		
	}

	function test2()
	{
		$skuList = explode("\n\r", $str);
		var_dump($skuList);
		die();
	}
}