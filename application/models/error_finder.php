<?php 
class Error_finder extends CI_Model
{

	private $table_name = 'error'; 

	function get_by_id($id)
	{
		//$query = $this->db->get_where($this->table_name,array('ErrorId' => $id));
		$this->db->select('*');
		$this->db->from ($this->table_name);
		$this->db->where('ErrorId',$id);
		$this->db->join('claseerror', 'error.ClaseErrorId = claseerror.ClaseErrorId');
		$query = $this->db->get();
		foreach ($query->result() as $error) {
			$found_error = $error;
		}
		return $found_error;
	}


	//A partir de aqui se pondran los errores
	function find_posible_errors($entrada_ecuaciones){

		//$entrada['ecuacion']['falla']
		$entrada_ecuaciones = array (
			"9+2",
			"xx",
			"3-4(4+5)",
			"(x+y)^2",
			"1/(2+2)",
			"x^(2+)",
			"2^(ab)",
			"1/2e",
			"(x-3)(x+3)",
			"(2+3)^(1/2)",
			"(a^(2)/(a^(3)))"
			);
		//$ecuaciones = $entrada_ecuaciones['ecuacion']['falla'];
		$errores_id = array ();
		$errores = array();
		$numEq = 0;
		foreach ($entrada_ecuaciones as $ecuacion) {
			$numEq++;

			if ($this->posibleErrorTipo1($ecuacion)){
				$error = $this->get_by_id(1001);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
		
			if ($this->posibleErrorTipo2($ecuacion)){
				$error = $this->get_by_id(1002);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}

			if ($this->posibleErrorTipo3($ecuacion)){
				$error = $this->get_by_id(1003);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo4($ecuacion)){
				$error = $this->get_by_id(1004);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo5($ecuacion)){
				$error = $this->get_by_id(1005);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo6($ecuacion)){
				$error = $this->get_by_id(1006);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo7($ecuacion)){
				$error = $this->get_by_id(1007);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}		
			if ($this->posibleErrorTipo8($ecuacion)){
				$error = $this->get_by_id(1008);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo9($ecuacion)){
				$error = $this->get_by_id(1009);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo10($ecuacion)){
				$error = $this->get_by_id(1010);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo11($ecuacion)){
				$error = $this->get_by_id(1011);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo12($ecuacion)){
				$error = $this->get_by_id(1012);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo13($ecuacion)){
				$error = $this->get_by_id(1013);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo14($ecuacion)){
				$error = $this->get_by_id(1014);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo15($ecuacion)){
				$error = $this->get_by_id(1015);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo16($ecuacion)){
				$error = $this->get_by_id(1016);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo17($ecuacion)){
				$error = $this->get_by_id(1017);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo18($ecuacion)){
				$error = $this->get_by_id(1018);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo19($ecuacion)){
				$error = $this->get_by_id(1019);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo20($ecuacion)){
				$error = $this->get_by_id(1020);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo21($ecuacion)){
				$error = $this->get_by_id(1021);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo22($ecuacion)){
				$error = $this->get_by_id(1022);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo23($ecuacion)){
				$error = $this->get_by_id(1023);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo24($ecuacion)){
				$error = $this->get_by_id(1024);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo25($ecuacion)){
				$error = $this->get_by_id(1025);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo26($ecuacion)){
				$error = $this->get_by_id(1026);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo27($ecuacion)){
				$error = $this->get_by_id(1027);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo28($ecuacion)){
				$error = $this->get_by_id(1028);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo29($ecuacion)){
				$error = $this->get_by_id(1029);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo30($ecuacion)){
				$error = $this->get_by_id(1030);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo31($ecuacion)){
				$error = $this->get_by_id(1031);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo32($ecuacion)){
				$error = $this->get_by_id(1032);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo33($ecuacion)){
				$error = $this->get_by_id(1033);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo34($ecuacion)){
				$error = $this->get_by_id(1034);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo35($ecuacion)){
				$error = $this->get_by_id(1035);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo36($ecuacion)){
				$error = $this->get_by_id(1036);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo37($ecuacion)){
				$error = $this->get_by_id(1037);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}
			if ($this->posibleErrorTipo38($ecuacion)){
				$error = $this->get_by_id(1038);
				$error_eq = array (
					'numEq' => $numEq,
					'error' => $error
					);
				array_push($errores, $error_eq);
			}

			$error = $this->get_by_id(1039);
			$error_eq = array(
				'numEq' => $numEq,
				'error' => $error
				);
			array_push($errores, $error_eq);

		}
		return json_encode($errores);
	
}
	function posibleErrorTipo1($ecuacion){
		$patron = '/([a-z][1-9])|([1-9][a-z])/';
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo2($ecuacion){
		//Aqui solo me falta hacer que no se repita el valor de la variable
		$patron = '/[a-z][a-z]/';
		if (preg_match($patron, $ecuacion))
			return true;
		else
			return false;
	}
	function posibleErrorTipo3($ecuacion){
		$patron='/\(\-[1-9]+\)/';
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo4($ecuacion){
		$patron='/([1-9]+[a-z]*[a-z]\^[1-9])|([1-9]+\+[a-z]*[a-z]\^[1-9]+)|(\([1-9]+[a-z]+\)\^[1-9])/';
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo5($ecuacion){
		$patron="/[1-9]+[\+,\-][1-9]+\(/";
		if(preg_match($patron, $ecuacion))
			return true;
		else
			return false;
	}
	function posibleErrorTipo6($ecuacion){
		$patron="/[1-9]+[a-z]+[\+,\-][1-9]+[a-z]+/";
		if(preg_match($patron, $ecuacion))
			return true;
		else
			return false;
	}
	function posibleErrorTipo7($ecuacion){
		$patron="/\//";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo8($ecuacion){
		$patron="/\//";
		$patron2="/\*/";
		$patron3="/[0-9]*[a-z]+\(/";
		if (preg_match($patron, $ecuacion)){
			if (preg_match($patron2, $ecuacion)){
				return true;
			} else {
				if (preg_match($patron3, $ecuacion))
					return true;
				else 
					return false;
			}
		}
		else 
			return false;
	}
	function posibleErrorTipo9($ecuacion){
		$patron='/(0[a-z])|(0\*[a-z])/';
		if(preg_match($patron, $ecuacion))
			return true;
		else
			return false;
	}
	function posibleErrorTipo10($ecuacion){
		$patron='/\^\(1\/2\)/';
		if(preg_match($patron, $ecuacion))
			return true;
		else
			return false;
	}
	function posibleErrorTipo11($ecuacion){
		$patron ='/\([0-9]*[a-z]+([\+,\-][0-9]*[a-z]+)*\)\^[1-9]+/';
		if(preg_match($patron, $ecuacion))
			return true;
		else
			return false;
	}
	function posibleErrorTipo12($ecuacion){
		$patron = '/[a-z]\([a-z]{2,}\)/';
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
		
	}
	function posibleErrorTipo13($ecuacion){
		$patron = "/\/\([1-9]*[a-z]+([\+,\-][1-9]*[a-z]*)+\)/";
		$patron2 = "/\/\([1-9]+[a-z]*([\+,\-][1-9]*[a-z]+)+\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else if (preg_match($patron2, $ecuacion))
			return true;
		else 
			false;
	}
	function posibleErrorTipo14($ecuacion){
		$patron = "/\([1-9]*[a-z]*([\+,\-][1-9]*[a-z]*)+\)\/\([1-9]*[a-z]*([\+,\-][1-9]*[a-z]*)+\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo15($ecuacion){
		$patron = "/\^\([1-9]*[a-z]*+([\+,\-][1-9]*[a-z]*)+\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo16($ecuacion){
		$patron = "/[1-9]+\^\([a-z]{2,}\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo17($ecuacion){
		$patron = "/\//";
		$patron2= "/([0-9]*[a-z]+[\+,\-])+([0-9][a-z])/";
		$patron3= "/([a-z]+[\+,\-])+[a-z]+/";
		if (preg_match($patron, $ecuacion))
			if (preg_match($patron2, $ecuacion)){
				if (preg_match($patron3, $ecuacion)){
					return true;
				}else
				return false;
			} else {
				return false;
			}
		else 
			return false;
	}
	function posibleErrorTipo18($ecuacion){
		$patron = "/\//";
		$patron2 = "/\([0-9]*[a-z]+\)/";
		$patron3 = "/([0-9]*[a-z]+[\+,\-])+[0-9]*[a-z]+/";
		if (preg_match($patron, $ecuacion))
			if (preg_match($patron2, $ecuacion)){
				if (preg_match($patron3, $ecuacion)){
					return true;
				}else
				return false;
			} else {
				return false;
			}
		else 
			return false;
		return false;
	}
	function posibleErrorTipo19($ecuacion){
		$patron= "/\//";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo20($ecuacion){
		$patron = "/\//";
		$patron2 = "/[0-9]*[a-z]+/";
		$patron3 = "/([0-9]*[a-z]+[\+,\-])+([0-9]*[a-z]+)+/";
		if (preg_match($patron, $ecuacion))
			if (preg_match($patron2, $ecuacion)){
				if (preg_match($patron3, $ecuacion)){
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		else 
			return false;
	}
	function posibleErrorTipo21($ecuacion){
		$patron= "/\//";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo22($ecuacion){
		$patron = "/[1-9]\([1-9]*[a-z]+[\+,\-][1-9]+\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo23($ecuacion){
		$patron = "/\-\([1-9]*[a-z]+([\+,\-][1-9]*[a-z]+)+\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo24($ecuacion){
		$patron = "/\([1-9]*[a-z]+[\+,\-][1-9]\)\([1-9]*[a-z]+[\+,\-][1-9]\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo25($ecuacion){
		//Tipo de error que no se pudo clasificar ni encontrar patron
		return false;
	}
	function posibleErrorTipo26($ecuacion){
		$patron = "/\([1-9]*[a-z]+[\+,\-][1-9]+\)\/\([1-9]*[a-z]+[\+,\-][1-9]+\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo27($ecuacion){
		$patron = "/([1-9][\+,\-])+[1-9]*[a-z]+/";
		$patron2 = "/[1-9]*[a-z]+([\+,\-][1-9])+/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo28($ecuacion){
		$patron = "/[1-9]+[a-z]+[\+,\-][1-9]+/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo29($ecuacion){
		$patron = "/1\/[1-9]*[a-z]+/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo30($ecuacion){
		$patron = "/1\/[1-9]*[a-z]+/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo31($ecuacion){
		$patron = "/([a-z]\^2) || ([a-z]\^\(2\))/";
		$patron2 = "/[a-z]/";
		$patron3 = "/[0-9]+/";
		$patron4 = "/[\+,\-]+/";
		if (preg_match($patron, $ecuacion) and preg_match($patron2, $ecuacion) and preg_match($patron3, $ecuacion) and preg_match($patron4, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo32($ecuacion){
		$patron = "/\([0-9]*[a-z]+[+,-][0-9]+\)\([0-9]*[a-z]+[+,-][0-9]+\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo33($ecuacion){
		//No se pudo crear patron
		return false;
	}
	function posibleErrorTipo34($ecuacion){
		$patron = "/[a-z]+/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo35($ecuacion){
		$patron = "/[0-1]*[a-z]+\^\(/";
		$patron2 = "/\//";
		if (preg_match($patron, $ecuacion) and preg_match($patron2, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo36($ecuacion){
		$patron = "/\([0-9]+[a-z]+\)\^[0-9]+/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo37($ecuacion){
		$patron = "/[0-9]+\^\( ([0-9]*[a-z]+[\+,\-])+[0-9]*[a-z]+\)/";
		if (preg_match($patron, $ecuacion))
			return true;
		else 
			return false;
	}
	function posibleErrorTipo38($ecuacion){
		//No se pudo crear patron
		return false;
	}
}
?>