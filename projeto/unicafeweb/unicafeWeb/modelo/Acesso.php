<?php
class Acesso{
	private $id;
	private $tempoUsado;
	private $horaInicial;
	private $usuario;
	private $tempoDisponibilizado;
	private $status;
        private $maquina;
        
	
	
	public function Acesso(){
		
		$this->usuario = new Usuario();
                $this->maquina=new Maquina();
		
	}
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function setTempoUsado($tempoUsado){
		$this->tempoUsado = $tempoUsado;
	}
	public function getTempoUsado(){
		return $this->tempoUsado;
	}
	public function setHoraInicial($horaInicial){
		$this->horaInicial = $horaInicial;
	}
        public function setMaquina(Maquina $maquina){
		$this->maquina = $maquina;
	}
	public function getHoraInicial(){
		return $this->horaInicial;
	}
        public function getMaquina(){
		return $this->maquina;
	}
	public function setUsuario(Usuario $usuario){
		$this->usuario = $usuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setTempoDisponibilizado($tempoDisponibilizado){
		$this->tempoDisponibilizado = $tempoDisponibilizado;
	}
	public function getTempoDisponibilizado(){
		return $this->tempoDisponibilizado;
	}
	public function setStatus($status){
		$this->status = $status;
	}
	public function getStatus(){
		return $this->status;
	}
	
	
	
	
}