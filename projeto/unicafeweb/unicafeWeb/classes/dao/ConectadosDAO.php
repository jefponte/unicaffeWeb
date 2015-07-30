<?php
class conectadosDAO extends DAO{
    
    
    
    public function retornaConectados (){
        
        $lista=  array();
        $sql="SELECT * FROM acesso INNER JOIN maquina on acesso.id_maquina=maquina.id_maquina INNER JOIN usuario on acesso.id_usuario=usuario.id_usuario";
      //  echo $sql;
        $this->DAO(NULL,1);
        
       $result= $this->getConexao()->query($sql);
       foreach ($result as $linha){
           $acesso = new Acesso();
           $acesso->setHoraInicial($linha['hora_inicial']);
           $acesso->getUsuario()->setId($linha['id_usuario']);
           $acesso->getUsuario()->setNome($linha['nome']);
           $laboratorio = new Laboratorio();
           
           $laboratorio->setNome($linha['nome_laboratorio']);
           $laboratorio->setId($linha['id_laboratorio']);
           $acesso->getMaquina()->setLaboratorio($laboratorio);
           $acesso->getMaquina()->setNome($linha['nome_pc']);
           $lista[] = $acesso;
       }
        
      return $lista;
       
    }
    
   
    
    
}

?>