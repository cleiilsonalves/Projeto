
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="jquery.realperson.css">
    <meta name="title" content="CDT - Centro de Estudos de Títulos e Documentos de SP">
    <meta name="author" content="WEB">
    <meta name="url" content="http://www.cdtsp.com.br">
    <meta name="copyright" content="CDT - Centro de Estudos de Títulos e Documentos de SP">
    <meta name="description" content="CDT - Centro de Estudos de Títulos e Documentos de SP">
     
    <meta name="keywords" content="Certificação Digital, SPED, NF-e, Cartório, Eletrônico, Assinatura, Token, Smartcard, Receita Federal" />
    <meta name="DC.subject" content="Certificação Digital, SPED, NF-e, Cartório, Eletrônico, Assinatura, Token, Smartcard, Receita Federal" />
    <meta name="DC.creator" content="CDT - Centro de Estudos de Títulos e Documentos de SP" />
    <meta name="DC.contributors" content="web" />
     
    <meta name="dc.language" content="pt">
    <meta name="rating" content="general">
    <meta name="robots" content="index,follow">
    <meta name="robots" content="noarchive">
    <meta name="revisit-after" content="1 days"> 
    
    <meta http-equiv="Cache-Control" content="no-cache, no-store" />
    <meta http-equiv="Pragma" content="no-cache, no-store" />
    <meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT" />
<title>CDT - Centro de Estudos de Títulos e Documentos de SP</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/flexigrid.js" ></script>
<script type="text/javascript" src="js/i18n/grid.locale-pt-br.js" ></script>
<script type="text/javascript" src="js/jquery.jqGrid.js" ></script>
<script type="text/javascript" src="js/jquery-ui.js" ></script>

<script src="jquery.plugin.js"></script>
<script src="jquery.realperson.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/redmond/jquery-ui.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/ui.multiselect.css" />


<title>jQuery Real Person Submission</title>
<style type="text/css">
.accepted { padding: 0.5em; border: 2px solid green; }
.rejected { padding: 0.5em; border: 2px solid red; }
</style>
<script>
$(function() {
	$('#defaultReal').realperson();
});
$(function() {
	$('#defaultReal1').realperson();
});
$(function() {
	$('#defaultReal2').realperson();
});
$(document).ready(function(){
  
        $("p1").hide();
		$("p2").hide();
		$("p3").hide();
  
});

</script>
</head>
<body>

<script>

function Mostrar (int) {
	if ($('#submenu'+int).css('display') == 'none')
		$('#submenu'+int).slideDown()
	else
		$('#submenu'+int).slideUp()
}



function mostraHash1( ) {
		$("p2").hide();
		$("p3").hide();
        $('p1').show();
   
}
function mostraHash2() {
		$("p1").hide();
		$("p3").hide();
        $('p2').show();
   
}

function mostraHash3() {
		$("p1").hide();
		$("p2").hide();
        $('p3').show();
   
}
function SolicitarEmail ( ) {
var e = document.email;

$.post('consultas/processa_email.php', {'busca':e.nbusca.value,'emailBusca':e.email.value}, function (text,status,xml) {
	$('#resultadoBusca').html(text);
	window.alert('Email Eviado com Sucesso');

});
}


</script>
<?php


function rpHash($value) {
	$hash = 5381;
	$value = strtoupper($value);
	for($i = 0; $i < strlen($value); $i++) {
		$hash = (($hash << 5) + $hash) + ord(substr($value, $i));
	}
	return $hash;
}


?>

<div id="site">
	
  <div id="topo">
    	<div id="logo">	</div>
        <div id="nomecdt"></div>
        <div id="fb" title="Curta-nos no Facebook" style="cursor:pointer;" onClick="window.open('https://www.facebook.com/cdtsp')"></div>
    </div>
    
    <div style="clear:both;"></div>
    
    <div id="contexto">
      
         <div id="menu">
        <br>
        <?php include ('http://www.cdtsp.com.br/controles/menu.php') ?>
        <center><img src="http://www.cdtsp.com.br/images/oab.jpg"></center>
      </div>
      
      <div id="conteudo">
      <div id="texto">
	  
	 

