<?php
require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');
// "aqui";
// Instancia a Classes
$Webservice = new Webservice ();

// Variaveis
$idConsulta		= $_POST['idConsulta'];
///echo $idConsulta."   numero";

// Traz dados

$Dados = $Webservice->ConsultarProdutos($idConsulta);

$ArquivoTemp = dirname ( __FILE__ ) . '\json\produ'. session_id ();
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $dadosAndamento );
fclose ( $fp );

?>

<script type="text/javascript">

$(function() {

	jQuery("#tabelaDetalhes").jqGrid({
		url:'get_peoduto_consulta.php',
		datatype: "json",
		colNames:['IDNTOLPRINCIPAL','IDLINHA', 'data',  'produto', 'operacao'],
		colModel:[
		{name:'IDNTOLPRINCIPAL',index:'IDNTOLPRINCIPAL', width: 80, classes: 'pointer'},
		{name:'IDLINHA', index:'IDLINHA', width: 80, classes: 'pointer'},
		{name:'data', index:'data',  width: 0, hidden: true, classes: 'pointer'},
		{name:'produto', index:'produto', width: 500,  classes: 'pointer'},
		{name:'operacao', index:'operacao', width: 500,  classes: 'pointer'},
		

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
});


</script>





