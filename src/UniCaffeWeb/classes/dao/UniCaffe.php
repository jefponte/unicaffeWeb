<?php

/**
 * Trata excessões da conexão com o servidor do UniCaffé. 
 * @author Jefferson Uchôa Ponte
 *
 */
class UniCaffeException extends Exception {
    /**
     * Constrói objeto UniCaffeException
     * @param string $message
     * @param number $code
     * @param string $previous
     */
	public function __construct($message, $code = 0, $previous = null) {
		$this->message = $message;
		$this->code = $code;
		$this->message = "Servidor indisponivel";
	}
}
/**
 * Resultado de instrução enviada para o servidor do UniCaffé. 
 * @author Jefferson Uchôa Ponte
 *
 */
class UniCaffeStatement implements Iterator {
   
	private $position = 0;
	private $array;
	/**
	 * Constrói objeto UniCaffeStatement.
	 */
	public function __construct() {
		$this->position = 0;
		$this->array = array ();
	}
	/**
	 * @param string[] $matriz
	 */
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
 * Faz conexões e envia comandos para o servidor do UniCaffé. 
 * @author Jefferson Uchôa Ponte
 *
 */
class UniCaffe {
	private $socket;
	private $porta;
	private $host;
	private $usuario;
	private $senha;
	/**
	 * Constrói objeto UniCaffe e faz uma conexão com o servidor. 
	 * @param string $host
	 * @param integer $porta
	 * @param string $usuario
	 * @param string $senha
	 */
	public function __construct($host = null, $porta = null, $usuario = null, $senha = null) {
	    $this->host = $host;
		$this->porta = $porta;
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->connect();
	}
	/**
	 * Inicia uma conexão com servidor do UniCaffé. 
	 */
	public function connect(){
		$this->socket = unicaffeConnect ( $this->host, $this->porta, $this->usuario, $this->senha );
	}
	/**
	 * Envia um comando para o servidor do UniCaffé. 
	 * @param string $comando
	 */
	public function exec($comando) {
		unicaffeExec ( $this->socket, $comando );
	}
	
	/**
	 * Executa uma instrução SQL, retornando uma lista de elementos. 
	 * 
	 * @return UniCaffeStatement UniCaffe::query retorna um objeto UniCaffeStatement, 
	 * ou falto se der erro.
	 */
	public function query($statement) {
		
		$listaJSON = $this->dialoga ( $statement );
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
	 *Envia uma mensagem ao servidor do UniCaffé e espera uma resposta.  
	 *
	 * @param string $comando        	
	 */
	public function dialoga($comando) {
		return unicaffeDialoga ( $this->socket, $comando );
	}
	/**
	 * Fecha a conexão. 
	 */
	public function close() {
		unicaffeClose ( $this->socket );
	}
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
	if($host == null){
		$host = "localhost";
	}
	if($porta == null){
		$porta = 27289;
	}
	
	$message = "setStatus(3)\n";
	$socket = socket_create ( AF_INET, SOCK_STREAM, 0 );
	
	if (false == ($result = @socket_connect ( $socket, $host, $porta ))) {
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
 * Função que conversa com o servidor a baixo nível, 
 * enviando comandos e esperando resposta completa.
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
 * Fecha uma conexão com o UniCaffe.
 *
 * @param resource $link        	
 */
function unicaffeClose($link) {
	socket_close ( $link );
}
?>