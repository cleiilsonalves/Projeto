<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 09/02/2017
 * Time: 15:58
 */
require ('config.php');
require ('Funcoes_config.php');//arruma depois require nessesario para manter a sessao aberta e agumas funçoes global
//require ('C:\xampp\htdocs\CDT\consultas\funcoes.php');
require ( 'D:/GER/inetpub/wwwroot/notificacao/acesso/funcoes.php');
// Variaveis
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$rp = isset($_GET['rows']) ? $_GET['rows'] : 10;
$sortname = isset($_GET['sidx']) ? $_GET['sidx'] : 'IDTABELA';
$sortorder = isset($_GET['sord']) ? $_GET['sord'] : 'desc';
$query = isset($_GET['query']) ? $_GET['query'] : false;
$qtype = isset($_GET['qtype']) ? $_GET['qtype'] : false;

// Abre JSON
//$FileJSON = "a".session_id();
$FileJSON = dirname(__FILE__).'\json\Noti'.session_id().'.json';


$ponteiro = fopen ($FileJSON,"r");
$conteudoArquivo = '';
while (!feof ($ponteiro)) {
    $linha = fgets($ponteiro, filesize($FileJSON));
    $conteudoArquivo .= $linha;
}
fclose ($ponteiro);
$conteudoArquivo = str_replace("[[", "[", $conteudoArquivo);
$conteudoArquivo = str_replace("]]", "]", $conteudoArquivo);
// Trabalha arquivo
if(!isset($usingSQL)){
    $rows = json_decode($conteudoArquivo,true);
    if($qtype && $query){
        $query = strtolower(trim($query));
        foreach($rows as $key => $row){
            if(strpos(strtolower($row[$qtype]),$query) === false){
                unset($rows[$key]);
            }
        }
    }
    //Make PHP handle the sorting
    $sortArray = array();
    foreach($rows as $key => $row){
        $sortArray[$key] = $row[$sortname];
    }


    $sortMethod = SORT_ASC;
    if($sortorder == 'asc'){
        $sortMethod = SORT_DESC;
    }

    array_multisort($sortArray, $sortMethod, $rows);

    $total = count($rows);

    $rows = array_slice($rows,($page-1)*$rp,$rp);
}
header("Content-type: application/json");
$totalpage;
if ($total > 0) {
    $totalpage = ceil($total / $rp);
} else {
    $totalpage = 0;
}


$jsonData = array('page'=>$page,'total'=>$totalpage, 'records'=> $total, 'rows'=>array());
foreach($rows as $row){
    //If cell's elements have named keys, they must match column names
    //Only cell's with named keys and matching columns are order independent.
    $entry = array('id'=>$row['IDTABELA'],
        'cell'=>array(	$row['IDTABELA'],
            $row['TIPONT'],
            $row['CODIGOCLI'],
            $row['DEPTOCLI'],
            $row['NOMECLI'],
            $row['DTENTRADA'],
            $row['HRENTRADA'],
            $row['LOGINENTRADA'],
            $row['DESTINATARIO'],
            mask($row['DOCDEST'], $row['TPDOCDEST']),
            mask($row['CEP'],'CEP'),
            $row['ENDERECO'],
            $row['NUMERO'],
            $row['COMPLEMENTO'],
            $row['BAIRRO'],
            $row['CIDADE'],
            $row['UF'],
            $row['NOMEDEVEDOR'],
            substr(strrchr($row['MODELO'], '-'),1),
            $row['STATUS'],

        ),
    );
    $jsonData['rows'][] = $entry;
}

echo json_encode($jsonData);