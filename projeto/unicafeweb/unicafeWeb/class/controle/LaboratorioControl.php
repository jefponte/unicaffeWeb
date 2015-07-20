<?php



class LaboratorioControl{
  
    private $laboratorioVisao;
    public  $tela_cadastro;
    public  $lab_dao;

    private $consulta = null;
    
    /**
     * 
     * @param type $tela
     * Esse parametro é uma das constantes que temos nessa classe. 
     * Temos TELA_CADASTRO
     */
   
    
    public function listarDados($tabela,$campus,$grupo_cond) {
        if($this->consulta == null){
            $dao=new DAO();
            
            $listar = new GeraSQL();
            
            //$dao->tipoDeConexao=$tipo_conexao;
            $lista = $listar->setLoad($tabela, $campus, $grupo_cond);
          // echo $lista;
            

            $this->consulta = $dao->getConexao()->query($lista);
            return $this->consulta->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return $this->consulta->fetch(PDO::FETCH_ASSOC);
        }
    } 
    public function telaListagem($sql){
         $dao = new DAO();
         
         
        foreach($dao->getConexao()->query($sql) as $linha){
            $laboratorio = new Laboratorio();
            $laboratorio->setNome($linha['nome_laboratorio']);
            
        
        }
        
        
    }
    public function telaCadastro($tipo){
       
     
       if (isset($_POST["formulario_cadastro_maquina_lab"])) {
            if (isset($_POST["id_maquina"]) && $_POST["id_maquina"]!=""){
                $labMaquina=new LaboratorioMaquina();
                $labMaquina->setIdMaquina($_POST["id_maquina"]);
                $labMaquina->setIdLaboratorio($_POST["id_lab"]);
                $maqLabDao=new MaquinaLabDao();
                if($maqLabDao->cadastraMaquinalab($labMaquina)){
                    $this->laboratorioVisao->mostraSucesso("Inserido com sucesso");
                    
                }
                else{
                    $this->laboratorioVisao->mostraFracasso("Não foi possível cadastrar");
                    
                }
                
                
                
            }
            else{
                 $this->laboratorioVisao->mensagemDeErro("Você deixou campos em branco");

            }
                
        } 
        elseif (isset($_POST["listar_maq"])){
                
                    $this->listarDados();

            
        }
         
        $this->laboratorioVisao->mostraFormCadastro($tipo);
        
        
    }
    
    public static $TELA_CADASTRO;
      //public static $TELA_CADASTRO_MAQUINA= 0;
}


?>

