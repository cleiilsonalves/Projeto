<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 25/11/2016
 * Time: 12:26
 */
require ('config.php');//arruma depois require nessesario para manter a sessao aberta e agumas funçoes global
require 'messagens.php';
session_start();
if($_SESSION["nomeCompleto"]!='' and $_SESSION ["tipoAcesso"]!=''){
$ip = $_SERVER ['REMOTE_ADDR'];
$_SESSION['maquinaid'] = $ip;
$nomeCompleto    =$_SESSION ["nomeCompleto"];
$tipoAcesso      =$_SESSION ["tipoAcesso"];
$master          =$_SESSION ["master"];
$codigo          =$_SESSION ["codigo"];
$clientes        =$_SESSION ["clientes"];
$p =            $_SESSION ["dadosPrincipal"];

 //echo  strcmp($p[0]['TIPONT'] , "CPF");
//print_r($p);
  //echo ($p[0]['TIPONT']);
    if(count($p)==0){ ?>
        <script>
          $('#msgRetorno').modal('show');
        </script>
<?php
    }

unset($_SESSION ["dadosPrincipal"]);
$a  =$_SESSION ["dadasAux"];
unset($_SESSION ["dadasAux"]);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/jquery.maskedinput-1.3.1.min.js"></script>
    <script src="js/isCPFCNPJ.js"></script>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/cssMenu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <meta charset="UTF-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />

    <script>
        jQuery(function($){
            $("#cep").mask("99999-999");
            $("#Doc").mask("999.999.999-99");// fazer alteraçoa
            getModelo();
        });
        function mask(){
            tipoDoc = $('select[name="tipoDoc"]');
            var tipo = tipoDoc.val();
            if (tipo === "CPF"){
                $("#Doc").mask("999.999.999-99");
            }else{
                $("#Doc").mask("99.999.999/9999-99");
            }
        }

        function validaDoc() {
            var tipoDoc = $('select[name="tipoDoc"]');
            var campoDoc = $('input[name="Doc"]');
            var Doc = campoDoc.val();
            Doc = Doc.replace(/[^0-9]/g, '');
            if(Doc ==''){
                return false;
            }
            var tipo = tipoDoc.val();
            if (tipo === "CPF") {
                validaCPFCNPJ(Doc, 1);
            } else {
                validaCPFCNPJ(Doc, 2);

            }
        }


        function getModelo() {
            var codDpt = $('#codDpt').val();
            if (codDpt != '-') {
                //alert(codDpt);
                jQuery.ajax({
                    type: "GET",
                    datatype: "json",
                    url: "get_modelo.php?codDpt="+codDpt,
                    success: preecheComboModelo,
                    error: erro,
                });
            }else{
            }
        }
        function preecheComboModelo(data) {
            parsedArray = JSON.parse(data);
            $('#modeloCertidao').html('');
            var Options = '';
            $.each(parsedArray, function (index, value) {
                var sep1 = value.split("-").shift();
                var sep2 = value.split("-").pop();
                Options += '<option value="' + sep1 + '">' + sep2+ '</option>';
                $('#modeloCertidao').html(Options);
            });
            $('#modeloCertidao').val('<?=$p[0]['MODELO'] ?>').attr("selected", "selected");
        }

        function vericaCepPreechido() {
            cep = $('input[name="cep"]');
            var cep1 = cep.val();
            var cepf = cep1.replace(/[^0-9]/g, '');
            opcao = $('select[name="modeloNt"]');
            if(cepf != ''){
                vericaCep();
            }
        }

        function vericaCep() {
            $('.cepinvalido').html('');
            cep = $('input[name="cep"]');
            document.cadastro.endereco.value = '';
            document.cadastro.bairro.value = '';
            document.cadastro.cidade.value = '';
            document.cadastro.uf.value = '';
            var cep1 = cep.val();
            var cepf = cep1.replace(/[^0-9]/g, '');
            opcao = $('select[name="modeloNt"]');
            // opcao.removeAttr('disabled');
            if (cepf != '') {
                res = $.post('get_endereco_cep.php', {'cep': cepf}, function (text, status, xml) {
                    $.getJSON('http://servicos.cdtsp.com.br/notificacao/json/endcep<?= $_SESSION['sessionID']?>.json', function (data) {
                        // alert(data['ZONA']);
                        if (data['ZONA'] == 0 && opcao.val() == 'NT') {
                            $msgAlerta = 'Este CEP nao pode ser NT'
                            $('#msgSel').modal('show');
                            document.cadastro.modeloNt.value = 'AR';
                        }
                        if (data['ENDERECO'] == ' ') {
                            $('.cepinvalido').html('CEP inválido');
                            return false;
                        } else {
                            document.cadastro.endereco.value = data['ENDERECO'];
                            document.cadastro.bairro.value = data['BAIRRO'];
                            document.cadastro.cidade.value = data['CIDADE'];
                            document.cadastro.uf.value = data['UF'];
                        }
                    });
                });

            }
        }
        function erro(){
            alert("erro");
        }

        $(function() {
            // valida o formulário
            $('#formCadastro').validate({
                // define regras para os campos
                rules: {
                    destinatario: {
                        required: true,
                    },
                    codDpt: {
                        required: true,
                        minlength: 1
                    }
                },
                // define messages para cada campo
                messages: {
                    destinatario:  "Preencha o campo",
                    endereco:  "Preencha o campo",
                    numero: "Preencha o campo",
                    cep: "Preencha o campo",
                    codDpt: "Selecione o Departamento"

                }
            });
        });

    </script>

</head>

<body>
<?php
if ($_SESSION['msg'] !=''){

    unset($_SESSION['msg']);
    ?>
    <script>
      $('#msgRetorno').modal('show');
    </script>
<?php
}
?>
<div class="container">

    <?php
    require 'controle/menu.php';
    ?>
    <div class="row col-lg-8 col-md-8 ">
        <h3 align="center"> <small>ALTERAR</small></h3>
<hr>
        <form class="form-horizontal"  name= "cadastro" id="formCadastro"  action="controle_alterar.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="codDpt">Código/Dpt.</label>
                <div class="col-sm-10">
                    <select name="codDpt" class="form-control" id="codDpt" onchange="getModelo()">
                        <option value="<?=$p[0]['CODIGOCLI'].'-'.$p[0]['DEPTOCLI'].'-'.$p[0]['NOMECLI']?>"><?=$p[0]['CODIGOCLI'].'-' .$p[0]['DEPTOCLI'].'-'.$p[0]['NOMECLI']?></option>
                        <?php foreach ($clientes  as $v) {?>
                            <option value="<?= $v?>"><?= $v?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-sm-2" for="modeloNt">Tipo NT:</label>
                <div class="col-sm-6">
                    <select name="modeloNt" class="form-control" id="modeloNt" onchange="vericaCepPreechido()">
                        <?php if(strcmp($p[0]['TIPONT'] , "AR") == 0){?>
                        <option value="<?=$p[0]['TIPONT'] ?>"><?=$p[0]['TIPONT'] ?></option>
                        <option value="NT">NT</option>
                        <?php } else { ?>
                        <option value="<?=$p[0]['TIPONT'] ?>"><?=$p[0]['TIPONT'] ?></option>
                        <option value="AR">AR</option>

                        <?php } ?>
                    </select>
                </div>
            </div>
            <input type="hidden" name="idtabela" class="form-control" id="idtabela" value="<?=$p[0]['IDTABELA']?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="destinatario">Destinatario:</label>
                <div class="col-sm-10">
                    <input type="text" name="destinatario" class="form-control" id="destinatario" value="<?=$p[0]['DESTINATARIO'] ?>" placeholder="Destinatario">
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-sm-2" for="modeloCertidao">Modelo:</label>
                <div class="col-sm-6">
                    <select name="modeloCertidao" class="form-control" id="modeloCertidao">
                        <option value="<?=$p[0]['MODELO'] ?>"><?=$p[0]['MODELO']?></option>
                    </select>
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-sm-2" for="modeloNt">Tipo Doc:</label>
                <div class="col-sm-2">
                    <select name="tipoDoc" class="form-control" id="tipoDoc" onchange="mask()">
                        <?php if(strcmp($p[0]['TPDOCDEST'] , "CPF") == 0){?>
                             <option value="<?=$p[0]['TPDOCDEST'] ?>"><?=$p[0]['TPDOCDEST']?></option>
                             <option value="CNPJ">CNPJ</option>
                        <?php } else if(strcmp($p[0]['TPDOCDEST'] , "CNPJ") == 0) {?>
                            <option value="<?=$p[0]['TPDOCDEST'] ?>"><?=$p[0]['TPDOCDEST']?></option>
                            <option value="CPF">CPF</option>
                       <?php } else {?>
                            <option value="CPF">CPF</option>
                            <option value="CNPJ">CNPJ</option>
                        <?php }?>?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="Doc" class="form-control" value="<?=$p[0]['DOCDEST']?>" id="Doc" onblur="validaDoc()">
                    <div class="invalido"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cep">CEP:</label>
                <div class="col-sm-4">
                    <input type="text" name="cep" class="form-control"  value="<?=$p[0]['CEP'] ?>" id="cep" placeholder="CEP" onchange="vericaCep()">
                    <div class="cepinvalido"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="endereco">Endereço:</label>
                <div class="col-sm-10">
                    <input type="text" name="endereco" class="form-control" id="endereco" value="<?=$p[0]['ENDERECO'] ?>" placeholder="Endereço">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="numero">Número:</label>
                <div class="col-sm-4">
                    <input type="text" name="numero" class="form-control" id="numero" value="<?=$p[0]['NUMERO'] ?>" placeholder="Número">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="complemento">Complemento:</label>
                <div class="col-sm-10">
                    <input type="text" name="complemento" class="form-control" id="complemento" value="<?=$p[0]['COMPLEMENTO'] ?>" placeholder="Complemento">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="bairro">Bairro:</label>
                <div class="col-sm-10">
                    <input type="text" name="bairro" class="form-control" id="bairro" value="<?=$p[0]['BAIRRO'] ?>" placeholder="Bairro">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cidade">Cidade:</label>
                <div class="col-sm-6">
                    <input type="text" name="cidade" class="form-control" id="cidade" value="<?=$p[0]['CIDADE']?>" placeholder="Cidade">
                </div>
                <label class="control-label col-sm-2" for="uf">UF:</label>
                <div class="col-sm-2">
                    <select name="uf" class="form-control" id="uf">

                        <option value="<?=$p[0]['UF'] ?>"><?=$p[0]['UF'] ?></option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nomeDevedor">Nome Devedor</label>
                <div class="col-sm-10">
                    <input type="text" name="nomeDevedor" class="form-control" id="nomeDevedor" value="<?=$p[0]['NOMEDEVEDOR']?>"  placeholder="Nome Devedor">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Produtos</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="custom-control-input col-sm-5">Produto</label>
                        <label class="custom-control-input col-sm-4">Operação</label>
                        <label class="custom-control-input col-sm-3">Data Vencimento</label>
                        <div class="row ">
                            <div class="col-sm-5">
                                <input type="text" name="produto01" class="form-control" id="produto01" value="<?=$a[0]['produto']?>" placeholder="Produto 01">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao01" class="form-control" id="operacao01" value="<?=$a[0]['operacao']?>" placeholder="Operação 01">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data01" class="form-control" id="data01" value="<?=$a[0]['data']?>">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto02" class="form-control" id="produto02" value="<?=$a[1]['produto']?>" placeholder="Produto 02">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao02" class="form-control" id="operacao02" value="<?=$a[1]['operacao']?>" placeholder="Operação 02">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data02" class="form-control" id="data02" value="<?=$a[1]['data']?>">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto03" class="form-control" id="produto03" value="<?=$a[2]['produto']?>" placeholder="Produto 03">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao03" class="form-control" id="operacao03" value="<?=$a[2]['operacao']?>" placeholder="Operação 03">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data03" class="form-control" id="data03" value="<?=$a[2]['data']?>">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto04" class="form-control" id="produto04" value="<?=$a[3]['produto']?>" placeholder="Produto 04">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao04" class="form-control" id="operacao04" value="<?=$a[3]['operacao']?>" placeholder="Operação 04">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data04" class="form-control" id="data04" value="<?=$a[3]['data']?>">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto05" class="form-control" id="produto05" value="<?=$a[4]['produto']?>" placeholder="Produto 05">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao05" class="form-control" id="operacao05" value="<?=$a[4]['operacao']?>" placeholder="Operação 05">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data05" class="form-control" id="data05" value="<?=$a[4]['data']?>">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto06" class="form-control" id="produto06" value="<?=$a[5]['produto']?>" placeholder="Produto 06">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao06" class="form-control" id="operacao06" value="<?=$a[5]['operacao']?>" placeholder="Operação 06">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data06" class="form-control" id="data06" value="<?=$a[5]['data']?>">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto07" class="form-control" id="produto07" value="<?=$a[6]['produto']?>" placeholder="Produto 07">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao07" class="form-control" id="operacao07" value="<?=$a[6]['operacao']?>" placeholder="Operação 07">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data07" class="form-control" id="data07" value="<?=$a[6]['data']?>">
                            </div>
                        </div>
                       <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto08" class="form-control" id="produto08" value="<?=$a[7]['produto']?>" placeholder="Produto 08">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao08" class="form-control" id="operacao08" value="<?=$a[7]['operacao']?>" placeholder="Operação 08">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data08" class="form-control" id="data08" value="<?=$a[7]['data']?>">
                            </div>
                        </div>
                       <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto09" class="form-control" id="produto09" value="<?=$a[8]['produto']?>" placeholder="Produto 09">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao09" class="form-control" id="operacao09" value="<?=$a[8]['operacao']?>" placeholder="Operação 09">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data09" class="form-control" id="data09" value="<?=$a[8]['data']?>">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto10" class="form-control" id="produto10" value="<?=$a[9]['produto']?>" placeholder="Produto 10">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao10" class="form-control" id="operacao10" value="<?=$a[9]['operacao']?>" placeholder="Operação 10">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data10" class="form-control" id="data10" value="<?=$a[9]['data']?>">
                            </div>
                        </div>
                        <hr>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-2">
            <button type="submit" class="btn btn-info">Alterar </button>
        </div>
        </form>
           <div class=" col-sm-2">
             <a href="http://servicos.cdtsp.com.br/notificacao/view_consulta.php" class="btn btn-info">Cancelar</a>
            </div>
      </div>
    </div>
    <hr>


<div class="row">
    <div id="msgRetorno" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <div class="modal-body">
                    <p><?= $_SESSION['msg']?></p>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-success"  data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> OK </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
    </div>

</div>
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <div>
                   <h5 align="center">NOTIFICAÇÃO ON-LINE</h5>
                </div>
                <p>Copyright &copy; Website 2016</p>
            </div>
        </div>
    </footer>
</div>
<?php// } ?>
<!-- /.container -->

<!-- jQuery -->

</body>

</html>

<?php } else{
    require 'view_login.php';
}