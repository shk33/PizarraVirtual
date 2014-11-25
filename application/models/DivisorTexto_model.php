<?php
class DivisorDeTexto_model extends CI_Model
{
    function dividirPorEspacio($expresionMatematica){
        return preg_split ("/[\s]+/", $expresionMatematica);
    }
}
?>