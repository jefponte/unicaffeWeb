<?php

/**
 * 
 * @author jefponte
 *
 */
class UniCafeException extends Exception {
	public function __construct($message, $code = 0, $previous = null) {
		$this->message = $message;
		$this->code = $code;
		$this->message = $previous;
	}
}


class UniCafeStatement implements Iterator {
	
	private $position = 0;
	private $array;

	public function __construct() {
		$this->position = 0;
		$this->array = array();
	}
	public function setArray($matriz){
		$this->array = $matriz;
	}
	

	function rewind() {
		$this->position = 0;
	}

	function current() {
		return $this->array[$this->position];
	}

	function key() {
		return $this->position;
	}

	function next() {
		++$this->position;
	}

	function valid() {
		return isset($this->array[$this->position]);
	}
}

/**
 *
 * @author jefponte
 *        
 */
class UniCafe {
	private $socket;
	public function __construct($servidor = null, $usuario = null, $senha = null) {
		$this->socket = unicafeConnect ( $servidor, $usuario, $senha );
	}
	public function exec($comando) {
		unicafeExec ( $this->socket, $comando );
	}
	
	
	/**
	 * Executa uma instru��o SQL, retornando um objeto UniCafeStatement como resultado. 
	 * @return UniCafeStatement UniCafe::query retorna um objeto UniCafeStatement, ou falto se der erro.
	 */
	public function query($statement) {

		//Eu tenho que fazer ele reunir uma matriz com linhas de vetores para entrarem no Statement. 
		//Isso vai vir do JSON convertido. :) 
		$listaJSON = $this->dialoga($statement);
		
		//Essa lista a� eu espero que seja um JSON. 
		//Tenho que pegar ela e separar e matriz. 

		$arrJson = explode('|', $listaJSON);
		$lista = array();
		if(count($arrJson) <= 1){
			return array();
		}
		$i = 0;
		foreach($arrJson as $json){
			
			if($i == 0){
				$i++;
				continue;
			}
			$objeto = json_decode($json, true);
			//echo $json;
			$lista[] = $objeto;
		}
		$stmt = new UniCafeStatement();
		if($i != 0){
			$stmt->setArray($lista);
			
			return $stmt;
		}else{
			return array();
		}
		
		
		
		
	}
	
	/**
	 * Passar comandos diretamente para o servidor.
	 *
	 * capturando a resposta e retornando do jeito que ele manda.
	 * 
	 * @param string $comando        	
	 */
	public function dialoga($comando) {
		return unicafeDialoga ( $this->socket, $comando );
	}
	public function close() {
		unicafeClose ( $this->socket );
	}
}

/**
 *
 * @author jefponte
 *        
 */
class UniCafeResult {
	public $current_field;
	public $field_count;
	public $lengths;
	public $num_rows;
	public $type;
}
/**
 *
 * @param string $servidor        	
 * @param string $usuario        	
 * @param string $senha        	
 * @throws UniCafeException
 * @return boolean|resource
 */
function unicafeConnect($servidor = null, $usuario = null, $senha = null) {
	$host = "localhost";
	$port = 27289;
	$message = "setStatus(3)\n";
	
	$socket = socket_create ( AF_INET, SOCK_STREAM, 0 );
	
	if (false == ($result = @socket_connect ( $socket, $host, $port ))) {
		throw new UniCafeException ( "Erro de conexão!" );
		return false;
	}
	if (false == ($result = socket_write ( $socket, $message, strlen ( $message ) ))) {
		throw new UniCafeException ( "Conexão recusada!" );
		return false;
	}
	return $socket;
}

/**
 *
 * @param resource $link        	
 * @param string $comando        	
 * @throws UniCafeException
 * @return boolean
 */
function unicafeExec($link, $comando) {
	echo $comando;
	
	if (false == ($result = socket_write ( $link, $comando, strlen ( $comando ) ))) {
		throw new UniCafeException ( "Conexão recusada!" );
		return false;
	} else {
		
		return true;
	}
}
/**
 * Envia Sql para o UniCafe para que possa retornar dados de máquinas conectadas.
 *
 * @param resource $link        	
 * @param string $query        	
 */
function unicafeQuery($link, $query) {
}

/**
 * Função que conversa com o servidor a baixo nível, enviando comandos e esperando resposta completa.
 *
 * @param resource $link        	
 * @param string $query        	
 */
function unicafeDialoga($link, $comando) {
	socket_write ( $link,$comando."\n", strlen ( $comando."\n" ) ) or die ( "Could not send data to server\n" );
	$strJson = "";
	while ( $result = socket_read ( $link, 1024 ) ) {
		$strJson .= $result;
	}
	return  $strJson;
}


/**
 *
 * @param UniCafeResult $result        	
 */
function unicafeFetchAssoc(UniCafeResult $result) {
}
/**
 * Fecha uma conexão com o UniCafe.
 * 
 * @param resource $link        	
 */
function unicafeClose($link) {
	socket_close($link);
}

?>