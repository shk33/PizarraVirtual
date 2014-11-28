<?php
class Control_graficas extends MY_Controller {
	
    function __construct() {
        parent::__construct();
        $this->permiso_model->need_tutor_permition_level(); 
        $this->load->model('registro_model');
	}

    public function index(){
        $data = array();
        $data['main_content'] = 'graficas';

        $this->load->view('includes/template',$data);
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