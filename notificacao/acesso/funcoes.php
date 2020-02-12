<?php
session_start ();
//define ('SERVER_HOST','http://10.1.33.32:8090/cdt/rest/'); //Anderson
//define ('SERVER_HOST','http://10.1.33.63:8090/cdt/rest/'); //GER
//define ('SERVER_HOST','http://10.1.33.36:8090/cdt/rest/');
//define ('SERVER_HOST','http://10.1.33.60:8090/cdt/rest/');
define ('SERVER_HOST','http://10.1.33.29:8090/cdt/rest/');// Sarah
define ('HTTPLOGIN','gerweb');
define ('HTTPSENHA','CdT2ol%G7R');
            //udhO(*$O&*H*&DH8h73hd9488d8*UUUJ)D094j0jr9f8hf95whoi*(*U$%089j)*JR(*F4h9hf
class Ger {

	/** 
	 * Send a POST requst using cURL 
	 * @param string $url to request
	 * @param array $post values to send 
	 * @param array $options for cURL 
	 * @return string 
	 */ 
	public function curl_post($url, array $post = NULL, array $options = array()) 
	{ 
		$defaults = array( 
			CURLOPT_POST => 1, 
			CURLOPT_HEADER => 0, 
			CURLOPT_URL => $url, 
			CURLOPT_FRESH_CONNECT => 1, 
			CURLOPT_RETURNTRANSFER => 1, 
			CURLOPT_HTTPAUTH => CURLAUTH_ANY,
			CURLOPT_USERPWD => HTTPLOGIN.':'.HTTPSENHA,
			CURLOPT_FORBID_REUSE => 1, 
			CURLOPT_TIMEOUT => 300, // 4
			CURLOPT_POSTFIELDS => http_build_query($post) 
		); 
	
		$ch = curl_init(); 
		curl_setopt_array($ch, ($options + $defaults)); 
		if( ! $result = curl_exec($ch)) 
		{ 
			trigger_error(curl_error($ch)); 
		} 
		curl_close($ch); 
		return $result; 
	} 
	
	/** 
	 * Send a GET requst using cURL 
	 * @param string $url to request 
	 * @param array $get values to send 
	 * @param array $options for cURL 
	 * @return string 
	 */ 
	public function curl_get($url, array $get = NULL, array $options = array()) 
	{    
		$defaults = array( 
			CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get), 
			CURLOPT_HEADER => 0, 
			CURLOPT_RETURNTRANSFER => TRUE, 
			CURLOPT_HTTPAUTH => CURLAUTH_ANY,
			CURLOPT_USERPWD => HTTPLOGIN.':'.HTTPSENHA,
			CURLOPT_TIMEOUT => 300 // 4 
		); 
		
		$ch = curl_init(); 
		curl_setopt_array($ch, ($options + $defaults)); 
		if( ! $result = curl_exec($ch)) 
		{ 
			trigger_error(curl_error($ch)); 
		} 
		curl_close($ch); 
		return $result; 
	}
	
	/** 
	 * Trata letras em um nome 
	 * @param string $txt to request 
	 * @return string 
	 */
	public function NomeProprio ($txt)
	{
		$array1 = array(   "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
						 , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç"
						 , "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","X","W","Y","Z","K" );
		$array2 = array(   "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
						 , "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
						 , "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","x","w","y","z","k" );
		$txt = str_replace( $array1, $array2, $txt );
		
		$abreviacoes = array('ltda','sa','s/a','me');
		$preposicoes = array ('a','o','e','as','os','es','da','de','di','do','du','das','des',
							  'dis','dos','dus','á','é','í','ó','ú','um','uma','uns','umas',
							  'com','para','por','em');
		$txt = ucwords(trim(preg_replace('/ +/',' ', $txt)));
		$verificacao = explode(' ',$txt);
		$nome = '';
		foreach ($verificacao as $palavra)
		{
			if (array_search(strtolower($palavra), $preposicoes,true))
				$nome .= strtolower($palavra).' ';
			elseif (array_search(strtolower($palavra), $abreviacoes,true))
				$nome .= strtoupper($palavra);
			else
				$nome .= $palavra.' ';
		}
		return trim($nome);
	}
	
	public function SoNumeros ($var) {
		
		return eregi_replace('([^0-9])','',$var);
	}
}

class Webservice
{

    var $Connect;

    function __construct()
    {
        $this->Connect = new Ger();
    }


    // esta funçao loga o úsuario no sistema
    public function EfetuaLogin($orgao, $nome, $senha, $ip)
    {
        $Address = SERVER_HOST . "TSMUsuario/ValidaUsuario/$orgao/$nome/$senha/$ip/1";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];

