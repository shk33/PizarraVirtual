<?php 


class Ecuacion extends MY_Controller
{
	
	function evaluate()
	{
		$this->permiso_model->need_alumno_permition_level();	
		
		$this->load->model('ecuacion_model');
    	$this->load->model('error_finder');
		
		$ecuaciones = $this->input->post('ecuaciones');
		$ecuaciones = explode("\n", $ecuaciones);

		$incorrect_ecuations = array();

		foreach ($ecuaciones as $ecuacion) {
			$is_correct = $this->ecuacion_model->is_correct($ecuacion);
			
			//Only adds the incorrect ecuations the array
			if (!$is_correct) {
				$incorrect_ecuations[$ecuacion] =  $is_correct;
			}

		}
		
		$json_respond = $this->error_finder->find_posible_errors($incorrect_ecuations);
		
		header('Content-Type: application/json');
 	 	echo json_encode( $json_respond );

	}

}