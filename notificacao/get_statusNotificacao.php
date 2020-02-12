<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 12/09/2017
 * Time: 10:25
 */
require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
$Webservice = new Webservice ();
// Variaveis
$idOrgaoEmpresa		= $_GET['idOrgaoEmpresa'];
// Traz dados
$Dados = $Webservice->StatusNotificacoes($idOrgaoEmpresa);
$DadosStatus = json_decode($Dados , true);

$retorno ='['.$DadosStatus['ALIBERAR'].','.$DadosStatus['LIBERADO'].','. $DadosStatus['PROCESSADO'].']';

//print_r($DadosStatus);
//print_r($retorno);
echo $retorno;

//session_start();
//$_SESSION[''] = $Dados;
/*