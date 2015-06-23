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
        $retornaSQL=$geraSQL->setInsert("laboratorio_maquina", $dados);
        return $this->getConexao()->query($retornaSQL);
        
        
    }
    
}

?>