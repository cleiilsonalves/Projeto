<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 31/01/2017
 * Time: 15:57
 */
?>

<nav class="navbar navbar-inverse" role="navigation">
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
<div class="col-lg-3 col-md-3 borda">
        <div class="nav-side-menu">
            <div class="brand">CDT </div>
            <i class="fa fa-bars fa-2x toggle-btn" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="navbar-collapse collapse">
                    <li>
                        <a href="http://servicos.cdtsp.com.br/notificacao/view_dashboard.php"> <i class="fa fa-home fa-lg"></i>Home</a>
                    </li>
                    <li>
                        <a href="http://servicos.cdtsp.com.br/notificacao/view_cadastro.php"> <i class="fa fa-pencil-square-o fa-lg"></i>Cadastro</a>
                    </li>
                    <li>
                        <a href="http://servicos.cdtsp.com.br/notificacao/view_consulta.php"> <i class="fa fa-search fa-lg"></i>Consultas</a>
                    </li>
                    <li>
                        <a href="http://servicos.cdtsp.com.br/notificacao/view_consulta_liberacao.php"> <i class="fa fa-check-square-o fa-lg"></i>Liberar Notificações</a>
                    </li>
                    <li  data-toggle="collapse" data-target="#conheca" class="collapsed">
                        <a href="#"><i class="fa fa-file fa-lg"></i>Arquivo<span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="conheca">
                        <li><a href="http://servicos.cdtsp.com.br/notificacao/view_import.php">Upload dos Dados</a></li>
                        <li><a href="">Download - Confimação</a></li>
                        <li><a href="">Download - Retorno</a></li>
                    </ul>
                    <li>
                        <a href="sair.php"> <i class="fa fa-sign-out fa-lg"></i>Sair</a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
