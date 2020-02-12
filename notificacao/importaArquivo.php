<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 19/04/2017
 * Time: 16:10
 */
require ( 'D:/GER/inetpub/wwwroot/consultas/funcoesDev.php' );
$Webservice = new Webservice();
$uploadFileXls = $_POST['uploadFileXls'];
$uploadFileTxt = $_POST['uploadFileTxt'];
$login         = $_POST['login'];
$ip            = $_POST['ip'];
$Dados = $Webservice->ProcessarArquivo($uploadFileXls, $uploadFileTxt, $login, $ip);
$DadosRetorno = json_decode($Dados, true);