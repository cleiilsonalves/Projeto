<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 07/02/2017
 * Time: 15:08
 */
require ('config.php');
require ('Funcoes_config.php');//arruma depois require nessesario para manter a sessao aberta e agumas funçoes global
session_start();
$nomeCompleto    =$_SESSION ["nomeCompleto"];

require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php' );
$Webservice = new Webservice();
$cliente        =$_POST['cliente'];
$dtIni          ='';
$tdFim          ='';
$nome           ='';
$tpStatus 		='A Liberar';

$dados = $Webservice->DadosNTOnlineLiberacao($cliente, $dtIni, $tdFim, $nome, $tpStatus);
//echo 'primeiro objeto:'.$dados .'<br>';
 $ArquivoTemp = dirname ( __FILE__ ) . '\json\NotiLibera' . session_id ().'.json';
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $dados);
fclose ( $fp );

$dadosAss = $Webservice->ListarAssinaturas($cliente);
$dadosAss =  json_decode($dadosAss, true);
?>
<div class="col-sm-11">
<table id="tabela"></table>
<div id="pag_tabela"></div>

<script type="text/javascript">

	$(function () {

		jQuery("#tabela").jqGrid({
			url:'get_consulta_liberacao.php',
			datatype: "json",
			colNames:['IDTABELA','TIPONT', 'CODIGOCLI', 'DEPTOCLI', 'NOMECLI', 'DTENTRADA', 'HRENTRADA', 'LOGINENTRADA', 'DESTINATARIO', 'DOC.', 'CEP', 'ENDERECO', 'NUMERO', 'COMPLEMENTO', 'BAIRRO', 'CIDADE', 'UF', 'NOMEDEVEDOR','MODELO'],
			colModel:[
				{name:'IDTABELA', index: 'IDTABELA', key: true,  hidden:true },
				{name:'TIPONT',index:'TIPONT',sorttype:'string', width: 15, classes: 'pointer'},
				{name:'CODIGOCLI',index:'CODIGOCLI',sorttype:'string', classes: 'pointer', hidden:true},
				{name:'DEPTOCLI',index:'DEPTOCLI',sorttype:'string', classes: 'pointer', hidden:true },
				{name:'NOMECLI',index:'NOMECLI',sorttype:'string', classes: 'pointer', hidden:true},
				{name:'DTENTRADA',index:'DTENTRADA',sorttype:'string', classes: 'pointer', hidden:true},
				{name:'HRENTRADA',index:'HRENTRADA',sorttype:'string', classes: 'pointer', hidden:true},
				{name:'LOGINENTRADA',index:'LOGINENTRADA',sorttype:'string', classes: 'pointer', hidden:true},
				{name:'DESTINATARIO',index:'DESTINATARIO',sorttype:'string',width: 100, classes: 'pointer'},
				{name:'DOCDEST',index:'DOCDEST',sorttype:'string',width: 60, classes: 'pointer' },
				{name:'CEP',index:'CEP',sorttype:'string',width: 45, classes: 'pointer'},
				{name:'ENDERECO',index:'ENDERECO',sorttype:'string',width: 110, classes: 'pointer'},
				{name:'NUMERO',index:'NUMERO',sorttype:'string',width: 25, classes: 'pointer'},
				{name:'COMPLEMENTO',index:'COMPLEMENTO',sorttype:'string',width: 50, classes: 'pointer'},
				{name:'BAIRRO',index:'BAIRRO',sorttype:'string',width: 50, classes: 'pointer'},
				{name:'CIDADE',index:'CIDADE',sorttype:'string',width: 50, classes: 'pointer'},
				{name:'UF',index:'UF',sorttype:'string',width: 20, classes: 'pointer'},
				{name:'NOMEDEVEDOR',index:'NOMEDEVEDOR',sorttype:'string',width: 100, classes: 'pointer'},
				{name:'MODELO',index:'MODELO',sorttype:'string',width: 50, classes: 'pointer'}

			],
			rowNum: 20,
			rowLisst: [20, 40, 60],
			pager: '#pag_tabela',
			sortname: 'IDTABELA',
			viewrecords: true,
			sortorder: "desc",
			gridview: false,
			autowidth: true,
			height: 450,
			subGrid:true,
			multiselect:true,
			subGridRowExpanded: showChildGrid, // javascript function that will take care of showing the child grid
		});

	// the event handler on expanding parent row receives two parameters
	// the ID of the grid tow  and the primary key of the row
	function showChildGrid(parentRowID, parentRowKey) {
		var childGridID = parentRowID + "_table";
		var childGridPagerID = parentRowID + "_pager";
		// send the parent row primary key to the server so that we know which grid to show
		//var childGridURL = ids +".json";
		var idProduto = parentRowID.split("_").pop();

			//jQuery('#tabela').jqGrid('setSelection', idProduto);

		var jqxhr = $.post('consulta_produto.php', {'idProduto': idProduto}, function() {
			preeche(childGridID, childGridPagerID, parentRowID);
		})
	}
function preeche(childGridID, childGridPagerID, parentRowID ) {

							// add a table and pager HTML elements to the parent grid row - we will render the child grid here
			$('#' + parentRowID).append('<table id=' + childGridID + '></div>');

			$("#" + childGridID).jqGrid({
				 url: 'get_produto_consulta.php',
				datatype: "json",
				colNames:['IDNTOLPRINCIPAL','ID',  'PRODUTO', 'OPERAÇÃO', 'DATA'],
				colModel:[
					{name:'IDNTOLPRINCIPAL',index:'IDNTOLPRINCIPAL',  classes: 'pointer', hidden:true},
					{name:'IDLINHA', index:'IDLINHA', classes: 'pointer', hidden:true},
					{name:'produto', index:'produto', width: 400,  classes: 'pointer'},
					{name:'operacao', index:'operacao', width: 400,  classes: 'pointer'},
					{name:'data', index:'data',  width: 100, classes: 'pointer', formatter : 'date', formatoptions : {newformat : 'd-m-Y'}},
					],
				rowNum: 10,
				rowLisst: [10, 20, 30],
				sortname: 'IDLINHA',
				viewrecords: true,
				sortorder: "desc",
				height: '100%',
				gridview: false,
				autowidth: true,
				onSelectRow: function(ids) {}
				 // set the subGrid property to true to show expand buttons for each row
			});
		}

		jQuery("#tabela").jqGrid('navGrid','#pag_tabela',{edit: false, add: false, del: false, search: false, refresh: true});
		// Bind the navigation and set the onEnter event
		jQuery("#tabela").jqGrid('bindKeys', {"onEnter":function( rowid ) { } } );
	});

	jQuery("#alterar").click(function(){
            var selr = jQuery('#tabela').jqGrid('getGridParam','selarrrow');
            if(selr) alert(selr);
        });


	jQuery("#excluir").click(function(){
		var selr = jQuery('#tabela').jqGrid('getGridParam','selrow');
			if(selr){
				$('#ConfModal').modal('show');
			}else{
			$('#msgSel').modal('show');
			return false;
	}
	});

	$('#liberarObjeto').click(function(){
		$('#selAss').modal('show');
	});
	function confimaLiberacao(){
		var comboAss = $('select[name="assinatura"]');
		var Assinatura = comboAss.val();
		//alert(Assinatura);
		var selrLiberar = jQuery('#tabela').jqGrid('getGridParam','selarrrow');
		if(selrLiberar!='') {
			var jqr = $.post('controle_libera_nt.php', {'idSelTabela': selrLiberar, 'assinatura': Assinatura}, function() {
				window.location.href = "view_consulta_liberacao.php";
			});
		}else
			$('#msgSel').modal('show');
		return false;

	}
function modal() {
    $('#selAss').modal('show');
}
</script>
</div>
<div id="detalhesConsulta" class="col-sm-1 borda">
	<div class="col-sm-12">
	<button id="liberarObjeto" class="fa fa-check-square btn btn-info btn-lg"> Liberar NT</button>
	</div>
</div>
<div class="row">
	<div id="msgSel" class="modal fade in">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<div class="modal-body">
					<p>Seleciona os Documento a Ser Liberado.</p>
				</div>
				<div class="modal-footer">
					<div class="btn-group">
						<button class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> OK </button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dalog -->
		</div><!-- /.modal -->
	</div>
</div>

<div class="row">
	<div id="selAss" class="modal fade in">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<div class="modal-body">
					<select class="form-control" name="assinatura" id="assinatura">
						<?php foreach($dadosAss as $v){ ?>
						<option value="<?= $v ?>"> <?= $v ?></option>
                        <?php } ?>
					</select>
				</div>
				<div class="modal-footer">
					<div class="btn-group">
						<button class="btn btn-success"  data-dismiss="modal" onclick="confimaLiberacao()"><span class="glyphicon glyphicon-check"></span>OK</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dalog -->
		</div><!-- /.modal -->
	</div>
</div>


