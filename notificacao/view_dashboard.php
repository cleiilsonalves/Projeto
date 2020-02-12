<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 25/11/2016
 * Time: 12:26
 */
require ('config.php');
session_start();
if($_SESSION["nomeCompleto"]!='' and $_SESSION ["tipoAcesso"]!=''){
$ip = $_SERVER ['REMOTE_ADDR'];
$_SESSION['maquinaid'] = $ip;
$nomeCompleto    =$_SESSION ["nomeCompleto"];
$tipoAcesso      =$_SESSION ["tipoAcesso"];
$master          =$_SESSION ["master"];
$codigo          =$_SESSION ["codigo"];
$clientes        =$_SESSION ["clientes"];
$idOrgaoEmpresa  =$_SESSION ["idOrgaoEmpresa"];

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

    <link rel="stylesheet" type="text/css" href="assets/css/styledash.css">
    <link rel="stylesheet" type="text/css" href="assets/css/MoneAdmin.css" />
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.maskedinput-1.3.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
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

</head>

<body>

<script>
    /*
    $(document).ready(function () {
            res = $.post('get_statusNotificacao.php', {'idOrgaoEmpresa': }, function (text, status, xml) {
            });

    });
*/
    //alert("<?=$idOrgaoEmpresa?>");
    jQuery.ajax({
        type: "GET",
        datatype: "json",
        url: "get_statusNotificacao.php?idOrgaoEmpresa=<?=$idOrgaoEmpresa?>",
        success: preecher,
        error: erro,
    });

   function  preecher(data){
      //alert(data);


       parsedArray = JSON.parse(data); //an array [1,2]

//access like and array
       //console.log(parsedArray); //1
       //console.log(parsedArray[1]); //

        $('#status1').html('<a class="quick-btn" href="http://servicos.cdtsp.com.br/notificacao/view_consulta_liberacao.php">'
            +' <i class="fa fa-cloud-upload"></i>'
            +'<span> A Liberar</span>'
            +'<span class="label label-default">'+parsedArray[0]+'</span>'
            +'</a>'
            +' <a class="quick-btn" href="#">'
            +'<i class="fa fa-thumbs-up"></i>'
            +'<span>Liberado</span>'
            +'<span class="label label-success">'+parsedArray[1]+'</span>'
            +'</a>'
            +'<a class="quick-btn" href="#">'
            +'<i class="fa fa-truck"></i>'
            +'<span>Processado</span>'
            +'<span class="label label-warning">'+parsedArray[2]+'</span>'
            +'</a>'
            +'<a class="quick-btn" href="#">'
            +' <i class="fa fa-thumbs-o-down"></i>'
            +'<span>Negativo</span>'
            +'<span class="label  label-danger">0</span>'
            +'<!-- <span class="label btn-metis-2">3</span>-->'
            +'</a>'
            +'<a class="quick-btn" href="#">'
            +'<i class="fa fa-bell-o"></i>'
            +'<span>Alerta</span>'
            +'<span class="label btn-metis-4">0</span>'
            +'</a>');
    }
    function erro() {
        alert('erro');
    }

</script>
}
<div class="destroi">

</div>
<!-- Navigation -->
<!-- Page Content -->
<div class="container">

    <?php
    require 'controle/menu.php';
    ?>
    <div class="row col-lg-8 col-md-8 ">
        <h3 align="center"> <small>DASHBOARD</small></h3>
 <div id="status1"></div>
        <hr>
        <!--
        <div class="row">
            <div class="col-lg-12">
                <div style="text-align: center;">

                    <a class="quick-btn" href="#">
                        <i class="fa fa-cloud-upload"></i>
                        <span> A Liberar</span>
                        <span class="label label-default">2</span>
                    </a>

                    <a class="quick-btn" href="#">
                        <i class="fa fa-thumbs-up"></i>
                        <span>Positivos</span>
                        <span class="label label-success">456</span>
                    </a>
                    <a class="quick-btn" href="#">
                        <i class="fa fa-truck"></i>
                        <span>Em Trânsito</span>
                        <span class="label label-warning">25</span>
                    </a>
                    <a class="quick-btn" href="#">
                        <i class="fa fa-thumbs-o-down"></i>
                        <span>Negativo</span>
                        <span class="label  label-danger">3</span>
                       <!-- <span class="label btn-metis-2">3</span>-->


                    <!--
                    <a class="quick-btn" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span>Tickets</span>
                        <span class="label label-default">20</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
-->
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
<div class="row">
    <div id="msgSel" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <div class="modal-body">
                    <p><?=$msgAlerta?></p>
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
<!-- /.container -->
</body>

</html>

<?php } else{
    require 'view_login.php';

}