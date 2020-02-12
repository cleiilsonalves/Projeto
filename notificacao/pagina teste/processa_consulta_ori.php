<style type="text/css">
.blink { text-decoration: blink; }
</style>

<p class="titulo">Resultado consulta <?=($_POST['talao'] != '') ? 'Talão' : 'Logística'?>:</p>
<p style="font-family:verdana;color:red">Clique sobre a linha da tabela para obter maiores informações do talão:</p>
<span class="blink"><div id="textostatus"></div></span>
<table id="tabela" ></table>


<script type="text/javascript">




$(function() {
	jQuery("#tabela").jqGrid({
		url:'consultas/get_consultas.php?chamado=<?=$_POST['chamado']?>&senhachamado=<?=$_POST['senhachamado']?>&talao=<?=$_POST['talao']?>&senhatalao=<?=$_POST['senhatalao']?>',
		datatype: "json",
		colNames:['ID','Status','Data Entrada','Talão','RTD'],
		colModel:[
			{name:'ID', index:'ID', hidden: true, classes: 'pointer'},
			{name:'Status', index:'Status',hidden: true, width: 500, classes: 'pointer'},
			{name:'DataEntrada', index:'DataEntrada',width: 120, classes: 'pointer'},
			{name:'Talao', index:'Talao',width: 100, classes: 'pointer'},
			{name:'RTD', index:'RTD', width: 200,classes: 'pointer'}
			
		],
		rowNum: 100000000000,
		rowLisst: [10, 20, 30],
		pager: '#pag_tabela',
		sortname: 'ID',
		viewrecords: true,
		sortorder: "asc",
		gridview: false,
		autowidth: true,
		height: 150,
		onSelectRow: function(ids) {
				
                        var linha = jQuery("#tabela").jqGrid('getRowData', ids);
			//console.log(linha.Talao);
			$.post('consultas/detalhe_consulta.php', {'talao':linha.Talao}, function (text,status,xml) {
				$('#detalhesConsulta').html(text);
			});
			$('html, body').animate({
			   scrollTop: $("#detalhesConsulta").offset().top
			},1000);
                        $('#textostatus').html('<p style="color:red">'+linha.Status+'</p>');
		}
		
	});
	
	jQuery("#tabela").jqGrid('navGrid','#pag_tabela',{edit: false, add: false, del: false, search: false, refresh: true});
	
	// Bind the navigation and set the onEnter event
	jQuery("#tabela").jqGrid('bindKeys', {"onEnter":function( rowid ) { } } );
});
</script>

<div id="detalhesConsulta"></div>
