<?php

/**
 * Classe que agrega dados do usuário; 
 * @author Jefferson Uchôa Ponte
 */
class Usuario
{

    private $id;

    private $nome;

    private $email;

    private $login;

    private $senha;

    private $nivelAcesso;

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
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     *
     * @param string $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     *
     * @param int $nivelAcesso
     */
    public function setNivelAcesso($nivelAcesso)
    {
        $this->nivelAcesso = $nivelAcesso;
    }

    /**
     *
     * @return int
     */
    public function getNivelAcesso()
    {
        return $this->nivelAcesso;
    }

    public function __toString()
    {
        $strUsuario = ' Nome: ' . $this->nome . ' email: ' . $this->email . ' Login: ' . $this->login;
        if ($this->getNivelAcesso() == Sessao::NIVEL_COMUM) {
            $strUsuario .= 'Nivel Default';
        }
        if ($this->getNivelAcesso() == Sessao::NIVEL_ADMIN) {
            $strUsuario .= 'Nivel Administrador';
        }
        if ($this->getNivelAcesso() == Sessao::NIVEL_SUPER) {
            $strUsuario .= 'Nivel Super';
        }
        return $strUsuario;
    }
}