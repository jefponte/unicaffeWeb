<?php
	
/**
 * Classe feita para manipulação do objeto Bloqueio
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */
class Bloqueio {
	private $id;
	private $dataHoraInicio;
	private $dataHoraFim;
	private $usuarioResponsavel;
	private $usuarioBloqueado;
	private $motivo;
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setDataHoraInicio($datahorainicio) {
		$this->datahorainicio = $datahorainicio;
	}
	public function getDataHoraInicio() {
		return $this->datahorainicio;
	}
	public function setDataHoraFim($datahorafim) {
		$this->datahorafim = $datahorafim;
	}
	public function getDataHoraFim() {
		return $this->datahorafim;
	}
	public function setUsuarioResponsavel($usuarioresponsavel) {
		$this->usuarioresponsavel = $usuarioresponsavel;
	}
	public function getUsuarioResponsavel() {
		return $this->usuarioresponsavel;
	}
	public function setUsuarioBloqueado($usuariobloqueado) {
		$this->usuariobloqueado = $usuariobloqueado;
	}
	public function getUsuarioBloqueado() {
		return $this->usuariobloqueado;
	}
	public function setMotivo($motivo) {
		$this->motivo = $motivo;
	}
	public function getMotivo() {
		return $this->motivo;
	}
}
?>