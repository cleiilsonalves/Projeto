<?php
require ( 'D:/GER/inetpub/wwwroot/consultas/funcoes.php' );
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');
// "aqui";
// Instancia a Classes
$Webservice = new Webservice ();

// Variaveis
$idConsulta		= $_POST['idConsulta'];
///echo $idConsulta."   numero";

// Traz dados

$Dados = $Webservice->ConsultarLancamento ($idConsulta );
$Dados = json_decode( $Dados , true);

$dadosDucumentos = json_encode($Dados['Documentos']);
$dadosAndamento = json_encode($Dados['Andamento']);
//$dadosAndamento = json_encode($Dados['Imagem']);
$ArquivoTemp = dirname ( __FILE__ ) . '\json\d' . session_id ();
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $dadosAndamento );
fclose ( $fp );
$dadosAndamento = json_encode($Dados['Imagem']);
//$dadosAndamento = json_encode($Dados['Imagem']);
$ArquivoTemp = dirname ( __FILE__ ) . '\json\i' . session_id ();
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $dadosAndamento );
fclose ( $fp );
//print_r($dadosDucumentos);
?>
<table id="tabelaDetalhes"></table>
<div id="pag_tabela1"></div>


<hr size="1" color="#c8ced8">
<div id="buttonPDF"></div>

<table id="tabelaDetalhes1" ></table>
<div id="pag_tabela2"></div>

<script type="text/javascript">

$(function() {

	jQuery("#tabelaDetalhes").jqGrid({
		url:'get_historico_consulta.php',
		datatype: "json",
		colNames:['Data','Hora', 'Posição',  'Descrição'],
		colModel:[
		{name:'DataPosicao',index:'DataPosicao', width: 80, classes: 'pointer'},
		{name:'HoraPosicao', index:'HoraPosicao', width: 80, classes: 'pointer'},
		{name:'Posicao', index:'Posicao',  width: 0, hidden: true, classes: 'pointer'},
		{name:'Descricao', index:'Descricao', width: 500,  classes: 'pointer'},
		

		],

		
		rowNum: 10,
		rowLisst: [10, 20, 30],
		pager: 'pag_tabela1',
		sortname: 'Data',
		viewrecords: true,
		sortorder: "asc",
		gridview: false,
		autowidth: true,
		height: 230,
		onSelectRow: function(ids) {

			var linha = jQuery("#tabelaDetalhes").jqGrid('getRowData', ids);
			

			

		
			$('html, body').animate({
				scrollTop: $("#form_pesquisa").offset().top
			},1000);
		}
			
	});
	jQuery("#tabelaDetalhes").jqGrid('navGrid','pag_tabela1',{edit: false, add: false, del: false, search: false, refresh: true});
	// Bind the navigation and set the onEnter event
	jQuery("#tabelaDetalhes").jqGrid('bindKeys', {"onEnter":function( rowid ) { } } );

//tabela consuta imagem
$(function() {

	jQuery("#tabelaDetalhes1").jqGrid({
		url:'get_imagem.php',
		datatype: "json",
		colNames:['IDImagem','Imagens','AnoImagem','Imagens','TipoImagem'],
		colModel:[
		{name:'IDImagem',index:'IDImagem',width: 80,  hidden: true, classes: 'pointer'},
		{name:'NomeImagem',index:'NomeImagem',width: 80, classes: 'pointer'},
		{name:'AnoImagem', index:'AnoImagem', width: 80, hidden: true, classes: 'pointer'},
		{name:'Imagem', index:'Imagem', width: 80, hidden: true, classes: 'pointer'},
		{name:'TipoImagem', index:'TipoImagem', width: 80, hidden: true, classes: 'pointer'},
		

		],

		
		rowNum: 10,
		rowLisst: [10, 20, 30],
		pager: 'pag_tabela2',
		sortname: 'NomeImagem',
		viewrecords: true,
		sortorder: "asc",
		gridview: false,
		autowidth: true,
		height: 230,
		onSelectRow: function(ids) {

			var linha = jQuery("#tabelaDetalhes1").jqGrid('getRowData', ids);
			var Imagem = linha.Imagem;
			var AnoImagem = linha.AnoImagem;
			var TipoImagem = linha.TipoImagem;
			$('#buttonPDF').html('<h3>Carregando...<h3>');

			//$("#detalhesConsulta").load('historico_consulta.php',idConsulta);
			//LoadData ('historico_consulta.php','detalhesConsulta','idConsulta='+linha.idConsulta);
			$.post('get_pdf.php', {'Imagem':Imagem,'AnoImagem':AnoImagem, 'TipoImagem':TipoImagem }, function (text,status,xml) {
				$('#buttonPDF').html(text);

			});
			$('html, body').animate({
				scrollTop: $("#form_pesquisa").offset().top
			},1000);
		}
			
	});
	jQuery("#tabelaDetalhes1").jqGrid('navGrid','pag_tabela2',{edit: false, add: false, del: false, search: false, refresh: true});
	// Bind the navigation and set the onEnter event
	jQuery("#tabelaDetalhes1").jqGrid('bindKeys', {"onEnter":function( rowid ) { } } );


	
});

});


</script>
<hr size="1" color="#c8ced8">
<div id="buttonPDF"></div>





