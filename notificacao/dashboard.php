<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 25/11/2016
 * Time: 12:26
 */
require ('config.php');
$nomeCompleto    =$_SESSION ["nomeCompleto"];
$tipoAcesso     =$_SESSION ["tipoAcesso"];
$master         =$_SESSION ["master"];
$codigo         =$_SESSION ["codigo"];
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
    <link rel="stylesheet" type="text/css" href="assets/css/styledash.css">
    <link rel="stylesheet" type="text/css" href="assets/css/MoneAdmin.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/cssMenu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

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

?>

<!-- Navigation -->



<!-- Page Content -->
<div class="container">




    <?php
    require 'controle/menu.php';
    ?>

    <div class="row col-lg-8 col-md-8 ">

        <h3 align="center"> <small>DASHBOARD</small></h3>


<hr>

        <div class="row">
            <div class="col-lg-12">
                <div style="text-align: center;">

                    <a class="quick-btn" href="#">
                        <i class="icon-check icon-2x"></i>
                        <span> Products</span>
                        <span class="label label-danger">2</span>
                    </a>

                    <a class="quick-btn" href="#">
                        <i class="icon-envelope icon-2x"></i>
                        <span>Messages</span>
                        <span class="label label-success">456</span>
                    </a>
                    <a class="quick-btn" href="#">
                        <i class="icon-signal icon-2x"></i>
                        <span>Profit</span>
                        <span class="label label-warning">+25</span>
                    </a>
                    <a class="quick-btn" href="#">
                        <i class="icon-external-link icon-2x"></i>
                        <span>value</span>
                        <span class="label btn-metis-2">3.14159265</span>
                    </a>
                    <a class="quick-btn" href="#">
                        <i class="icon-lemon icon-2x"></i>
                        <span>tasks</span>
                        <span class="label btn-metis-4">107</span>
                    </a>
                    <a class="quick-btn" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span>Tickets</span>
                        <span class="label label-default">20</span>
                    </a>



                </div>

            </div>

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
<?php// } ?>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
    <


</body>

</html>

