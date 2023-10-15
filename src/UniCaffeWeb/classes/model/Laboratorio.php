<?php

/**
 * Esta classe representa um local de acesso de computadores, provido de máquinas com UniCaffé.
 *
 * @author Jefferson Uchôa Ponte
 *
 */
class Laboratorio
{

    private $id;

    private $nome;
    
    private $perfil;
    
    public function setPerfil(Perfil $perfil){
        $this->perfil = $perfil;
    }
    
    public function getPerfil(){
        return $this->perfil;
    }

    public function __construct(){
        $this->id = 0;
        $this->perfil = new Perfil();
        
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
     * @return number
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
}

?>