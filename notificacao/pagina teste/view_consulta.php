
<?php
$campoSelect = "";
   session_start ();


 if (isset ( $_SESSION ["nomeCompleto"] )) {
	 session_start ();
	//  $idetifica = "Olá " . $_SESSION ["nomeCompleto"] ;
	  } else {
	  $div = "";
	  $msg = "";
	  require_once 'view_login.php';
	 // header ( "Location:view_login.php" );
	  return false;

  }



?>

<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title"
	content="CDT - Centro de Estudos de TÃ­tulos e Documentos de SP">
<meta name="author" content="WEB">
<meta name="url" content="http://www.cdtsp.com.br">
<meta name="copyright"
	content="CDT - Centro de Estudos de TÃ­tulos e Documentos de SP">
<meta name="description"
	content="CDT - Centro de Estudos de TÃ­tulos e Documentos de SP">

<meta name="keywords"
	content="CertificaÃ§Ã£o Digital, SPED, NF-e, CartÃ³rio, EletrÃ³nico, Assinatura, Token, Smartcard, Receita Federal" />
<meta name="DC.subject"
	content="CertificaÃ§Ã£o Digital, SPED, NF-e, CartÃ³rio, EletrÃ³nico, Assinatura, Token, Smartcard, Receita Federal" />
<meta name="DC.creator"
	content="CDT - Centro de Estudos de TÃ­tulos e Documentos de SP" />
<meta name="DC.contributors" content="web" />
<meta name="dc.language" content="pt">
<meta name="rating" content="general">
<meta name="robots" content="index,follow">
<meta name="robots" content="noarchive">
<meta name="revisit-after" content="1 days">

<meta http-equiv="Cache-Control" content="no-cache, no-store" />
<meta http-equiv="Pragma" content="no-cache, no-store" />
<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT" />
<link rel="stylesheet" type="text/css" href="../safra/sStyle.css">

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/flexigrid.js"></script>
<script type="text/javascript" src="js/i18n/grid.locale-pt-br.js"></script>
<script type="text/javascript" src="js/jquery.jqGrid.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" media="screen"
	href="themes/redmond/jquery-ui.css" />
<link rel="stylesheet" type="text/css" media="screen"
	href="themes/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" media="screen"
	href="themes/ui.multiselect.css" />




<script>

function Campos( value ) {
	
	p1 =          $('p[id="p1"]');
	p2 =          $('p[id="p2"]');

	if ( value == 4 ) {
		p2.show();
		p1.hide();
		 
	}else{
		
		p1.show();
		p2.hide();
		}
}
function ConsultaSafra ( ) {



	
		var d = document.safra;
			
		
		
		
		
        
		
		$('#botao').attr('disabled','disabled');
		$('#botao').val('Carregando...');
		$.post('consulta.php', {'opcao':d.opcao.value,'busca':d.argumento.value, 'buscaDt':d.argumentoDt.value}, function (text,status,xml) {
			$('#resultado').html(text);
			$('#botao').removeAttr('disabled');
			$('#botao').val('Consultar');
		});
		 
	
       
}
</script>




<title>Consulta Safra</title>


</head>
<body>

	<div id="topo">
		 <img src="img/banne_safra.jpg" height="100%;" width="100%;">

	</div>

	<div id=site>
		<div id=menu>


<button value="Entrar" onclick="location. href= '#' ">Consulta</button>
<button value="Entrar" onclick="location. href= 'view_consulta_cartorios.php' ">Cartórios</button>
<button value="Entrar" onclick="location. href= 'sair.php' ">Sair</button>


		</div>

		<div id="areaCosulta">
			<form name="safra" method="post"
				onSubmit="ConsultaSafra();return false;">
				<p>
					Consulta: <select id="inputCosulta" onchange="Campos(this.value);" size="1" name="opcao">
						<option selected="selected" value="0">N. Lançamento</option>
						<option value="1">N. Cédula</option>
						<option value="2">Parte</option>
						<option value="3">Comarca</option>
						<option value="4">Data de Entrada</option>
						<option value="5">N. Aditamento</option>
					</select>
				</p>
				

				<p id ="p1">
					Busca: <input id="inputCosulta" type="text" name="argumento"
						size="15" />
				</p>

				
				<p id ="p2" hidden>
					Data: <input id="inputCosulta" type="date" name="argumentoDt"
						size="15"/>
				</p>
				
			
				<p>
					<input type="submit" id="botao" value="Consultar"
						style="font-size: 20px;" />
				</p>
			</form>
		</div>

		<div id="resultado"></div>


		<div id="bottom">

			<img src="img/roda_pe_safra.jpg" height="100%;" width="100%;">
		</div>

	</div>
</body>