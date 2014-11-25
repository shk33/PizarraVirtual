<?php
class Ecuacion_model extends CI_Model
{
    function is_correct($ecuacion){
        $is_correct = false;
        $encoded_ecuation = urlencode($ecuacion);

        $api_wolfram_alpha = file_get_contents('http://api.wolframalpha.com/v2/query?appid=PAT9AP-7A8RPAG5WW&input='.$encoded_ecuation.'&format=plaintext');

        $regex = "/\<plaintext\>True/";
        
        $is_correct = preg_match($regex, $api_wolfram_alpha);
        
        if ($is_correct) {
            return true;
        }else{
            return false;
        }
    }

    
}
