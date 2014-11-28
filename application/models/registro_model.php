<?php
class Registro_model extends CI_model {

	private $metrica_table_name = 'metricas';
	private $ecuation_table_name = 'ecuacion';
	private $record_table_name = 'registro';

	function obtener_metricas(){
		$query = $this->db->get($this->metrica_table_name);
		if ($query-> num_rows() > 0)
			return $query-result();
		else 
			return false;
	}
	function obtener_ecuaciones(){
		$query = $this->db->get($this->ecuation_table_name);
		if ($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}
	function insertar_registro($registro){
		return $this->db->insert($this->record_table_name, $registro);
	}
	function obtener_promedio_errores($numero_metrica){
		$this->db->select_avg('errores_encontrados','errores_encontrados');
		$this->db->where('numero_metrica',$numero_metrica);
		$query = $this->db->get($this->record_table_name);
		$row = $query->row();
		return $row->errores_encontrados;
	}
	function obtener_promedio_tipo_error($numero_metrica){
		$this->db->select_avg('tipos_encontrados','tipos_encontrados');
		$this->db->where('numero_metrica',$numero_metrica);
		$query = $this->db->get($this->record_table_name);
		$row = $query->row();
		return $row->tipos_encontrados;
	}

}
?>