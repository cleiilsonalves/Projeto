<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 10/04/2017
 * Time: 12:32
 */



require ('config.php');
require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php' );
$Webservice = new Webservice ();
session_start();
$maquinaid       =$_SESSION['maquinaid'];
$nomeCompleto    =$_SESSION ["nomeCompleto"];
$codDpt         =$_POST['codDpt'];
$extensoes = array('.xls', '.xlsx',);//Array a extenção do aquivo para a validaçã para outros formatos só acrescentar dento do array' ex .txt'
$ext = strstr($_FILES['file']['name'], '.'); //pegando a extenção do aquivo para a validação

//$uploaddir = dirname ( __FILE__ ) . '\json';
$uploaddir = dirname ( __FILE__ ) . '\Temp\\';
$uploadFile = $uploaddir .$_FILES['file']['name'];

if(in_array($ext, $extensoes) === true ) {

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {

    $Dados = $Webservice->ProcessarArquivo($codDpt, $uploadFile, $nomeCompleto, $maquinaid);
    $DadosRetorno = json_decode($Dados, true);
    //print_r($DadosRetorno);

   $msg = true;
  $msgRetono = "Arquivo importado com SUCESSO";
   require 'view_import.php';
} else {

    echo "Nao foi possivel importa este arquivo\n";
}

}else
{
    $msg = true;
    $msgRetono = "Arquivo incorreto";
   require 'view_import.php';
}

?>