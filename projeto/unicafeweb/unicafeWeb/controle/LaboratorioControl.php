<?php



class LaboratorioControl{
  
    private $laboratorioVisao;
    public  $tela_cadastro;
    public  $lab_dao;






    public function LaboratorioControl($tipo){
        $this->laboratorioVisao = new LaboratorioVisao($tipo);
       // $this->telaCadastro();
        
    }
     
    /**
     * 
     * @param type $tela
     * Esse parametro é uma das constantes que temos nessa classe. 
     * Temos TELA_CADASTRO
     */
    public static function main($tela){
        
        switch ($tela)
        {
            case self::$TELA_CADASTRO==1:
                $controle = new LaboratorioControl(1);
                $controle->telaCadastro(1);
                break;
            case self::$TELA_CADASTRO==2:
            
                $controle = new LaboratorioControl(2);
                $controle->telaCadastro(2);
                break;
            
            case self::$TELA_CADASTRO==3:
            
                $controle = new LaboratorioControl(3);
                $controle->telaCadastro(3);
                break;
           default:
        }
    }
    
    public function listarDados() {
        
  if (isset ($_POST["listar_maq"])) {
      $dao = new DAO();
            $condicao = array();        
        if(!empty($op1)){
            $condicao[] =  "nome_maq = '{$nome_maq}'";
        }  else {}
        if(!empty($op2)){
            $condicao[] =  "mac"
                    . " = '{$desc_mac}'";
        }
        $grupo_cond = join(" AND ", $condicao);
        $listar = new GeraSQL();
        $lista = $listar->setLoad("maquina", "nome_pc,mac", $grupo_cond);
        echo $lista;
        
        
        $consulta = $dao->getConexao()->query($lista);
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
           echo "Nome: {$linha['nome_pc']} - Usuário: {$linha['mac']}<br />";
           
        }
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
       
        if(isset($_POST["formulario_cadastro"]))    {
            if(isset($_POST['nome']) && $_POST["nome"]!="")
            {
                $laboratorio = new Laboratorio();
                $laboratorio->setNome($_POST['nome']);
                $labDao= new LabDao();
                if($labDao->cadastroLab($laboratorio)){
                    $this->laboratorioVisao->mostraSucesso("Inserido com sucesso");
                    
                }
                else {
                    $this->laboratorioVisao->mostraFracasso();
                    
                }            
            }else{
                $this->laboratorioVisao->mensagemDeErro("Esqueceu de escrever o nome");
            }
        }  
        
        elseif (isset($_POST["formulario_cadastro_maquina_lab"])) {
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

