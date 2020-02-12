<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 25/11/2016
 * Time: 12:26
 */
require('config.php');
session_start();
$ip = $_SERVER ['REMOTE_ADDR'];
$_SESSION['maquinaid'] = $ip;
$nomeCompleto    =$_SESSION ["nomeCompleto"];
$tipoAcesso      =$_SESSION ["tipoAcesso"];
$master          =$_SESSION ["master"];
$codigo          =$_SESSION ["codigo"];
$clientes        =$_SESSION ["clientes"];
//echo'cliente ='.$clientes. 'nome'.$nomCompleto.' - tipo:'.$tipoAcesso.' - master: '.$master.' - codigo: '.$codigo.'- codCli'.$codCli. 'dptcli'.$dptCli;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="assets/css/cssMenu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.maskedinput-1.3.1.min.js"></script>


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>

    <![endif]-->
    <meta charset="UTF-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />

    <script>

        jQuery(function($){
            $("#cep").mask("99999-999");// fazer alteraçoa

        });

        vericaCep(){

            $.post('controle_consulta_liberacao.php', {cliente:'<?=$cliente?>'}, function (text,status,xml) {

            });

        }

    </script>

</head>
<body>
<?php /*
if ($nomeCompleto==''&& $codigo==''){
require 'login.php';
}
else {
*/

?>

<div class="container">

    <?php
    require 'controle/menu.php';
    ?>

    <div class="row col-lg-8 col-md-8 ">

        <h3 align="center"> <small>CADASTRO</small></h3>

        <?php
        session_start();
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);

        if($msg !=''){
            if($msg !='Dados Salvos com Sucesso!') {
                $tpMsg = 'alert-danger';

            }else{
                $tpMsg ='alert-success';
            }?>
            <div class="col-sm-12 col-md-12">
                <div class="alert <?=$tpMsg?>">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×</button>
                    <span class="glyphicon glyphicon-ok"></span> <strong><?= $msg ?> </strong>

                </div>
            </div>

        <?php } ?>
    <hr>
        <form class="form-horizontal" action="../controle_cadastro.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="codDpt">Código/Dpt.</label>
                <div class="col-sm-10">
                    <select name="codDpt" class="form-control" id="codDpt">
                     <?php foreach ($clientes  as $v) {
                         echo "$v\n";}
                       // for ($i = 0; $i < $count; $i++) {?>
                      <option value="<?= $v?>"><?= $v?></option>
                        <?php// }?>
                    </select>
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-sm-2" for="modeloNt">Tipo NT:</label>
                <div class="col-sm-6">
                    <select name="modeloNt" class="form-control" id="modeloNt">
                        <option value="AR">AR</option>
                        <option value="NT">NT</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="destinatario">Destinatario:</label>
                <div class="col-sm-10">
                    <input type="text" name="destinatario" class="form-control" id="destinatario" placeholder="Destinatario" required="true">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cep">CEP:</label>
                <div class="col-sm-4">
                    <input type="text" name="cep" class="form-control" id="cep" placeholder="CEP" required="true" onblur="vericaCep()">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="endereco">Endereço:</label>
                <div class="col-sm-10">
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço" required="true">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="numero">Número:</label>
                <div class="col-sm-4">
                    <input type="text" name="numero" class="form-control" id="numero" placeholder="Número" required="true">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="complemento">Complemento:</label>
                <div class="col-sm-10">
                    <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Complemento">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="bairro">Bairro:</label>
                <div class="col-sm-10">
                    <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cidade">Cidade:</label>
                <div class="col-sm-6">
                    <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade">
                </div>

                <label class="control-label col-sm-2" for="uf">UF:</label>
                <div class="col-sm-2">
                    <select name="uf" class="form-control" id="uf">
                        <option value="0">&nbsp;</option>
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
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Produtos</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="custom-control-input col-sm-5">Produto</label>
                        <label class="custom-control-input col-sm-4">Operação</label>
                        <label class="custom-control-input col-sm-3">Data Vencimento</label>
                        <div class="row ">
                            <div class="col-sm-5">
                                <input type="text" name="produto01" class="form-control" id="produto01" placeholder="Produto 01">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao01" class="form-control" id="operacao01" placeholder="Operação 01">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data01" class="form-control" id="data01">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto02" class="form-control" id="produto02" placeholder="Produto 02">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao02" class="form-control" id="operacao02" placeholder="Operação 02">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data02" class="form-control" id="data02">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto03" class="form-control" id="produto03" placeholder="Produto 03">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao03" class="form-control" id="operacao03" placeholder="Operação 03">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data03" class="form-control" id="data03">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto04" class="form-control" id="produto04" placeholder="Produto 04">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao04" class="form-control" id="operacao04" placeholder="Operação 04">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data04" class="form-control" id="data04">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto05" class="form-control" id="produto05" placeholder="Produto 05">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao05" class="form-control" id="operacao05" placeholder="Operação 05">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data05" class="form-control" id="data05">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto06" class="form-control" id="produto06" placeholder="Produto 06">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao06" class="form-control" id="operacao06" placeholder="Operação 06">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data06" class="form-control" id="data06">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto07" class="form-control" id="produto07" placeholder="Produto 07">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao07" class="form-control" id="operacao07" placeholder="Operação 07">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data07" class="form-control" id="data07">
                            </div>
                        </div>
                       <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto08" class="form-control" id="produto08" placeholder="Produto 08">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao08" class="form-control" id="operacao08" placeholder="Operação 08">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data08" class="form-control" id="data08">
                            </div>
                        </div>
                       <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto09" class="form-control" id="produto09" placeholder="Produto 09">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao09" class="form-control" id="operacao09" placeholder="Operação 09">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data09" class="form-control" id="data09">
                            </div>
                        </div>
                        <div class="row area_produto">
                            <div class="col-sm-5">
                                <input type="text" name="produto10" class="form-control" id="produto10" placeholder="Produto 10">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="operacao10" class="form-control" id="operacao10" placeholder="Operação 10">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="data10" class="form-control" id="data10">
                            </div>
                        </div>
                        <hr>
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-6">
            <button type="submit" class="btn btn-info">Cadastrar</button>
        </div>
    </div>
    </form>

    </div>

    <hr>

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

<!-- /.container -->

</body>

</html>

