<?php

class Registro_error extends MY_Controller {
    
	function __construct() 
    {
        parent::__construct();
        $this->permiso_model->need_tutor_permition_level(); 
        $this->load->model('registro_model');
    }

    public function index()
    {
        $data = array();
        $data['main_content'] = 'registrar_error';

        $this->load->view('includes/template',$data);

    }
    public function salvar_datos(){
        //Obtencion de todos los datos para despues guardar
        $numero_metrica = $this->input->post('metric');
        $date = $this->input->post('fecha');
        $date_formated = DateTime::createFromFormat('m/d/Y',$date)->format('Y-m-d');
        $num_errors = $this->input->post('num_errors');
        $lista_errores = $this->input->post('list_error');
        $num_tipo_error = $this->input->post('num_type_errors');
        $lista_tipos_error = $this->input->post('list_type_error');
        //$numero_ecuacion = $this->input->post('ecuation');
        $ecuacion = $this->input->post('ecuation');
        
       $registro = array (
            'numero_metrica'=>$numero_metrica,
            'ecuacion'=>$ecuacion,
            'errores_encontrados'=>$num_errors,
            'tipos_encontrados'=>$num_tipo_error,
            'fecha'=>$date_formated,
            'lista_errores'=>$lista_errores,
            'lista_tipos'=>$lista_tipos_error
        );
       $resultado = $this->registro_model->insertar_registro($registro);
       echo $resultado;
    }
    public function obtener_ecuaciones(){
        $ecuaciones = $this->registro_model->obtener_ecuaciones();
        echo json_encode($ecuaciones);
    }
}