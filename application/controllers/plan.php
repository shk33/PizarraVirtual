<?php 

/**
* 
*/
class Plan extends MY_Controller
{
	/**
	 * Muestra todos los Planes
	 * Require TUTOR Level Permition
	 */
	function index($status = '')
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data = array();
		$data['main_content'] = 'plan_index';
		$data['status'] = $status;
		$this->load->model('plan_model');
		
		if ($query=$this->plan_model->get_planes_by_user_type()) {
			$data['planes'] =$query;
		}

		$this->load->view('includes/template',$data);

	}

	/**
	 * Muestra el formulario para crear un nuevo plan
		* Require TUTOR Level Permition
	 */
	public function create($tarea_id="")
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data = array();
		$data['main_content'] = 'plan_create';

		$this->load->model('tarea_model');
		$data['select_tarea'] = $this->tarea_model->get_options_array();
		$data['tarea_id'] = $tarea_id;

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo plan en la base de datos
	* Require TUTOR Level Permition
	 */
	public function store()
	{
		$this->permiso_model->need_tutor_permition_level();	

		$this->load->library('form_validation');
		$this->form_validation->set_rules('tarea_id','Tarea pertenciente','required');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('materiales','materiales','trim|required');
		$this->form_validation->set_rules('ruta_carpeta','Ruta carpeta','trim|required');

		$data = array();

		if ($this->form_validation->run() == false) {
			$this->load->model('tarea_model');
			$data['select_tarea'] = $this->tarea_model->get_options_array(); 
			$data['main_content'] = 'plan_create';
			$data['tarea_id'] = $this->input->post('tarea_id');
			$this->load->view('includes/template',$data);
		}else{
			$this->load->model('plan_model');
			$this->plan_model->save();
			$status="save_success";

			redirect("plan");			
		}
}
	/**
	 * Show the form for editing the specified plan.
	 * Require TUTOR Level Permition
	 */
	public function edit($id)
	{
		$this->permiso_model->need_tutor_permition_level();	

		$data= array();
		$data['main_content'] = 'plan_update';

		$this->load->model('tarea_model');
		$data['select_tarea'] = $this->tarea_model->get_options_array();

		$this->load->model('plan_model');
		$data['plan']=$this->plan_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 * Require TUTOR Level Permition
	 */
	public function update()
	{
		$this->permiso_model->need_tutor_permition_level();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('materiales','materiales','trim|required');
		$this->form_validation->set_rules('ruta_carpeta','Ruta carpeta','trim|required');

		$this->load->model('plan_model');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'plan_update';
			$data['plan']=$this->plan_model->get_by_id($this->input->post('id'));
			$this->load->view('includes/template',$data);
		}else{
			$this->plan_model->update($this->input->post('id'));
			$status = "update_success";
			redirect("tarea/index/$status");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * Require TUTOR Level Permition
	 */
	public function destroy($id)
	{
		$this->permiso_model->need_tutor_permition_level();	
		
		$this->load->model('plan_model');
		$this->plan_model->delete($id);
		$status = "delete_success";
		redirect("plan/index/$status");
	}
}