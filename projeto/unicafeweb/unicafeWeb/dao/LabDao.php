<?php
class LabDao extends DAO{
    
    public function LabDao(Conexao $conexao=null) {
        if($conexao!=NULL){
            parent::DAO($conexao);
            
        }
 else {
     
            parent::DAO();
 }
        
    }
    
    public function cadastroLab(Laboratorio $lab) {
        
        $nome= $lab->getNome();
        $geraSql=new GeraSQL();
        $dados=[
            "nome_laboratorio" => $nome
            
        ];
       $retornaSql= $geraSql->setInsert("laboratorio", $dados);
       //echo $retornaSql;
       return $this->getConexao()->query($retornaSql);
        
       
        
    }
    
    
    
    
}

?>