<?php

/**
 * @author Jefferson Uchôa Ponte
 * Classe que representa a máquina, um PC do laboratóriod e informática, com informações
 * de laboratório, acesso e usuário.
 */
class Maquina
{

    private $id;

    private $nome;

    private $enderecoMac;

    private $status;

    private $acesso;

    private $laboratorio;

    private $cadastrada;

    private $versao;
    
    private $cota;
  
    
    public function setCota($cota){
        $this->cota = $cota;
    }
    
    public function getCota(){
        return $this->cota;
    }
    
    /**
     * @return boolean
     */
    public function getCadastrada()
    {
        return $this->cadastrada;
    }

    /**
     * @return string
     */
    public function getVersao()
    {
        return $this->versao;
    }

    /**
     * @param string $versao
     */
    public function setVersao($versao)
    {
        $this->versao = $versao;
    }

    /**
     *
     * @param boolean $cadastrada
     */
    public function setCadastrada($cadastrada)
    {
        $this->cadastrada = $cadastrada;
    }

    /**
     *
     * @return boolean
     */
    public function isCadastrada()
    {
        return $this->cadastrada;
    }

    /**
     * Constrói objeto Máquina.
     */
    public function __construct()
    {
        $this->laboratorio = new Laboratorio();
        $this->acesso = new Acesso();
    }

    /**
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     *
     * @param string $enderecoMac
     */
    public function setEnderecoMac($enderecoMac)
    {
        $this->enderecoMac = $enderecoMac;
    }

    /**
     *
     * @return string
     */
    public function getEnderecoMac()
    {
        return $this->enderecoMac;
    }

    /**
     *
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     *
     * @param Acesso $acesso
     */
    public function setAcesso(Acesso $acesso)
    {
        $this->acesso = $acesso;
    }

    /**
     *
     * @return Acesso
     */
    public function getAcesso()
    {
        return $this->acesso;
    }

    /**
     *
     * @param Laboratorio $laboratorio
     */
    public function setLaboratorio(Laboratorio $laboratorio)
    {
        $this->laboratorio = $laboratorio;
    }

    /**
     *
     * @return Laboratorio
     */
    public function getLaboratorio()
    {
        return $this->laboratorio;
    }

    public function __toString()
    {
        $strMaquina = $this->nome . ' MAC: ' . $this->enderecoMac;
        
        if ($this->isCadastrada()) {
            $strMaquina .= ' Cadatrada';
        } else {
            $strMaquina .= ' Nao cadastrada';
        }
        
        if ($this->getStatus() == self::STATUS_DESCONECTADA)
            $strMaquina .= ' Desconectada';
        if ($this->getStatus() == self::STATUS_DISPONIVEL)
            $strMaquina .= ' Disponivel ';
        if ($this->getStatus() == self::STATUS_OCUPADA) {
            $strMaquina .= ' Ocupada ';
        }
        if ($this->getLaboratorio()->getNome() != null)
            $strMaquina .= 'Laboratorio: ' . $this->getLaboratorio()->getNome();
        
        return $strMaquina;
    }

    /**
     * Máquina está sendo atualizada
     * 
     * @var integer
     */
    const STATUS_UPDATE = 4;

    /**
     * Máquina está disponível.
     * 
     * @var integer
     */
    const STATUS_DISPONIVEL = 0;

    /**
     * Máquina está ocupada.
     * 
     * @var integer
     */
    const STATUS_OCUPADA = 1;

    /**
     * Máquina está desconectada.
     * 
     * @var integer
     */
    const STATUS_DESCONECTADA = 2;
}
