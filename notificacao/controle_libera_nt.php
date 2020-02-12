<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 29/11/2016
 * Time: 09:36
 */
require ('config.php');

 session_start();
$maquinaid           = $_SESSION['maquinaid'];
$nomeCompleto        =$_SESSION ["nomeCompleto"];
$idtabela            =$_POST['idSelTabela'];
$assinatura            =$_POST['assinatura'];
$strIdtabela='';
foreach ($idtabela as $a)
{
 $strIdtabela = $strIdtabela.$a.',';
}
 //retorna abc
$jsonAssintaura = array(
    'IDTabela'         =>$strIdtabela,
    'Usuario'          =>$nomeCompleto,
    'MaquinaID'        =>$maquinaid,
    'NomeAssina'       =>$assinatura,
);
$jsonAssintaura = json_encode($jsonAssintaura, true );


require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
$Webservice = new Webservice();
$DadosLiberado = $Webservice->LiberarNT($jsonAssintaura);
//DadosCad1 = json_encode( $DadosCad, true );
$mensg= json_decode($DadosLiberado, true );
$_SESSION['msg']=$mensg;

?>



