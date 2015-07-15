<?php


class Laboratorio{
    private $id;
    private $nome;
    
    
    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    
    public function getId(){
        return $this->id;
    }
    
    
    
}


?>