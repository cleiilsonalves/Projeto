<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 07/02/2017
 * Time: 15:08
 */
require ('config.php');

session_start();
$nomeCompleto    =$_SESSION ["nomeCompleto"];
$maquinaid =  $_SESSION['maquinaid'];

require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
$Webservice = new Webservice();
$cliente        =$_POST['cliente'];
$dtIni          =$_POST ['dtInio'];
$tdFim          =$_POST ['dtFim'];
$nome           =$_POST ['nome'];


$dados = $Webservice->DadosNTOnline($cliente, $dtIni, $tdFim, $nome);
$dados1 = json_decode($dados);
$dadosPrincipal = $dados1[0];
$dadosAux = $dados1[1];




//$dados2 = str_replace('\\','',$dados);
/*print_r( $dadosPrincipal);
echo '<br>--------------------------------------------------------------------------------- <br>';
print_r($dadosAux);
?>
*/
 $ArquivoTemp = dirname ( __FILE__ ) . '\json\Not' . session_id ();
@unlink ( $ArquivoTemp );
$fp = fopen ( $ArquivoTemp, "a" );
fwrite ( $fp, $objeto);
fclose ( $fp );


?>
<div id="page" data-role="page" data-theme="a">
    ...
    <table id='grid'></table>
    <div id='pager'></div>


    <script type='text/javascript'>
		$(function() {
        jQuery('#grid').jqGrid({
            width:"650",
            hoverrows:false,
            viewrecords:true,
            jsonReader:{"repeatitems":false,"subgrid":{"repeatitems":false}},
            gridview:false,
            url:'get_consultas.php',
            rowNum:10,
            height:200,
            rowList:[10,20,30],
            subGridWidth:70,
            sortname:"EmployeeID",
            subGrid:true,
            subGridRowExpanded:function(subgridid,id)	{
                var data = {subgrid:subgridid, rowid:id};
                $("#"+jQuery.jgrid.jqID(subgridid)).load('custom_detail.php',data);
            },
            datatype:"json",
            colModel:[

                {name:'IDTABELA',index:'IDTABELA',sorttype:'int',key:true, hidden:true, editable:true},
                {name:'TIPONT',index:'TIPONT',sorttype:'string',editable:true, hidden:true},
                {name:'CODIGOCLI',index:'CODIGOCLI',sorttype:'string',editable:true, hidden:true},
                {name:'DEPTOCLI',index:'DEPTOCLI',sorttype:'string',editable:true, hidden:true },
				{name:'NOMECLI',index:'NOMECLI',sorttype:'string',editable:true, hidden:tru},
				{name:'DTENTRADA',index:'DTENTRADA',sorttype:'string',editable:true, hidden:tru},
				{name:'HRENTRADA',index:'HRENTRADA',sorttype:'string',editable:true, hidden:tru},
				{name:'LOGINENTRADA',index:'LOGINENTRADA',sorttype:'string',editable:true},
				{name:'DESTINATARIO',index:'DESTINATARIO',sorttype:'string',editable:true},
				{name:'CEP',index:'CEP',sorttype:'string',editable:true},
				{name:'ENDERECO',index:'ENDERECO',sorttype:'string',editable:true},
				{name:'NUMERO',index:'NUMERO',sorttype:'string',editable:true},
				{name:'COMPLEMENTO',index:'COMPLEMENTO',sorttype:'string',editable:true},
				{name:'BAIRRO',index:'BAIRRO',sorttype:'string',editable:true},
				{name:'CIDADE',index:'CIDADE',sorttype:'string',editable:true},
				{name:'UF',index:'UF',sorttype:'string',editable:true}



            ],
            prmNames:{subgrid:'subgrid'},
            loadError:function(xhr,status, err){
                try {
                    jQuery.jgrid.info_dialog(jQuery.jgrid.errors.errcap,'
                    '+ xhr.responseText +'
                    ', jQuery.jgrid.edit.bClose,{buttonalign:'right'});
                } catch(e) {
                    alert(xhr.responseText);
                }
            },
            pager:'#pager'
        })});
        ...
    </script>
</div>
<?php

// Connection to the server
/*
$s = "<table><tbody>";
    $s .= "<tr><td><b>First Name</b><td>FirstName</td>";
        $s .= "<td rowspan='9' valign='topjpg'/></td></tr>";
    $s .= "<tr><td><b>Last Name</b></td><td>LastName</td></tr>";
    $s .= "<tr><td><b>Title</b></td><td>Title</td></tr>";
    $s .= "<tr><td><b>Title of Courtesy</b></td><td>TitleOfCourtesy</td></tr>";
    $s .= "<tr><td><b>Birth Date</b></td><td>BirthDate</td></tr>";
    $s .= "<tr><td><b>Hire Date</b></td><td>HireDate</td></tr>";
    $s .= "<tr><td><b>Address</b></td><td>Address</td></tr>";
    $s .= "<tr><td><b>City</b></td><td>City</td></tr>";
    $s .= "<tr><td><b>Postal Code</b></td><td>PostalCode</td></tr>";
    $s .= "</tbody></table>";
echo $s; */
?>
<script type="text/javascript">
$(function() {
    jQuery("#tabela").jqGrid({
		url:'get_consultas.php',
		datatype: "json",
		colNames:['ID','Status','Data Entrada','Talão','RTD'],
		colModel:[
			{name:'IDTABELA',index:'IDTABELA',sorttype:'int',key:true, hidden:true, editable:true},
			{name:'TIPONT',index:'TIPONT',sorttype:'string',editable:true, hidden:true},
			{name:'CODIGOCLI',index:'CODIGOCLI',sorttype:'string',editable:true, hidden:true},
			{name:'DEPTOCLI',index:'DEPTOCLI',sorttype:'string',editable:true, hidden:true },
			{name:'NOMECLI',index:'NOMECLI',sorttype:'string',editable:true, hidden:tru},
			{name:'DTENTRADA',index:'DTENTRADA',sorttype:'string',editable:true, hidden:tru},
			{name:'HRENTRADA',index:'HRENTRADA',sorttype:'string',editable:true, hidden:tru},
			{name:'LOGINENTRADA',index:'LOGINENTRADA',sorttype:'string',editable:true},
			{name:'DESTINATARIO',index:'DESTINATARIO',sorttype:'string',editable:true},
			{name:'CEP',index:'CEP',sorttype:'string',editable:true},
			{name:'ENDERECO',index:'ENDERECO',sorttype:'string',editable:true},
			{name:'NUMERO',index:'NUMERO',sorttype:'string',editable:true},
			{name:'COMPLEMENTO',index:'COMPLEMENTO',sorttype:'string',editable:true},
			{name:'BAIRRO',index:'BAIRRO',sorttype:'string',editable:true},
			{name:'CIDADE',index:'CIDADE',sorttype:'string',editable:true},
			{name:'UF',index:'UF',sorttype:'string',editable:true}
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


