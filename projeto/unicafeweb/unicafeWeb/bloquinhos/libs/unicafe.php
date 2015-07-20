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
	 *
	 * @param string $sql        	
	 */
	public function query($sql) {
	}
	/**
	 * Retorna array Bidimencional com todas as linhas solicitadas.
	 *
	 * @param unknown $sql        	
	 * @return multitype:
	 */
	public function queryArray($sql) {
		return unicafeQueryArray ( $this->socket, $sql );
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
		throw new UniCafeException ( "Erro de conexгo!" );
		return false;
	}
	if (false == ($result = socket_write ( $socket, $message, strlen ( $message ) ))) {
		throw new UniCafeException ( "Conexгo recusada!" );
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
		throw new UniCafeException ( "Conexгo recusada!" );
		return false;
	} else {
		
		return true;
	}
}
/**
 * Envia Sql para o UniCafe para que possa retornar dados de mбquinas conectadas.
 *
 * @param resource $link        	
 * @param string $query        	
 */
function unicafeQuery($link, $query) {
}

/**
 * Funзгo que conversa com o servidor a baixo nнvel, enviando comandos e esperando resposta completa.
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
 * @param resource $link        	
 * @param string $query        	
 * @return array $lista
 */
function unicafeQueryArray($link, $query) {
	$lista = array ();
	return $lista;
}
/**
 *
 * @param UniCafeResult $result        	
 */
function unicafeFetchAssoc(UniCafeResult $result) {
}
/**
 * Fecha uma conexгo com o UniCafe.
 * 
 * @param resource $link        	
 */
function unicafeClose($link) {
}

?>