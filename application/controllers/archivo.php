<?php 


class Archivo extends MY_Controller
{
	
	function upload()
	{
		$this->permiso_model->need_tutor_permition_level();

		//Loading dependencies
		$this->load->model('plan_model');
		$this->load->model('archivo_model');
		
		//Getting the plan id from the post request
		$plan_id = $this->input->post('plan_id');

		//Setting up the file upload path
		$upload_path = $this->plan_model->get_ruta_carpeta($plan_id);
		$config['upload_path']   = "./$upload_path";
		$config['allowed_types'] = "gif|jpg|png|pdf|doc|docx|xls|xlsx|ppt|pptx|xml";
		$config['overwrite']     = TRUE;
		$config['remove_spaces'] = TRUE;

		//Loading the upload library
		$this->load->library('upload', $config);

		//Validating the upload was successfull
		if ( $this->upload->do_upload())
		{
			//Getting the file name
			$upload_data = $this->upload->data();
			$file_name   = $upload_data['file_name'];

			//Creating a file model instance referencing the file uploaded
			$file_path = "$upload_path/$file_name";
			$archivo_data = array(
				'ruta'    => $file_path, 
				'nombre'  => $file_name, 
				'plan_id' => $plan_id, 
				);
			$this->archivo_model->save($archivo_data);
		}


	}

	function download($file_id)
	{
		$this->permiso_model->need_alumno_permition_level();
		
		//Loading Dependcies
		$this->load->model('archivo_model');
	    $this->load->helper('download');

		//Getting the file reference
	    $file = $this->archivo_model->get_by_id($file_id);

	    $file_stream = file_get_contents($file->ruta); 
	    $name = $file->nombre;

	    force_download($name, $file_stream);
	}

	function destroy($file_id,$plan_id)
	{
		$this->load->model('archivo_model');
		$this->archivo_model->delete($file_id);

		redirect("plan/edit/$plan_id");
	}

	/*function test()
	{
		$this->load->model('plan_model');
		$s = $this->plan_model->get_ruta_carpeta(1);
		var_dump($s);
		die();

	}*/

}