<?php

class Sistema_experto extends CI_Controller {
    
	function __construct() {
    parent::__construct();
    $this->load->model('error_model');
    $this->load->model('error_finder');
    }

    public function index()

    {
    	//$data['error'] = $this->error_model->get_by_id(1);
    	//$data['buscaPHP'] = $this->error_finder->buscaCadenaPHP();
    	//$data['subPatronNominado'] = $this->error_finder->buscaPatronNominado();
    	//$data['errorNegativo'] = $this ->error_finder->errorMultiplicacionNegativo();
    	//$data['errorDistribucionParcial'] = $this ->error_finder -> errorDistribucionParcial();
       
        $entrada_ecuaciones = array();
        $data['json_result'] = $this->error_finder->find_posible_errors($entrada_ecuaciones);


    	$this->load->view('result_expert_system',$data);

    }
}