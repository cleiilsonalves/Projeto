<?php


$conn = 0;


class wsconnect{
    private $url = "https://www.cra-ieptb-sp.com.br/plataforma-api/v1/EnviarArquivo?wsdl";
    private $auth = array('login' => 'cra_nacional', 'password'=> '51G3C/P/q');
 
    public function ws(){
        try{
            $client = new SoapClient($this->url, $this->auth);
            return $client;
        } catch (Exception $e) {
            echo 'Não foi possivel conectar ao ws: ',  $e->getMessage(), "\n";
        }

    }
}

class Webservice
{
 var $Connect;
 
 function __construct()
 {
    $this->Connect = new wsconnect();


    $db["hostname"] = "168.90.172.196,54056";
    $db["user"] = "robo_sql";
    $db["password"] = "Cr4n10R0b0";
    $db["database"] = "CRA_NACIONAL";


    $this->conn = odbc_connect("DRIVER={SQL Server};SERVER=".$db["hostname"].";DATABASE=".$db["database"].";Integrated Security=SSPI;Persist Security Info=False;", $db["user"], $db["password"]);

 }

 public function enviaArquivoWS($lwe_codigo = NULL, $codigo, $tipo, $uf, $nome, $arquivo)
    {
     $ws = $this->Connect->ws();
     $lwe_codigo = $lwe_codigo;
    $tipo =  $tipo;
    $argtuf= $uf ;
    $nome_arquivo =  $nome;
    $arquivo_confirmacao = $arquivo; 

    $cd_apresentante = substr($nome, 1, 3);


    $conteudo_arquivo = base64_decode($arquivo_confirmacao);




    $vt = explode("\n", $conteudo_arquivo);  

    $vt_novo = array();


    //print_r($vt);

    foreach($vt as $key => $value){

        if($value != ""){
            //echo $value[0]."<br>";

            $vt_novo[] = str_replace("\r", "", str_replace("\n", "", $value));

            if($value[0] == "0"){   // Header
                $cd_ibge = substr($value, 92, 7);
            }

            if($value[0] == "9"){   // Trailler
                // Separa o arquivo e zera o array
                $conteudo_arquivo_b64 = base64_encode(implode("\r\n", $vt_novo));



                //print_r($vt_novo);

                if($tipo == 'C'){


                    $sql = "SELECT TOP 1 RIGHT(aco_arquivo_nome, 1) AS sequencia FROM log_webservice_econ WHERE lwe_codibge = ".$cd_ibge." AND SUBSTRING(aco_arquivo_nome, 0, 8) = 'C".$cd_apresentante.date("dm")."' ORDER BY lwe_codigo DESC";
                    $qry = odbc_exec($this->conn, $sql);

                    if(odbc_num_rows($qry) == 0){
                        $nm_arquivo = $nome_arquivo;
                    }else{

                        $row = odbc_fetch_array($qry);

                        $nm_arquivo = substr($nome_arquivo, 0, 11).(intval($row["sequencia"]) + 1);

                    }


                    $argt = array( 'Confirmacao' => array(
                        'uf'                         => $argtuf,
                        'nome_arquivo'               => $nome_arquivo,
                        'arquivo_confirmacao'        => $conteudo_arquivo_b64));
             
                    $result = $ws->enviarArquivoConfirmacao($argt);
                    $response = (array) $result->return->resposta_arquivo;

                    //print_r($result->return->resposta_arquivo);
                    if($lwe_codigo != NULL){
                            $sql =  "update log_webservice_econ ";
                            $sql.= " set LWE_RESPOSTA= ".$result->return->resposta_arquivo->codigo_resposta.", LWE_DESCRESPOSTA= '".str_replace("'", "", utf8_decode($result->return->resposta_arquivo->mensagem))."' "; 
                              $sql.= " where lwe_codigo =" .$lwe_codigo;
                           // print( $sql);

                           // die();

                    }else{

                        $sql = "INSERT INTO log_webservice_econ (aco_codigo, aco_arquivo_nome, lwe_uf, lwe_codibge, lwe_resposta, lwe_descresposta, lwe_resposta_arq, lwe_data, lwe_hora, lwe_resposta_fake, ds_conteudo_b64)";
                        $sql.= " VALUES (".$codigo.", '".$nm_arquivo."', '".$uf."', ".$cd_ibge.", ".$result->return->resposta_arquivo->codigo_resposta.", '".utf8_decode($result->return->resposta_arquivo->mensagem)."', ".$result->return->resposta_arquivo->codigo_resposta.", GetDate(), '".date("H:i:s")."', 0, '".$conteudo_arquivo_b64."')";
                       } 
                    $qry = odbc_exec($this->conn, $sql);                            

                }



                if($tipo == 'R'){


                    $sql = "SELECT TOP 1 RIGHT(are_arquivo_nome, 1) AS sequencia FROM log_webservice_eret WHERE lwe_codibge = ".$cd_ibge." AND SUBSTRING(are_arquivo_nome, 0, 8) = 'R".$cd_apresentante.date("dm")."' ORDER BY lwe_codigo DESC";
                    $qry = odbc_exec($this->conn, $sql);

                    

                    if(odbc_num_rows($qry) == 0){
                        $nm_arquivo = $nome_arquivo;
                    }else{

                        $row = odbc_fetch_array($qry);

                        $nm_arquivo = substr($nome_arquivo, 0, 11).(intval($row["sequencia"]) + 1);

                    }


                    $argt = array( 'Retorno' => array(
                        'uf'                         => $argtuf,
                        'nome_arquivo'               => $nome_arquivo,
                        'arquivo_retorno'        => $conteudo_arquivo_b64));
             
                    $result = $ws->enviarArquivoRetorno($argt);
                    $response = (array) $result->return->resposta_arquivo;

                    //print_r($result->return->resposta_arquivo);
                      if($lwe_codigo != NULL){
                            $sql =  "update log_webservice_eret ";
                            $sql.= " set LWE_RESPOSTA= '".$result->return->resposta_arquivo->codigo_resposta."',  LWE_DESCRESPOSTA= '".str_replace("'", "", utf8_decode($result->return->resposta_arquivo->mensagem))."' "; 
                            $sql.= " where lwe_codigo =" .$codigo;
                          
                           
                                       print( $sql);

                           die();

                    }else{


                        $sql = "INSERT INTO log_webservice_eret (are_codigo, are_arquivo_nome, lwe_uf, lwe_codibge, lwe_resposta, lwe_descresposta, lwe_resposta_arq, lwe_data, lwe_hora, lwe_resposta_fake, ds_conteudo_b64)";
                        $sql.= " VALUES (".$codigo.", '".$nm_arquivo."', '".$uf."', ".$cd_ibge.", ".$result->return->resposta_arquivo->codigo_resposta.", '".utf8_decode($result->return->resposta_arquivo->mensagem)."', ".$result->return->resposta_arquivo->codigo_resposta.", GetDate(), '".date("H:i:s")."', 0, '".$conteudo_arquivo_b64."')";
                     }
                    $qry = odbc_exec($this->conn, $sql);                            

                }




                $vt_novo = array();
            }
        }

    }

            
      return json_encode($response);
        
    }

}

