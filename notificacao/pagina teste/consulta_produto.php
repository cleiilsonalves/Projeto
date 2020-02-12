<?php
require ( 'D:/GER/inetpub/wwwroot/consultas/funcoes.php');
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');
// "aqui";
// Instancia a Classes
$Webservice = new Webservice ();

// Variaveis
$idProduto		= $_POST['idProduto'];


// Traz dados

$Dados = $Webservice->ConsultarProdutos ($idProduto );
$DadosProdutos = json_decode( $Dados , true);


$ArquivoTemp = dirname ( __FILE__ ) . '\json\produto' . session_id ();
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $DadosProdutos );
fclose ( $fp );

//print_r($dadosDucumentos);
?>




