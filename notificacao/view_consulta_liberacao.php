<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 25/11/2016
 * Time: 12:26
 */
require ('config.php');
//require ('messagens.php');
session_start();
if($_SESSION["nomeCompleto"]!='' and $_SESSION ["tipoAcesso"]!=''){
$nomeCompleto      =$_SESSION["nomeCompleto"];
$tipoAcesso        =$_SESSION ["tipoAcesso"];
$master            =$_SESSION ["master"];
$codigo            =$_SESSION ["codigo"];
$arrayClientes     =$_SESSION["clientes"];
//$msg               =$_SESSION['msg'];

?>
<!DOCTYPE html>
<html lang="pt-br">

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

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Bootstrap Core JavaScript -->

    <link rel="stylesheet" type="text/css" href="assets/css/cssMenu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

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

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <meta charset="UTF-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
</head>
<body>
<?php /*
if ($nomeCompleto==''&& $codigo==''){
require 'login.php';
}
else {
*/
if(isset($_POST['codDpt'])) {
    $cliente = $_POST['codDpt'];

    ?>
<script>
    $(function( ) {
      // var d = document.form;
        $('#cosultar').attr('disabled','disabled');
        $('#cosultar').val('Carregando...');
                $.post('controle_consulta_liberacao.php', {cliente:'<?=$cliente?>'}, function (text,status,xml) {
            $('#resultado').html(text);
            $('#cosultar').removeAttr('disabled');
            $('#cosultar').val('Consultar');
            //faz a tela move para div resultado
            $('html, body').animate({
                scrollTop: $("#resultado").offset().top

            },1000);
        });

    });
</script>

<?php    } ?>
<!-- Page Content -->
<div class="container borda">
    <?php
    require 'controle/menu.php';
    ?>
    <div class="row col-lg-8 col-sm-8 col-md-8 borda">
        <h3 align="center"> <small>TELA DE LIBERAÇÃO</small></h3>
<hr>
        <form class="form-horizontal"  name="form" action="view_consulta_liberacao.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="codDpt">Código/Dpt.</label>
                <div class="col-sm-10">
                    <select name="codDpt" class="form-control" id="codDpt">
                        <?php foreach ($arrayClientes  as $v) {
                            echo "$v\n";}
                        // for ($i = 0; $i < $count; $i++) {?>
                        <option value="<?= $v?>"><?= $v?></option>
                        <?php// }?>
                    </select>
                </div>
            </div>

            <hr>
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-6">
            <input type="submit" id="cosultar" class="btn btn-info" value="Buscar">
        </div>
    </div>
    </form>
    </div>
<div class="col-sm-12 borda">
<hr>
    <div id="resultado" class="col-sm-12 borda">
   &nbsp;
    </div>
</div>
    <hr>
    <!-- Footer -->
    <div class="row col-sm-12">
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
</div>
<?php
if($_SESSION['msg']!=''){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    ?>
    <script>
        $(function(){
    $('#msgRetorno').modal('show')
        });
    </script>
<?php }?>


<div class="row">
    <div id="msgRetorno" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <div class="modal-body">
                    <p><?=$msg?></p>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-success"  data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> OK </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
    </div>



    <div class="row">
        <div id="ConfModal" class="modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                    <div class="modal-body">
                        <p>Deseja Excluir este Documento?</p>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar </button>
                            <button id="confirExcluir"  class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Excluir</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
    </div>
    </div>
</body>
</html>
<?php } else{
   require 'view_login.php';

}
