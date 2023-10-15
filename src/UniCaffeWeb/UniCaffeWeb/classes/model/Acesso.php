<?php

/**
 * Representa o acesso atual da máquina, com informação de tempo utilizado, estado do acesso e usuário atual.
 *
 * @author Jefferson Uchôa Ponte
 *
 */
class Acesso
{

    private $id;

    private $horaInicial;

    private $tempoUsado;

    private $tempoDisponibilizado;

    private $ip;

    private $usuario;

    private $status;

    /**
     * construtor do acesso
     */
    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    /**
     *
     * @param int $id
     *            id de Acesso
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return int id de Acesso
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param int $horaInicial
     *            hora inicial
     */
    public function setHoraInicial($horaInicial)
    {
        $this->horaInicial = $horaInicial;
    }

    /**
     *
     * @return number hora inicial
     */
    public function getHoraInicial()
    {
        return $this->horaInicial;
    }

    /**
     *
     * @param int $tempoUsado
     *            tempo usado
     */
    public function setTempoUsado($tempoUsado)
    {
        $this->tempoUsado = $tempoUsado;
    }

    /**
     *
     * @return number tempo usado
     */
    public function getTempoUsado()
    {
        return $this->tempoUsado;
    }

    /**
     *
     * @param int $tempoDisponibilizado
     *            tempo disponibilizado
     */
    public function setTempoDisponibilizado($tempoDisponibilizado)
    {
        $this->tempoDisponibilizado = $tempoDisponibilizado;
    }

    /**
     *
     * @return int tempo disponibilizado
     */
    public function getTempoDisponibilizado()
    {
        return $this->tempoDisponibilizado;
    }

    /**
     *
     * @param int $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     *
     * @return string ip
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     *
     * @param Usuario $usuario
     */
    public function setUsuario(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     *
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        $strAcesso = 'Hora Inicial: ' . $this->horaInicial;
        $strAcesso .= ' Tempo Disponibilizado: ' . $this->tempoDisponibilizado;
        $strAcesso .= ' Tempo Usado ' . $this->tempoUsado . ' IP ' . $this->ip;
        if ($this->status == self::STATUS_DISPONIVEL) {
            $strAcesso .= ' Status: Encerrado';
        }
        if ($this->status == self::STATUS_EM_UTILIZACAO) {
            $strAcesso .= ' Status: Em andamento ';
        }
        return $strAcesso;
    }

    /**
     *
     * @var integer indica que a máquina em sendo utilizada
     */
    const STATUS_EM_UTILIZACAO = 0;

    /**
     *
     * @var integer indica que a máquina está disponível
     */
    const STATUS_DISPONIVEL = 1;
}