        //echo print_r($Retorno);
        return json_encode($Retorno);
    }

    public function trocarSenha($orgao, $login, $senha, $novasenha, $ip) {
        $Address = SERVER_HOST . "TSMUsuario/TrocarSenha/$orgao/$login/$senha/$novasenha/$ip";
        $Con = json_decode ( $this->Connect->curl_get ( $Address, array (), array () ), true );
        $Retorno = $Con ['result'] [0];
        return json_encode ( $Retorno );
    }

    //retorna o condigo o departamento e o nome do usuario logado
    public function listaClientes($idOrgaoEmpresa)
    {
        $Address = SERVER_HOST . "TSMUsuario/ListarClientes/$idOrgaoEmpresa";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
        //echo print_r($Retorno);
        return json_encode($Retorno);
    }

//faz a gravação dos dados da tela cadastro

    public function GravarDadosNTOnline($ObjetoJson, $campos)
    {

        $Address = SERVER_HOST . "TSMNTOnline/GravarDadosNTOnline/$ObjetoJson/$campos/10";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);
    }

    public function DadosNTOnline($cliente, $dtIni, $tdFim, $nome, $status)
    {
        $Address = SERVER_HOST . "TSMNTOnline/DadosNTOnline/$cliente/$dtIni/$tdFim/$nome/$status";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);

    }

    public function ConsultarProdutos ($idConsulta){
        $Address = SERVER_HOST . "TSMNTOnline/DadosNTOnlineAux/$idConsulta";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
       // echo print_r($Retorno);
        return json_encode($Retorno);
 }
    public function getObjetoAlterar($idSelAlterar){
        $Address = SERVER_HOST . "TSMNTOnline/DadosNTOnlineAlterar/$idSelAlterar";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
         //echo print_r($Retorno);
        return json_encode($Retorno);
    }
    public function excluirDadosNTOnline($idSelExcluir, $nomeCompleto, $maquinaid){
        $Address = SERVER_HOST . "TSMNTOnline/ExcluirDadosNTOnline/$idSelExcluir/$nomeCompleto/$maquinaid";
       // $Address = SERVER_HOST ."TSMNTOnline/ExcluirDadosNTOnline/49/teste/0.0.0.0";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);

    }
    public function AtualizarDadosNTOnline($JsonPrinc, $JsonCampos)
    {
        $Address = SERVER_HOST . "TSMNTOnline/AtualizarDadosNTOnline/$JsonPrinc/$JsonCampos/10";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
      // echo print_r($Retorno);
        return json_encode($Retorno);
    }
    public function DadosNTOnlineLiberacao($cliente, $dtIni, $tdFim, $nome, $tpStatus)
    {
        $Address = SERVER_HOST . "TSMNTOnline/DadosNTOnline/$cliente/$dtIni/$tdFim/$nome/$tpStatus";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);

    }

    public function LiberarNT($jsonAssintaura){
        $Address = SERVER_HOST . "TSMNTOnline/LiberarNT/$jsonAssintaura";
        // $Address = SERVER_HOST ."TSMNTOnline/ExcluirDadosNTOnline/49/teste/0.0.0.0";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);

    }
    public function getEnderecoCep($cep){
        $Address = SERVER_HOST . "TSMNTOnline/VerificaCEP/$cep";
        // $Address = SERVER_HOST ."TSMNTOnline/ExcluirDadosNTOnline/49/teste/0.0.0.0";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con ['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);

    }
    public function  StatusNotificacoes($iIdOrgaoEmpresa) {
        $Address = SERVER_HOST . "TSMNTOnline/StatusNotificacoes/$iIdOrgaoEmpresa";

        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);
    }
    public function getListarModelos($codDpt){
        $Address = SERVER_HOST . "TSMNTOnline/ListarModelos/$codDpt";

        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);

    }
    public function ListarAssinaturas($cliente)
    {
        $Address = SERVER_HOST . "TSMNTOnline/ListarAssinaturas/$cliente";

        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);
    }
    public function ProcessarArquivo($idOrgaoEmpresa, $uploadFile, $nomeCompleto, $maquinaid)
    {
        $Address = SERVER_HOST . "TSMNTOnline/ProcessarArquivo/$idOrgaoEmpresa/$uploadFile/$nomeCompleto/$maquinaid";
        $Con = json_decode($this->Connect->curl_get($Address, array(), array()), true);
        $Retorno = $Con['result'][0];
        // echo print_r($Retorno);
        return json_encode($Retorno);

    }



    /**
     * @return Ger
     */

}
?>