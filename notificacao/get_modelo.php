<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 04/10/2017
 * Time: 16:27
 */
require ('config.php');
require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');
// Instancia a Classes



$Webservice = new Webservice ();
// Variaveis
session_start();
$codDpt		= $_GET['codDpt'];


$_SESSION['sessionID'] = session_id ();
$Dados = $Webservice->getListarModelos($codDpt);

echo $Dados;
//$dadosCep = json_decode( $Dados , true);
/*
$ArquivoTemp = dirname ( __FILE__ ) . '\json\modelo' . session_id().'.json';
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $Dados);
fclose ( $fp );
*/


