<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 10/04/2017
 * Time: 12:32
 */


//require ('D:/GER/inetpub/wwwroot/safraDev/funcoes/funcoesDev.php');
//require ( 'D:/GER/inetpub/wwwroot/consultas/funcoesDev.php' );
$Webservice = new Webservice ();
$ip      = $_SERVER ['REMOTE_ADDR'];
$login  = $_POST ['login'];
$extensoes_xls = array('.xls', '.xlsx');//Array a extenção do aquivo para a validaçã
$extensoes_txt = array('.txt');//Array a extenção do aquivo para a validação
$extxls = strstr($_FILES['filexls']['name'], '.'); //pegando a extenção do aquivo para a validação
$exttxt = strstr($_FILES['filetxt']['name'], '.');//pegando a extenção do aquivo para a validação
$uploaddir = dirname ( __FILE__ ) . '\json\\';
$uploadFileXls = $uploaddir .$_FILES['filexls']['name'];
$uploadFileTxt = $uploaddir .$_FILES['filetxt']['name'];
$nomeXls = strstr ($_FILES['filexls']['name'],'.', true);
$nomeTxt = strstr ($_FILES['filetxt']['name'],'.', true);




if(in_array($extxls, $extensoes_xls) === true && in_array($exttxt, $extensoes_txt) === true ){
if ($nomeXls == $nomeTxt){
if (move_uploaded_file($_FILES['filexls']['tmp_name'], $uploadFileXls)) {
    if (move_uploaded_file($_FILES['filetxt']['tmp_name'], $uploadFileTxt)) {
      //$Webservice->ProcessarArquivo($uploadFileXls, $uploadFileTxt, $login, $ip);
       // $DadosRetorno = json_decode($Dados, true);
        ?>
            <script>
          $.post('importaArquivo.php', {'uploadFileXls':<?=$uploadFileXls?>, 'uploadFileTxt':<?=$uploadFileTxt?>, 'login':<?=$login?>, 'ip':<?=$ip?>}, function (text,status,xml) {
                 $('#').html(text);

             });

            </script>
        <?php
        $msg = true;
        $msgErroLogin = "Arquivo importado com SUCESSO";
        require 'view_averbacao.php';


     //echo  $resultado2.', 3 '.$resultado3." Arquivo importado com Sucesso \n";
       // echo'foi';
    }
} else {

    echo "Nao foi possivel importa este arquivo\n";
}
}else{

   echo 'Os Aquivos nao contem o mesmo nome';
}
}else
{
    $msg = true;
    $msgErroLogin = "Arquivo incorreto";
   require 'view_averbacao.php';
}

?>