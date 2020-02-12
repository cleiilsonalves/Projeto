<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 10/04/2017
?> * Time: 12:12
 */


$campoSelect = "";

       session_start ();

 if (isset ( $_SESSION ["nomeCompleto"] )) {
     session_start ();
     //  $idetifica = "Olá " . $_SESSION ["nomeCompleto"] ;
 } else {
     $div = "";
     $msg = "";
     require_once 'view_login.php';
     // header ( "Location:view_login.php" );
     return false;

 }



?>

<html>
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="title"
          content="CDT - Centro de Estudos de TÃ­tulos e Documentos de SP">
    <meta name="author" content="WEB">
    <meta name="url" content="http://www.cdtsp.com.br">
    <meta name="copyright"
          content="CDT - Centro de Estudos de TÃ­tulos e Documentos de SP">
    <meta name="description"
          content="CDT - Centro de Estudos de TÃ­tulos e Documentos de SP">

    <meta name="keywords"
          content="CertificaÃ§Ã£o Digital, SPED, NF-e, CartÃ³rio, EletrÃ³nico, Assinatura, Token, Smartcard, Receita Federal" />
    <meta name="DC.subject"
          content="CertificaÃ§Ã£o Digital, SPED, NF-e, CartÃ³rio, EletrÃ³nico, Assinatura, Token, Smartcard, Receita Federal" />
    <meta name="DC.creator"
          content="CDT - Centro de Estudos de TÃ­tulos e Documentos de SP" />
    <meta name="DC.contributors" content="web" />
    <meta name="dc.language" content="pt">
    <meta name="rating" content="general">
    <meta name="robots" content="index,follow">
    <meta name="robots" content="noarchive">
    <meta name="revisit-after" content="1 days">

    <meta http-equiv="Cache-Control" content="no-cache, no-store" />
    <meta http-equiv="Pragma" content="no-cache, no-store" />
    <meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT" />
    <link rel="stylesheet" type="text/css" href="../safra/sStyle.css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/flexigrid.js"></script>
    <script type="text/javascript" src="js/i18n/grid.locale-pt-br.js"></script>
    <script type="text/javascript" src="js/jquery.jqGrid.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">



    <link rel="stylesheet" type="text/css" media="screen"
          href="themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" media="screen"
          href="themes/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen"
          href="themes/ui.multiselect.css" />





    <title>Upload de Arquivos</title>


</head>
<body>


<?php if($msg==true){?>

    <P><?="<script>

window.alert('$msgErroLogin');
</script>"?></P>

<?php }?>

<div id="topo">
    <img src="img/banne_safra.jpg" height="100%;" width="100%;">

</div>

<div id=site>
    <?php
    require 'menu.php';
    ?>

    <div id="areaCosultaCartorios">
        <h4>Upload de Arquivos</h4>
        <form enctype="multipart/form-data" action="controle_averbacao.php" method="POST">

            <!-- O Nome do elemento input determina o nome da array $_FILES -->
            Enviar arquivo xls: <input name="filexls" type="file" />
            <br>
            Enviar arquivo txt: <input name="filetxt" type="file" />
            <br>
            <input type="submit" value="Enviar arquivo" />
        </form>
    </div>

    <div id="resultadoCartorios"></div>


    <div id="bottom">

        <img src="img/roda_pe_safra.jpg" height="100%;" width="100%;">
    </div>

</div>




</body>
</html>


