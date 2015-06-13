<?php



class LaboratorioControl{
  
    private $laboratorioVisao;
    
    
    public function LaboratorioControl(){
        $this->laboratorioVisao = new LaboratorioVisao();
        
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
            case self::$TELA_CADASTRO:
                $controle = new LaboratorioControl();
                $controle->telaCadastro();
                break;
            default:
                
                $controle = new LaboratorioControl();
                $controle->telaCadastro();
                break;
        }
    }
    public function telaListagem(){
         $dao = new DAO();
        foreach($dao->getConexao()->query("SELECT * FROM laboratorio") as $linha){
            $laboratorio = new Laboratorio();
            $laboratorio->setNome($linha['nome_laboratorio']);
            
        
        }
        
        
    }
    public function telaCadastro(){
        if(isset($_POST['formulario_cadastro'])){
            
            if(isset($_POST['nome']))
            {
                $laboratorio = new Laboratorio();
                $laboratorio->setNome($_POST['nome']);
                
            }else{
                $this->laboratorioVisao->mensagemDeErro("Esqueceu de escrever o nome");
                
                return;
                
            }
            
        }
        $this->laboratorioVisao->mostraFormCadastro();
        
        
    }
    
    public static $TELA_CADASTRO = 0;
    
}


?>

