<?php
require ('config.php');
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 29/11/2016
 * Time: 12:10
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Notificações On-line</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- proprio  CSS -->
    <link href="css/css.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Notificação ON-LINE</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->

<?php if($div=='trocasenha'){?>




    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <?php if($msg==true)?>

                <div class="alert-info" align="center"><?=$msgErroLogin?></div>


                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-2">
                    <div class="panel panel-info" >


                        <div class="panel-heading">
                            <div class="panel-title" align="center">Trocar Senha</div>
                        </div>
                        <div style="padding-top:30px" class="panel-body" >
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                            <form id="loginform" method="POST" class="form-horizontal" role="form" action="controle_login.php?p=trocarSenha">

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-codigo" type="password" class="form-control" name="senha" placeholder="senha">
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-username" type="password" class="form-control" name="senha1" value="" placeholder="nova senha" required>
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="senha2" placeholder="confima nova senha" required>
                                </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class=" col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4 controls">
                                        <input type="submit" class="btn btn-info"></a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php }else{ ?>






    <hr>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <?php if($msg==true)?>
             <div class="alert-success" align="center"><?=$msgSucessoLogin?></div>
                <div class="alert-danger" align="center"><?=$msgErroLogin?></div>


                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-2">
                    <div class="panel panel-info" >


                        <div class="panel-heading">
                            <div class="panel-title"align="center">Login</div>
                        </div>
                        <div style="padding-top:30px" class="panel-body" >
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                            <form id="loginform" method="POST" class="form-horizontal" role="form" action="controle_login.php?p=logar">

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                    <input id="login-codigo" type="text" class="form-control" name="codigo" placeholder="Codigo" required>
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="login" value="" placeholder="Usuário" required>
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="senha" placeholder="Senha">
                                </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class=" col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4 controls">
                                        <input type="submit" class="btn btn-info" value="Enviar"></a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <!-- /.row -->


    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Website 2016</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

</body>

</html>
