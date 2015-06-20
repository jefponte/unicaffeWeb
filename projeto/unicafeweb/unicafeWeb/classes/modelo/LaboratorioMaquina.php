<?php

class LaboratorioMaquina{
    
    private  $id;
    private  $id_maquina;  
    private  $id_laboratorio;
    
    public function setId($id){
        $this->id=$id;
        
    }
    public function setIdMaquina($id_maquina) {
        $this->id_maquina=$id_maquina;
        
        
    }
    public function setIdLaboratorio($idLaboratorio) {
        $this->id_laboratorio=$idLaboratorio;
    }
    
    public function getId() {
        return $this->id;
    }
    public function getIdMaquina(){
    return $this->id_maquina;
    }
    
    public function getIdLaboratorio() {
        return $this->id_laboratorio;
        
    }

}

?>