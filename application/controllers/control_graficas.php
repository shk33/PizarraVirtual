<?php
class Control_graficas extends CI_Controller {
	function __construct() {
    parent::__construct();
    $this->load->model('registro_model');
	}

    public function index(){
    	$this->load->view('graficas');
    }
    public function obtener_promedios(){
    	$metrica = $this->input->post('num_metrica');

    	$promedio_errores = $this->registro_model->obtener_promedio_errores($metrica)+0;
    	$promedio_tipos_error = $this->registro_model->obtener_promedio_tipo_error($metrica)+0;
    	$result = array(
    		'prom_errores'=>$promedio_errores,
    		'prom_tipos'=>$promedio_tipos_error
    		);

    	echo json_encode($result);
    }
    public function regresar_registro(){
    	redirect('/registro_error/');
    }
}