<?php
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');
require ( 'D:/GER/inetpub/wwwroot/consultas/funcoes.php' );
$Webservice = new Webservice ();
$CosultaCatorios = $_POST ['busca'];


$Dados = $Webservice->ConsultarCartorio($CosultaCatorios);

$Dados1 = json_decode( $Dados, true );

?>

<h3><center><b>CARTÓRIOS EM: <?=$CosultaCatorios?></b></center></h3>

<?php foreach ($Dados1 as $row) {?>

<hr>
&nbsp;
</hr>

<table width="100%" >
<tr>
<td width="22%"><b>Nome:</b></td>
<td width="78%"><?=$row['Nome']?></td>
  </tr>
  <tr>
    <td><b>Endere&ccedil;o:</b></td>
    <td><?=$row['Endereco']?></td>
  </tr>
  <tr>
    <td><b>Bairro:</b></td>
    <td><?=$row['Bairro']?></td>
  </tr>
  <tr>
    <td><b>Cidade:</b></td>
    <td><?=$row['Cidade']?></td>
  </tr>
  <tr>
    <td><b>Telefone:</b></td>
    <td><?=$row['Telefone']?></td>
  </tr>
  <tr>
    <td><b>Contato:</b></td>
    <td><?=$row['Contato']?></td>
  </tr>
  <tr>
    <td><b>Email:</b></td>
    <td><?=$row['Email']?> 
  </tr>
  <tr>
    <td><b>Tipo Pagamento:</b></td>
    <td><?=$row['TipoPagamento']?></td>
  </tr>
  <tr>
    <td><b>Observação:</b></td>
    <td><?=$row['Obs']?></td>
  </tr>
</table>

  <?php
}


