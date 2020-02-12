<?php

// Configura?s do Sistema
// header("Content-Type: text/html; charset=ISO-8859-1", true );
require ( 'D:/GER/inetpub/wwwroot/consultas/funcoes.php' );
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');
// Instanciar Classe
$Webservice = new Webservice ();

// VariÃ¡veis
$Opcao = 	$_POST ['opcao'];
$Busca =	$_POST ['busca'];
$filtro =	$_POST ['busca'];
$BuscaDt =	$_POST ['buscaDt'];

if ($Opcao == 4) {
		
			$DtBusca1 = str_replace ( '/', '-', $BuscaDt );
	 if($data = date ( "d-m-Y", strtotime ( $DtBusca1 ) )){
		$Dados = $Webservice->ConsultarDadosSafra ( $Opcao, '0', $data );
	 }else{
	 	$Dados = $Webservice->ConsultarDadosSafra ( $Opcao, '0', $DtBusca1 );
	 }
	
	} else {
		$Dados = $Webservice->ConsultarDadosSafra ( $Opcao, '0', $Busca );
	// echo $Busca;
}
$ArquivoTemp = dirname ( __FILE__ ) . '\json\s' . session_id ();
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $Dados );
fclose ( $fp );

?>
<table id="tabela"></table>
<div id="pag_tabela"></div>

<script type="text/javascript">

$(function() {
		
		jQuery("#tabela").jqGrid({
			url:'get_consulta.php',
			datatype: "json",
			colNames:['Lançamento','Entrada', 'Parte', 'Cédula', 'Aditamento', 'Cartório', 'Cidade', 'Posição'],
			colModel:[
				{name:'Lancamento',index:'Lancamento',width: 100, classes: 'pointer'},
				{name:'DtEntrada', index:'DtEntrada', width: 90, classes: 'pointer'},
				{name:'Parte', index:'Parte', width: 170, classes: 'pointer'},
				{name:'Contrato', index:'Contrato',width: 80,  classes: 'pointer'},
				{name:'Aditamento', index:'Aditamento',width:100, classes: 'pointer'},
				{name:'Cartorio', index:'Cartorio',width: 200,  classes: 'pointer'},
				{name:'CidadeCartorio', index:'CidadeCartorio',width: 180,  classes: 'pointer'},
				{name:'Posicao', index:'Posicao', width: 300, classes: 'pointer'},
			],
			rowNum: 10,
			rowLisst: [10, 20, 30],
			pager: '#pag_tabela',
			sortname: 'Lancamento',
			viewrecords: true,
			sortorder: "asc",
			gridview: false,
			autowidth: true,
			height: 230,
			onSelectRow: function(ids) {
				
				var linha = jQuery("#tabela").jqGrid('getRowData', ids);
				var idConsulta = linha.Lancamento;
				
			
			$.post('historico_consulta.php', {'idConsulta':idConsulta}, function (text,status,xml) {
			$('#detalhesConsulta').html(text);

			});
				$('html, body').animate({
				   scrollTop: $("#detalhesConsulta").offset().top
				},1000);
			}
			
		});
		jQuery("#tabela").jqGrid('navGrid','#pag_tabela',{edit: false, add: false, del: false, search: false, refresh: true});
		
		// Bind the navigation and set the onEnter event
		jQuery("#tabela").jqGrid('bindKeys', {"onEnter":function( rowid ) { } } );

		
		
	
	});
</script>
<hr size="1" color="#c8ced8">
<div id="detalhesConsulta"></div>