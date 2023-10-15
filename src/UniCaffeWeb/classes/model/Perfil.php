<?php

/**
 * 
 * @author Jefferson Uch�a Ponte
 *
 */
class Perfil{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var integer
     */
    private $cota;
    /**
     * @var boolean
     */
    private $visitanteHabilitado;
    /**
     * @var boolean
     */
    private $bonusHabilitado;
    /**
     * @var integer
     */
    private $lotacao;
    /**
     * @var integer
     */
    private $tempoTurno;
    
    public function __construct(){
        $this->nome = "Padrão";
        $this->visitanteHabilitado = false;
        $this->bonusHabilitado = false;
        $this->cota = 3600;
        $this->lotacao = 3;
        $this->tempoTurno = 6;
    }
    
    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return number
     */
    public function getCota()
    {
        return $this->cota;
    }

    /**
     * @return boolean
     */
    public function isVisitanteHabilitado()
    {
        return $this->visitanteHabilitado;
    }

    /**
     * @return boolean
     */
    public function isBonusHabilitado()
    {
        return $this->bonusHabilitado;
    }

    /**
     * @return number
     */
    public function getLotacao()
    {
        return $this->lotacao;
    }

    /**
     * @return number
     */
    public function getTempoTurno()
    {
        return $this->tempoTurno;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param number $cota
     */
    public function setCota($cota)
    {
        $this->cota = $cota;
    }

    /**
     * @param boolean $visitanteHabilitado
     */
    public function setVisitanteHabilitado($visitanteHabilitado)
    {
        $this->visitanteHabilitado = $visitanteHabilitado;
    }

    /**
     * @param boolean $bonusHabilitado
     */
    public function setBonusHabilitado($bonusHabilitado)
    {
        $this->bonusHabilitado = $bonusHabilitado;
    }

    /**
     * @param number $lotacao
     */
    public function setLotacao($lotacao)
    {
        $this->lotacao = $lotacao;
    }

    /**
     * @param number $tempoTurno
     */
    public function setTempoTurno($tempoTurno)
    {
        $this->tempoTurno = $tempoTurno;
    }

    
    
    
    
    
}

?>