<p id="demo"></p>

        <br />
        <p class="titulo">Consultas </p>
        <p>Realize a consulta de seus documentos:</p>
        <p>&nbsp;</p>
        <table width="100%" border="0" cellspacing="0">

          <tr>
            <td width="45%">
              <form name="talao" id ="myForm" method="post" action = "consultas.php">
              <table width="100%" border="0" cellspacing="0">
              <tr>
                <td colspan="2" align="center"><p class="titulo">Documentos</p> </td>
                </tr>
              <tr>
                <td>Nº Talão:</td>
                <td align="right"><input type="text" name="talao" size="7" required="" onfocus="mostraHash1()" /></td>
              </tr>
              <tr>
                <td>N° Senha:</td>
                <td align="right"><input type="text" id ="myInput" name="senhatalao" size="7" required="" /></td>
              </tr>
			  <tr>
			  <td colspan="2">&nbsp;</td>
				</tr>
				<tr>
			  <td colspan="2" align=right >
			  
			 <p1><input type="text" id="defaultReal" name="defaultReal" size="7"></p1>
			  </td>
			 
                </tr>
			  
			  
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" id="botaotalao" value="Consultar"></td>
              </tr>
              </table>
			  
              </form>
            </td>
            <td width="11%"><img src="images/linha_separadora.png"></td>
            <td width="47%">
              <form name="chamado" method="post" action="consultas.php">
              <table width="100%" border="0" cellspacing="0">
              <tr>
                <td colspan="2" align="center"><p class="titulo">Logística</p>
					</td>
                </tr>
              <tr>
                <td>Nº Chamado:</td>
                <td align="right"><input type="text" name="chamado" size="7" required=""  onfocus="mostraHash2()"/></td>
              </tr>
              <tr>
                <td>Nº Segurança:</td>
                <td align="right"><input type="text" name="senhachamado" size="7" required="" /></td>
              </tr>
			  
			  </tr>
			  <tr>
			  <td >&nbsp;</td>
				</tr>
				<tr>
			  <td colspan="2" align=right>
			  	 <p2><input type="text" id="defaultReal1" name="defaultReal" size="7"  ></p2>
			  </td>
			 
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" id="botaochamado" value="Consultar"></td>
              </tr>
            </table>
            </form>
            </td>
          </tr>
        </table>
		<hr size="1">
        <p>&nbsp;</p>
		 
		 <form name="busca" method="post" action="consultas.php">
              <table width="47%" border="0" cellspacing="0">
              <tr>
			  <td colspan="2" align="center">
			  <p class="titulo" >Busca</p>
			  </td>
			  </tr>
              <tr>
                <td>Nº Remessa</td>
                <td align="right"><input type="text" name="busca" size="7" required="" onfocus="mostraHash3()" /></td>
              </tr>
              <tr>
                <td>Nº Senha</td>
                <td align="right"><input type="text" name="senhaBusca" size="7" required="" /></td>
              </tr>
			  <tr>
			  <td colspan="2">&nbsp;</td>
				</tr>
				<tr>
			  <td colspan="2" align=right>
			  
			 <p3><input type="text" id="defaultReal2" name="defaultReal" size="7"  ></p3>
			  </td>
			 
                </tr>
			  
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" id="botaoBusca" value="Consultar"></td>
              </tr>
            </table>
            </form>
        <hr size="1">
        <p>&nbsp;</p>
        <div id="resultado"> 
		
		<?php
if(isset($_POST['talao'])|| isset($_POST['chamado'])|| isset($_POST['busca'])){

$talao 			= $_POST['talao'];
$senhatalao 	= $_POST['senhatalao'];
$chamado 		= $_POST['chamado'];
$senhaChamado 	= $_POST['senhachamado'];
$busca			= $_POST['busca'];
$senhaBusca		= $_POST['senhaBusca'];
$v				= rpHash($_POST['defaultReal']);
$logisticaHash 	= rpHash($_POST['defaultReal1']);

if ($v == $_POST['defaultRealHash']&&$talao!="") {?>

<script>
$(function( ) {
	
	//var d = document.talao;
	$('#botaotalao').attr('disabled','disabled');
	$('#botaotalao').val('Carregando...');
  //window.alert(talao+" ==="+senhatalao);
		
	$.post('consultas/processa_consulta1.php', {talao:'<?=$talao?>', senhatalao:'<?=$senhatalao?>'}, function (text,status,xml) {
		$('#resultado').html(text);
		$('#botaotalao').removeAttr('disabled');
		$('#botaotalao').val('Consultar');
		//faz a tela move para div resultado
		$('html, body').animate({
			   scrollTop: $("#resultado").offset().top
			   
			},1000);
	});
});
</script>
<p>&nbsp;</p>
<?php }
 else if($v == $_POST['defaultRealHash'] && $chamado!=""){?>  
 
<script>
$(function() {
	
	$('#botaochamado').attr('disabled','disabled');
	$('#botaochamado').val('Carregando...');
	$.post('consultas/processa_consulta1.php', {chamado:'<?=$chamado?>', senhachamado:'<?=$senhaChamado?>'}, function (text,status,xml) {
		$('#resultado').html(text);
		$('#botaochamado').removeAttr('disabled');
		$('#botaochamado').val('Consultar');
		//faz a tela move para div resultado
		$('html, body').animate({
			   scrollTop: $("#resultado").offset().top
			   
			},1000);
	});
});


</script>

 <?php }
 else if($v == $_POST['defaultRealHash'] && $busca!=""){?>  
 
<script>
$(function () {
	//var d = document.busca;
	$('#botaoBusca').attr('disabled','disabled');
	$('#botaoBusca').val('Carregando...');
	$.post('consultas/processa_busca.php', {busca:'<?=$busca?>', senhaBusca:'<?=$senhaBusca?>'}, function (text,status,xml) {
		$('#resultado').html(text);
		$('#botaoBusca').removeAttr('disabled');
		$('#botaoBusca').val('Consultar');
		//faz a tela move para div resultado
		$('html, body').animate({
			   scrollTop: $("#resultado").offset().top
			   
			},1000);
	});
});

</script>

<?php

} else {
?>
<p class="rejected">Digita corretamente os caracter ao lado.</p>
<?php
		}}
?>  </div>
         <div id="resultadoBusca">   </div>
		
		
		 </div>
      </div>
      </div>
      
      <div style="clear:both;"></div>
      
      <div id="bottom">
        <br /><br />
        <center>
          <img src="images/endereco.jpg">
        </center>
      </div>
      
    </div>
    
</div>

</body>
</html>