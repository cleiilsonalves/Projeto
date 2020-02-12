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

    <script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />



    <script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

    <!-- jQuery -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.maskedinput-1.3.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
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
   </script>
<!-- Navigation -->
<!-- Page Content -->
<div class="container">

    <?php
    require 'controle/menu.php';
    ?>
    <div class="row col-lg-8 col-md-8 ">
        <?php
        if($msg==true){

            if($msgRetono !='Arquivo importado com SUCESSO') {
                $tpMsg = 'alert-danger';
                $msg = false;

            }else if($msgRetono==''){
                $tpMsg ='alert-success';
                $msg = false;
            } else{
                $tpMsg ='alert-success';
                $msg = false;
            }?>
            <div class="col-sm-12 col-md-12">
                <div class="alert <?=$tpMsg?>">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×</button>
                    <span class="glyphicon glyphicon-ok"></span> <strong><?= $msgRetono?></strong>

                </div>
            </div>
            <?php
        }
        ?>

        <div class="panel panel-default">
            <form enctype="multipart/form-data" class="form-horizontal" action="controle_import.php" method="POST">
            <div class="panel-heading panel-info">
                <h4>Upload de Arquivos</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                      <label class="control-label col-sm-2" for="codDpt">Código/Dpt.</label>
                     <div class="col-sm-10">
                        <select name="codDpt" class="form-control" id="codDpt">
                            <option value="">---Selecione---</option>
                            <?php foreach ($clientes as $v) { ?>
                            <option value="<?= $v?>"><?= $v?></option>
                            <?php }?>
                        </select>
                     </div>
                 </div>

                <div class="form-group">
                    <label class="control-label col-sm-2 " for="idFile">Enviar Arquivo:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="idFile" name="file" type="file">
                    </div>
                </div>

            </div>
            <div class="panel-footer">
                <div class="col-sm-offset-5">
                    <button class="btn btn-info" type="submit">Enviar arquivo</button>
                </div>
            </div>
            </form>
        </div>
      <?php if ($DadosRetorno){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h4> Resultado da Importação</h4>
                <h5 class="text-right text-success" id = "idSucesso">Salvo com Sucesso:<?=$sucesso?></h5>
                <h5 class="text-right text-danger" id = "idFalha">Com Falha:<?=$falha?></h5>
            </div>
            <div class="panel-body">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Documento</th>
                        <th>Status</th>
                    </thead>
                    <tbody>

                    <?php
                    $i = 1;
                    $sucesso = 0;
                    $falha   = 0;
                    foreach ($DadosRetorno as $d){
                        if($d['STATUS']== 'Salvo com Sucesso!') {
                            $sucesso++;
                            $clase ="success";
                            $info = '';
                        } else{
                            $falha++;
                            $clase ="danger";
                            $info = '<i class="fa fa-question-circle fa-align-right" title="'.$d['MENSAGEM'].' "></i> ';
                        }
                            ?>

                            <tr class="text-<?=$clase ?>">
                                <td><?= $i ?> </td>
                                <td><?= $d['NOME'] ?></td>
                                <td><?= $d['DOC'] ?></td>
                                <td><?= $d['STATUS'].' '.  $info?> </td>

                            </tr>
                            <?php

                        $i++;
                    }
                    if($i > 1){ ?>
                        <script>

                            jQuery(function($) {
                                 $('#idSucesso').html('Salvo com Suceeso: '+'<?= $sucesso?>');
                                $('#idFalha').html('Com Falha: '+'<?= $falha?>');
                            });

                        </script>


                   <?php
                    }

                    ?>
                  </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
        <script>
            $(document).ready(function() {
                $('#datatable').dataTable();

                $("[data-toggle=tooltip]").tooltip();

            } );

        </script>
        </div>
</div>
        <!-- /.container -->
</body>

</html>

<?php } else{
    require 'view_login.php';

}