<?php



/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 06/01/2017
 * Time: 10:35
 */

function mask($val, $tipo){
    if($tipo=='CEP'){
        $mask ='#####-###';
    }
    if($tipo=='CPF'){
        $mask ='###.###.###-##';
    }
    if($tipo=='CNPJ'){
        $mask ='##.###.###/####-##';
    }
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++) {
        if($mask[$i] == '#'){
            if(isset($val[$k]))
                $maskared .= $val[$k++];
        }
        else
        {
            if(isset($mask[$i]))
                $maskared .= $mask[$i];
        }
    }
    return $maskared;
}