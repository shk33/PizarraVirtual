<?php
class ValidadorDeEcuaciones_model extends CI_Model
{
    function esIgualdadCorrecta($operacion){
        $operacionEnCodigoUrl = urlencode($operacion);
        $pagina_inicio = file_get_contents('http://api.wolframalpha.com/v2/query?appid=PAT9AP-7A8RPAG5WW&input='.$operacionEnCodigoUrl.'&format=plaintext');
        $patron = "/\<plaintext\>True/";
        $fueEncontrado = preg_match($patron, $pagina_inicio);
        if($encontrado==true){
            return true;
        }else{
            return false;
        }  
    }
}
?>