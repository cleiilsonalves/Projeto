<?php
require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
$Webservice = new Webservice ();
// Variaveis
$idProduto		= $_POST['idProduto'];
// Traz dados
$Dados = $Webservice->ConsultarProdutos($idProduto);
//$DadosProdutos = json_decode( $Dados , true);
session_start();
$_SESSION['dadosProduto'] = $Dados;

?>




