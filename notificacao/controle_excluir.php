<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 29/11/2016
 * Time: 09:36
 */
require ('config.php');

 session_start();
$maquinaid       = $_SESSION['maquinaid'];
$nomeCompleto    =$_SESSION ["nomeCompleto"];
$idSelExcluir    = $_POST['idSelExcluir'];

require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
$Webservice = new Webservice();
$DadosExcluir = $Webservice->excluirDadosNTOnline($idSelExcluir, $nomeCompleto, $maquinaid);
//$DadosCad1 = json_encode( $DadosCad, true );
$mensg= json_decode($DadosExcluir, true );
$_SESSION['msg']=$mensg;

?>



