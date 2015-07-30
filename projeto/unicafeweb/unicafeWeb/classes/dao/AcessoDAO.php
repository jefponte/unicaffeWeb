<?php
class AcessoDAO extends DAO{
    
    
    
    public function retornaAcesso (){
        
        $lista=  array();
        $sql="SELECT * FROM maquina INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina INNER JOIN laboratorio ON laboratorio_maquina.id_maquina = maquina.id_maquina INNER JOIN acesso on acesso.id_maquina=maquina.id_maquina INNER JOIN usuario on acesso.id_usuario=usuario.id_usuario";
        echo $sql;
       $result= $this->getConexao()->query($sql);
       foreach ($result as $linha){
           $acesso = new Acesso();
           $acesso->setHoraInicial($linha['hora_inicial']);
           $acesso->getUsuario()->setId($linha['id_usuario']);
           $acesso->getUsuario()->setNome($linha['nome']);
		$acesso->getMaquina()->setLaboratorio(new Laboratorio());
		$acesso->getMaquina()->getLaboratorio()->setNome($linha['nome_laboratorio']);
		$acesso->getMaquina()->getLaboratorio()->setId($linha['id_laboratorio']);

           $acesso->getMaquina()->setNome($linha['nome_pc']);
           $lista[] = $acesso;
       }
        
      return $lista;
       
    }
    
    public static function fazdecontaqtanoIndes(){
        
        
           $dao = new AcessoDAO();
           $lista = $dao->retornaAcessos();
        
           foreach($lista as $acesso){
               
               echo $acesso->getUsuario()->getNome(); 
               
           }
    }
    
    
}

?>