<?php



class Acesso{
	
	private $id;
	private $horaInicial;
	private $tempoUsado;
	private $tempoDisponibilizado;
	private $ip;
	private $usuario;
	
	/**
	 * Esse atributo não existe como campo no banco de dados, só no UniCaffeServer. 
	 * @var integer
	 */
	private $status;
	
	
	public function Acesso(){
		$this->usuario = new Usuario();
	}

	public function setId($id){
		$this->id = $id;
	
	}
	public function getId(){
		return $this->id;
	
	}
	
	public function setHoraInicial($horaInicial){
		$this->horaInicial = $horaInicial;
	}
	public function getHoraInicial(){
		return $this->horaInicial;
	}
	public function setTempoUsado($tempoUsado){
		$this->tempoUsado = $tempoUsado;
	}
	public function getTempoUsado(){
		return $this->tempoUsado;
	}
	public function setTempoDisponibilizado($tempoDisponibilizado){
		$this->tempoDisponibilizado = $tempoDisponibilizado;
	}
	public function getTempoDisponibilizado(){
		return $this->tempoDisponibilizado;
	}
	public function setIp($ip){
		$this->ip = $ip;
	}
	public function getIp(){
		return $this->ip;
	}
	public function setUsuario(Usuario $usuario){
		$this->usuario = $usuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function __toString(){
		$strAcesso = 'Hora Inicial: '.$this->horaInicial;
		$strAcesso .= ' Tempo Disponibilizado: '.$this->tempoDisponibilizado;
		$strAcesso .= ' Tempo Usado '.$this->tempoUsado.' IP '.$this->ip;
		if($this->status == self::STATUS_DISPONIVEL){
			$strAcesso .= ' Status: Encerrado';
		}
		if($this->status == self::STATUS_EM_UTILIZACAO){
			$strAcesso .= ' Status: Em andamento ';
		}
		return $strAcesso;
		
	}
	const STATUS_EM_UTILIZACAO = 0;
	const STATUS_DISPONIVEL = 1;
}