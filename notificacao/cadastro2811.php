<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 25/11/2016
 * Time: 12:26
 */?>
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

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <meta charset="UTF-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />

    <![endif]-->

</head>

<body>

<!-- Navigation -->



<!-- Page Content -->
<div class="container">
    <div class="jumbotron">
        <div class="container text-center">
            <h3>Notificação On-Line</h3>
            <p></p>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 borda" p>
        <div class="nav-side-menu">
            <div class="brand">CDT </div>
            <i class="fa fa-bars fa-2x toggle-btn" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="navbar-collapse collapse">
                    <li>
                        <a href="#"> <i class="fa fa-pencil-square-o fa-lg"></i>Cadastro</a>
                    </li>
                    <li  data-toggle="collapse" data-target="#conheca" class="collapsed">
                        <a href="#"><i class="fa fa-file fa-lg"></i>Arquivo<span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="conheca">
                        <li class="active"><a href="#">Upload Dodos Variasves</a></li>
                        <li><a href="">Download - Confimação</a></li>
                        <li><a href="">Download - Retorno</a></li>
                    </ul>

                </ul>
            </div>

        </div>

</div>
    <div class="row col-lg-8 col-md-8 borda">

        <h3 align="center"> <small>CADASTRO</small></h3>


<hr>

        <form class="form-horizontal"  action="#"method="get">
            <div class="form-group" >
                <label class="control-label col-sm-2" for="modelont">Tipo NT:</label>
                <div class="col-sm-2">
                    <select name="modelont" class="form-control" id="modelont">
                        <option value="AR">AR</option>
                        <option value="NT">NT</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="destinatario">Destinatario:</label>
                <div class="col-sm-10">
                    <input type="text" name="destinatario" class="form-control" id="destinatario" placeholder="Destinatario">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cep">CEP:</label>
                <div class="col-sm-4">
                    <input type="text" name="cep" class="form-control" id="cep" placeholder="CEP">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="endereco">Endereço:</label>
                <div class="col-sm-10">
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="numero">Número:</label>
                <div class="col-sm-4">
                    <input type="text" name="numero" class="form-control" id="numero" placeholder="Número">
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
                    <input type="text" name="uf" class="form-control" id="uf" placeholder="UF">
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Produto 01</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto01">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto01" class="form-control" id="produto01" placeholder="Produto 01">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao01">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao01" class="form-control" id="operacao01" placeholder="Operação 01">
                        </div>

                        <label class="control-label col-sm-2" for="dtvencimento01">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento01" class="form-control" id="dtvencimento01">

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Produto 02</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto02">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto02" class="form-control" id="produto02" placeholder="Produto 02">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao02">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao02" class="form-control" id="operacao02" placeholder="Operação 02">
                        </div>

                        <label class="control-label col-sm-2" for="dtvencimento02">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento02" class="form-control" id="dtvencimento02">

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Produto 03</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto03">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto03" class="form-control" id="produto03" placeholder="Produto 03">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao03">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao03" class="form-control" id="operacao03" placeholder="Operação 03">
                        </div>
                        <label class="control-label col-sm-2" for="dtvencimento03">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento03" class="form-control" id="dtvencimento03">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Produto 04</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto02">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto04" class="form-control" id="produto04" placeholder="Produto 04">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao04">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao04" class="form-control" id="operacao04" placeholder="Operação 04">
                        </div>

                        <label class="control-label col-sm-2" for="dtvencimento04">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento04" class="form-control" id="dtvencimento04">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Produto 05</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto05">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto05" class="form-control" id="produto05" placeholder="Produto 05">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao05">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao05" class="form-control" id="operacao05" placeholder="Operação 05">
                        </div>

                        <label class="control-label col-sm-2" for="dtvencimento05">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento05" class="form-control" id="dtvencimento05">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Produto 06</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto06">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto06" class="form-control" id="produto06" placeholder="Produto 06">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao06">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao06" class="form-control" id="operacao06" placeholder="Operação 06">
                        </div>

                        <label class="control-label col-sm-2" for="dtvencimento06">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento06" class="form-control" id="dtvencimento06">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Produto 07</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto02">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto07" class="form-control" id="produto07" placeholder="Produto 07">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao07">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao07" class="form-control" id="operacao07" placeholder="Operação 07">
                        </div>
                        <label class="control-label col-sm-2" for="dtvencimento07">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento07" class="form-control" id="dtvencimento07">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Produto 08</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto08">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto08" class="form-control" id="produto08" placeholder="Produto 08">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao08">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao08" class="form-control" id="operacao08" placeholder="Operação 08">
                        </div>

                        <label class="control-label col-sm-2" for="dtvencimento08">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento08" class="form-control" id="dtvencimento08">

                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Produto 09</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto09">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto09" class="form-control" id="produto09" placeholder="Produto 09">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao09">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao09" class="form-control" id="operacao09" placeholder="Operação 09">
                        </div>

                        <label class="control-label col-sm-2" for="dtvencimento09">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento09" class="form-control" id="dtvencimento09">

                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Produto 10</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produto10">Produto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="produto10" class="form-control" id="produto10" placeholder="Produto 10">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="operacao10">Operação:</label>
                        <div class="col-sm-5">
                            <input type="text" name="operacao10" class="form-control" id="operacao10" placeholder="Operação 10">
                        </div>

                        <label class="control-label col-sm-2" for="dtvencimento10">Data Venci.:</label>
                        <div class="col-sm-3">
                            <input type="date" name="dtvencimento10" class="form-control" id="dtvencimento10">

                        </div>
                    </div>
                </div>
            </div>



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

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
