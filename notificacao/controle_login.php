<?php
require ('Funcoes_config.php');//arruma depois require nessesario para manter a sessao aberta e agumas funçoes global
require ('D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');

if (isset ( $_GET ['p'] )) {
	$passo = $_GET ['p'];
} else {
	$passo = null;
}

switch ($passo) {
	
	case logar :
		if (isset ( $_POST ['login'] )) {
            efetuaLogir();
        } else {
			require 'login.php';
		}
		break;
	
	case trocarSenha :
		if ($_SESSION ["troca"] == "S") {
			trocarSenha();
		} else {
			require 'login.php';
		}
		break;
}
function efetuaLogir() {
	$msg = false;
	$ip = $_SERVER ['REMOTE_ADDR'];
	$Dados = "";
	
	$Webservice = new Webservice ();
	
	if (isset ( $_POST ['login'] )) {
		$login = $_POST ['login'];
		$senha = $_POST ['senha'];
		$codigo = $_POST ['codigo'];
		
		// Valida a senha e chama a conexão com o webservice
		
		if ($login != "") { //valida o campo da senha se esta preenchido

			$validaLogin = $Webservice->EfetuaLogin( $codigo, $login, $senha, $ip );

			$Dados = json_decode ( $validaLogin, true );


			
			// echo print_r ($Dados).'<br>';
			if  ($Dados ['TrocaSenha'] == "S") {
				$_SESSION ["login"] = $login;
				$_SESSION ["senha"] = $senha;
                $_SESSION ["codigo"] = $codigo;
				$_SESSION ["troca"] = $Dados ['TrocaSenha'];
				$label = "Trocar Senha";
				$div = "trocasenha";
				require 'login.php';
			}
		 else if ($Dados ['NomeCompleto'] == "0") { //Válida login e senha pelo servidor
				$msg = true;
				$msgErroLogin = "Usu&aacute;rio ou senha inv&aacute;lido!";
				require 'login.php';

			}
		 else if ($Dados ['NomeCompleto'] == "") { // quando nao consegue acesso ao servidor
				$msg = true;
				$msgErroLogin = "Servi&ccedil;o temporariamente indisponivel";
				require 'login.php';
				
			} else {
				
				$_SESSION ["nomeCompleto"]   = $Dados ['NomeCompleto'];
				$_SESSION ["tipoAcesso"]     = $Dados ['TipoAcesso'];
				$_SESSION ["master"]         = $Dados ['Master'];
                $_SESSION ["empresa"]        = $Dados ['Empresa'];
                $_SESSION ["idOrgaoEmpresa"] = $Dados ['IdOrgaoEmpresa'];
                $idOrgaoEmpresa              = $Dados ['IdOrgaoEmpresa'];
                $listaClientes = $Webservice->listaClientes($idOrgaoEmpresa);
                $listaCli = json_decode ( $listaClientes, true );
                $_SESSION ["clientes"]       =$listaCli;
                 require 'view_dashboard.php';
			}

		} else {
			
			$msgErroLogin = "Usu&aacute;rio ou senha Inv&aacute;lido";
			$msg = true;
			require 'login.php';
		}
	}
}
// fução valida e troca a senha do usuario
function trocarSenha() {
	$msg = false;
	$ip = $_SERVER ['REMOTE_ADDR'];
	$Dados = "";
	$codigo = $_SESSION['codigo']; //pegando c�digo do usuario
	$senha = $_POST ['senha']; // senha usauario
	$navaSenha = $_POST ['senha1']; // senha nova
	$repeteNovaSenha2 = $_POST ['senha2']; // cofima��o da nova senha
	$login = $_SESSION ["login"]; // login usando
	$senhaLogada = $_SESSION ["senha"]; // senha usada para loga pela primeira vez
	
	if ($navaSenha == $repeteNovaSenha2 && $navaSenha != "" && $senha == $senhaLogada) {
		
		$Webservice = new Webservice ();
		
		$trocarSenha = $Webservice->trocarSenha($codigo, $login, $senha, $navaSenha, $ip);
		$Dados = json_decode( $trocarSenha, true );
		
		if ($Dados ['Retorno'] == "Senha Alterada com Sucesso") {
			unset ( $_SESSION ["troca"] );
            $msg = true;
			$msgSucessoLogin = "Senha alterado com SUCESSO.";
			$msg = true;
			require 'login.php';
			
			
			
		} else {
			$msg = true;
			$msgErroLogin = "Senha N&atilde;o foi altrado tente novamente!";
			unset ( $_SESSION ["troca"] );
			$label = "Alterar Senha";
			$div = "trocasenha";
			require 'login.php';

		}
	} else {
		$msg = true;
		$label = "Trocar Senha";
		$div = "trocasenha";
		$msgErroLogin = "Senha N&atilde;o S&atilde;o iguas";
		require 'login.php';
	}
}

