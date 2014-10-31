<?php 

class Pizarra_privada extends MY_Controller
{
	
	/**
	 * Admin Exclusive functions starts here
	 * Require Level 3 Access
	 */

	/**
	 * Muestra todos los grupos
	 */
	function index($status = '')
	{
		$data = array();
		$data['main_content'] = 'pizarra_privada_index';
		$data['status'] = $status;
		$this->load->model('pizarra_privada_model');
		
		if ($query=$this->pizarra_privada_model->getAll()) {
			$data['pizarras'] =$query;
		}

		$this->load->view('includes/template',$data);

	}

	/**
	 * Muestra el formulario para crear un nuevo grupo
	 */
	public function create()
	{
		$data = array();
		$data['main_content'] = 'grupo_create';

		$this->load->view('includes/template',$data);
	}

	/**
	 * Show the form for editing the specified grupo.
	 */
	public function edit($id)
	{
		$data= array();
		$data['main_content'] = 'pizarra_privada_update';

		$this->load->model('pizarra_privada_model');
		$data['pizarra_privada']=$this->pizarra_privada_model->get_by_id($id);

		$this->load->view('includes/template',$data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nombre','Nombre','trim|required');
		$this->form_validation->set_rules('contenido','Contenido','trim|required');

		$this->load->model('pizarra_privada_model');

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'pizarra_privada_update';
			$data['pizarra_privada']=$this->pizarra_privada_model->get_by_id($this->input->post('id'));

			$this->load->view('includes/template',$data);
		}else{
			$this->pizarra_privada_model->update($this->input->post('id'));
			$status = "update_success";
			redirect("pizarra_privada/index/$status");
		}
	}

	/**
	 * Admin Exclusive functions ends here
	 * Require Level 3 Access
	 */

	/**
	 * Require Level 1 Access starts here
	 */
		public function vista_colaborativa($pizarra_id)
		{
			$data= array();
			$data['main_content'] = 'pizarra_privada_vista_colaborativa';

			$this->load->model('pizarra_privada_model');
			$data['pizarra'] = $this->pizarra_privada_model->get_by_id($pizarra_id);

			$this->load->view('includes/template',$data);

		}

		public function get_new_content()
		{
			$this->load->model('pizarra_privada_model');
			$pizarra_id      = $this->input->get('id');

			$pizarra = $this->pizarra_privada_model->get_by_id($pizarra_id);

			$json_respond = array('new_content' =>  $pizarra->contenido);

			header('Content-Type: application/json');
    	echo json_encode( $json_respond );
		}

		public function update_content()
		{
			$id      = $this->input->post('id');
			$content = $this->input->post('content');

			$this->load->model('pizarra_privada_model');
			$pizarra = $this->pizarra_privada_model->update_content($id,$content);

		}
		
	/**
	 * Require Level 1 Access ends here
	 */

	
}