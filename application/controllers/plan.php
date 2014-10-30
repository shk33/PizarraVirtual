<?php 

/**
* 
*/
class Plan extends MY_Controller
{
	/**
	 * Muestra todos los Planes
	 */
	function index($status = '')
	{
		$data = array();
		$data['main_content'] = 'plan_index';
		$data['status'] = $status;
		$this->load->model('plan_model');
		
		if ($query=$this->plan_model->getAll()) {
			$data['planes'] =$query;
		}

		$this->load->view('includes/template',$data);

	}

	/**
	 * Muestra el formulario para crear un nuevo plan
	 */
	public function create($tarea_id="")
	{
		$data = array();
		$data['main_content'] = 'plan_create';

		$this->load->model('tarea_model');
		$data['tarea'] = $this->tarea_model->get_by_id($tarea_id);
		$data['select_tarea'] = $this->tarea_model->get_options_array();
		$data['tarea_id'] = $tarea_id;

		$this->load->view('includes/template',$data);
	}

	/**
	 * Guarda un nuevo plan en la base de datos
	 */
	public function store()
	{
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
			$this->load->view('includes/template',$data);
		}else{
			$this->load->model('plan_model');
			$this->plan_model->save();
			$status="save_success";

			redirect("tarea/index/$status");			
		}
}
	/**
	 * Show the form for editing the specified plan.
	 */
	public function edit($id)
	{
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
	 */
	public function update()
	{
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
	 */
	public function destroy($id)
	{
		$this->load->model('plan_model');
		$this->plan_model->delete($id);
		$status = "delete_success";
		redirect("plan/index/$status");
	}
}