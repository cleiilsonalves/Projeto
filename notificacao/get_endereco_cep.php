<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 03/04/2017
 * Time: 15:40
 */
require ('config.php');
require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');
// Instancia a Classes


//apagando os arquivo depois de tres dias
$date = strtotime('-3 day', mktime());

foreach(glob('json/*.json') as $file)
{
    $filetime = filemtime($file);

    if( $date > $filetime )
    {
        @unlink($file);
    }
}

$Webservice = new Webservice ();
// Variaveis
session_start();
$cep		= $_POST['cep'];


$_SESSION['sessionID']       = session_id ();
$Dados = $Webservice->getEnderecoCep($cep);
//$dadosCep = json_decode( $Dados , true);

$ArquivoTemp = dirname ( __FILE__ ) . '\json\endcep' . session_id ().'.json';
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $Dados);
fclose ( $fp );



