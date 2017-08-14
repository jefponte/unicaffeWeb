<?php

/**
 * 
 * @author jefponte
 *
 */
class UniCaffeException extends Exception {
	public function __construct($message, $code = 0, $previous = null) {
		$this->message = $message;
		$this->code = $code;
		$this->message = $previous;
	}
}
class UniCaffeStatement implements Iterator {
	private $position = 0;
	private $array;
	public function __construct() {
		$this->position = 0;
		$this->array = array ();
	}
	public function setArray($matriz) {
		$this->array = $matriz;
	}
	function rewind() {
		$this->position = 0;
	}
	function current() {
		return $this->array [$this->position];
	}
	function key() {
		return $this->position;
	}
	function next() {
		++ $this->position;
	}
	function valid() {
		return isset ( $this->array [$this->position] );
	}
}

/**
 *
 * @author jefponte
 *        
 */
class UniCaffe {
	private $socket;
	public function __construct($host = null, $porta = null, $usuario = null, $senha = null) {
		$this->socket = unicaffeConnect ( $host, $porta, $usuario, $senha );
	}
	public function exec($comando) {
		unicaffeExec ( $this->socket, $comando );
	}
	
	/**
	 * Executa uma instru��o SQL, retornando um objeto UniCaffeStatement como resultado.
	 *
	 * @return UniCaffeStatement UniCaffe::query retorna um objeto UniCaffeStatement, ou falto se der erro.
	 */
	public function query($statement) {
		
		// Eu tenho que fazer ele reunir uma matriz com linhas de vetores para entrarem no Statement.
		// Isso vai vir do JSON convertido. :)
		$listaJSON = $this->dialoga ( $statement );
		
		// Essa lista a� eu espero que seja um JSON.
		// Tenho que pegar ela e separar e matriz.
		
		$arrJson = explode ( '|', $listaJSON );
		$lista = array ();
		if (count ( $arrJson ) <= 1) {
			return array ();
		}
		$i = 0;
		foreach ( $arrJson as $json ) {
			
			if ($i == 0) {
				$i ++;
				continue;
			}
			$objeto = json_decode ( $json, true );
			// echo $json;
			$lista [] = $objeto;
		}
		$stmt = new UniCaffeStatement ();
		if ($i != 0) {
			$stmt->setArray ( $lista );
			
			return $stmt;
		} else {
			return array ();
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
		return unicaffeDialoga ( $this->socket, $comando );
	}
	public function close() {
		unicaffeClose ( $this->socket );
	}
}

/**
 *
 * @author jefponte
 *        
 */
class UniCaffeResult {
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
 * @throws UniCaffeException
 * @return boolean|resource
 */
function unicaffeConnect($host = null, $porta = null, $usuario = null, $senha = null) {
	
	$host = "localhost";
	if($porta == null){
		$port = 27289;
	}
	$message = "setStatus(3)\n";
	
	$socket = socket_create ( AF_INET, SOCK_STREAM, 0 );
	
	if (false == ($result = @socket_connect ( $socket, $host, $port ))) {
		throw new UniCaffeException ( "Erro de conexão!" );
		return false;
	}
	if (false == ($result = socket_write ( $socket, $message, strlen ( $message ) ))) {
		throw new UniCaffeException ( "Conexão recusada!" );
		return false;
	}
	return $socket;
}

/**
 *
 * @param resource $link        	
 * @param string $comando        	
 * @throws UniCaffeException
 * @return boolean
 */
function unicaffeExec($link, $comando) {
	echo $comando;
	
	if (false == ($result = socket_write ( $link, $comando, strlen ( $comando ) ))) {
		throw new UniCaffeException ( "Conexão recusada!" );
		return false;
	} else {
		
		return true;
	}
}
/**
 * Envia Sql para o UniCaffe para que possa retornar dados de máquinas conectadas.
 *
 * @param resource $link        	
 * @param string $query        	
 */
function unicaffeQuery($link, $query) {
}

/**
 * Função que conversa com o servidor a baixo nível, enviando comandos e esperando resposta completa.
 *
 * @param resource $link        	
 * @param string $query        	
 */
function unicaffeDialoga($link, $comando) {
	socket_write ( $link, $comando . "\n", strlen ( $comando . "\n" ) ) or die ( "Could not send data to server\n" );
	$strJson = "";
	while ( $result = socket_read ( $link, 1024 ) ) {
		$strJson .= $result;
	}
	return $strJson;
}

/**
 *
 * @param UniCaffeResult $result        	
 */
function unicaffeFetchAssoc(UniCaffeResult $result) {
}
/**
 * Fecha uma conexão com o UniCaffe.
 *
 * @param resource $link        	
 */
function unicaffeClose($link) {
	socket_close ( $link );
}

?>