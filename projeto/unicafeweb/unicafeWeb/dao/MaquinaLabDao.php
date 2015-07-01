<?php
class MaquinaLabDao extends DAO{
    public function MaquinaLabDao(Conexao $conexao=NULL) {
        if($conexao!=NULL){
            parent::DAO($conexao);
        }
        else {
            parent::DAO();
        }
    }
    
    public function cadastraMaquinalab(LaboratorioMaquina $maqLab) {
        
        $id_maquina=$maqLab->getIdMaquina();
        $id_lab=$maqLab->getIdLaboratorio();
        
        $geraSQL=new GeraSQL();
        $dados=[
            "id_maquina" => $id_maquina,
            "id_laboratorio" => $id_lab
            
        ];
        //$condicao="where maquina.id_maquina not in  ((select id_maquina from laboratorio_maquina )) ";
        $retornaSQL=$geraSQL->setInsert("laboratorio_maquina", $dados);
        echo $retornaSQL;
        return $this->getConexao()->query($retornaSQL);
        
        
    }
    public function editarMaquinalab(LaboratorioMaquina $maqLab) {
        
        $id_maquina=$maqLab->getIdMaquina();
        $id_lab=$maqLab->getIdLaboratorio();
        
        $geraSQL=new GeraSQL();
        $dados="id_maquina=$id_maquina,id_laboratorio=$id_lab";
        $add="where id_maquina=$id_maquina && id_laboratorio=$id_lab";    
        $retornaSQL=$geraSQL->setUpdade("laboratorio_maquina", $dados,$add);
        return $this->getConexao()->query($retornaSQL);
        
        
    }
    
}

?>