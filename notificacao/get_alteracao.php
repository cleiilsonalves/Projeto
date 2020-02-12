<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 17/02/2017
 * Time: 14:40
 */
require ('config.php');
require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');


// Instancia a Classes

$Webservice = new Webservice ();
// Variaveis
$idSelAltera		= $_POST['idSelAltera'];

$Dados = $Webservice->getObjetoAlterar($idSelAltera);
$DadosProdutos = json_decode( $Dados , true);
$dadosPrincipal = $DadosProdutos[0];
$dadasAux =  $DadosProdutos[1];
session_start();

$_SESSION['dadosPrincipal']  = $dadosPrincipal;
$_SESSION['dadasAux']        = $dadasAux;
/*
if (count($dadosPrincipal)==0){

    require 'view_consulta.php';

}else {

    require 'view_alterar.php';
}
/*
$ArquivoTemp = dirname ( __FILE__ ) . '\json\produto' . session_id ();

    @unlink($ArquivoTemp);
    $fp = fopen($ArquivoTemp, "a");
    fwrite($fp, $dadosPrincipal);
    fclose($fp);

//print_r($dadosDucumentos);

?>