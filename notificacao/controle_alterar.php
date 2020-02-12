<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 29/11/2016
 * Time: 09:36
 */

require ('config.php');
 session_start();
$maquinaid =  $_SESSION['maquinaid'];
$nomeCompleto    =$_SESSION ["nomeCompleto"];

require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php' );
$Webservice = new Webservice();
$idtabela       =$_POST['idtabela'];
$cliente        =$_POST['codDpt'];
$tipo           =$_POST ['modeloNt'];
$destinatario   =$_POST ['destinatario'];
//$destinatario   =$JsonObj1 = str_replace(".", "",  $destinatario);
$tpdocdest      =$_POST ['tipoDoc'];
$aArray = array('.','/','-');
$docdest        =str_replace($aArray,"", $_POST ['Doc']);
$modelo         =$_POST ['modeloCertidao'];
$cep            =$_POST ['cep'];
$endereco       =$_POST ['endereco'];
$numero         =$_POST ['numero'];
$complemento    =$_POST ['complemento'];
$bairro         =$_POST ['bairro'];
$cidade         =$_POST ['cidade'];
$uf             =$_POST ['uf'];
$nomedevedor    = $_POST['nomeDevedor'];
$produto01      =$_POST ['produto01'];
$operacao01     =$_POST ['operacao01'];
$data01         =$_POST ['data01'];
$produto02      =$_POST ['produto02'];
$operacao02     =$_POST ['operacao02'];
$data02         =$_POST ['data02'];
$produto03      =$_POST ['produto03'];
$operacao03     =$_POST ['operacao03'];
$data03         =$_POST ['data03'];
$produto04      =$_POST ['produto04'];
$operacao04     =$_POST ['operacao04'];
$data04         =$_POST ['data04'];
$produto05      =$_POST ['produto05'];
$operacao05     =$_POST ['operacao05'];
$data05         =$_POST ['data05'];
$produto06      =$_POST ['produto06'];
$operacao06     =$_POST ['operacao06'];
$data06         =$_POST ['data06'];
$produto07      =$_POST ['produto07'];
$operacao07     =$_POST ['operacao07'];
$data07         =$_POST ['data07'];
$produto08      =$_POST ['produto08'];
$operacao08     =$_POST ['operacao08'];
$data08         =$_POST ['data08'];
$produto09      =$_POST ['produto09'];
$operacao09     =$_POST ['operacao09'];
$data09         =$_POST ['data09'];
$produto10      =$_POST ['produto10'];
$operacao10     =$_POST ['operacao10'];
$data10         =$_POST ['data10'];
//echo $modelo .' - '. $destinatario.' - '.$cep ;

$CamposPrinc = array(
    'idtabela'      =>$idtabela,
    'maquinaid'     => $maquinaid,
    'usuario'       => $nomeCompleto,
    'cliente'       => $cliente,
    'tipo'          => $tipo,
    'destinatario'  => $destinatario,
    'tpdocdest'     => $tpdocdest,
    'docdest'       => $docdest,
    'modelo'        => $modelo,
    'cep'           => $cep,
    'endereco'      => $endereco,
    'numero'        => $numero,
    'complemento'   => $complemento,
    'bairro'        => $bairro,
    'cidade'        => $cidade,
    'uf'            => $uf,
    'nomedevedor'   =>$nomedevedor,
    'produto01'     => $produto01,
    'operacao01'    => $operacao01,
    'data01'        => $data01 ,
    'produto02'     => $produto02 ,
    'operacao02'    => $operacao02 ,
    'data02'        => $data02 ,
    'produto03'     => $produto03 ,
    'operacao03'    => $operacao03 ,
    'data03'        => $data03 ,
    'produto04'     => $produto04 ,
    'operacao04'    => $operacao04 ,
    'data04'        => $data04 ,
    'produto05'     => $produto05 ,
    'operacao05'    => $operacao05 ,
    'data05'        => $data05 ,
    'produto06'     => $produto06 ,
    'operacao06'    => $operacao06 ,
    'data06'        => $data06 ,
    'produto07'     => $produto07 ,
    'operacao07'    => $operacao07 ,
    'data07'        => $data07 ,
    'produto08'     => $produto08 ,
    'operacao08'    => $operacao08 ,
    'data08'        => $data08 ,
    'produto09'     => $produto09 ,
    'operacao09'    => $operacao09 ,
    'data09'        => $data09 ,
    'produto10'     => $produto10 ,
    'operacao10'    => $operacao10 ,
    'data10'        => $data10 );
//criando o Json dos campos da tabela dinamica//
$Campos = array('produto', 'operacao','data');

$JsonCampos  = json_encode($Campos, true );

$JsonObj = json_encode($CamposPrinc, true );
$JsonObj = str_replace("/","@@@@",$JsonObj);

$DadosCad = $Webservice->AtualizarDadosNTOnline($JsonObj, $JsonCampos);

//$DadosCad1 = json_encode( $DadosCad, true );
$mesg= json_decode($DadosCad, true );
$_SESSION['msg']=$mesg;

require 'view_consulta.php';
?>



