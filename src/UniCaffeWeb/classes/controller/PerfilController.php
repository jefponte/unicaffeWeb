<?php




class PerfilController{
    private $view;
    private $dao;
    
    public static function main($nivelDeAcesso){
        if($nivelDeAcesso == Sessao::NIVEL_SUPER || $nivelDeAcesso == Sessao::NIVEL_ADMIN){
            $controller = new PerfilController();
            $controller->telaPerfil();
        }else{
            echo "Acesso negado";
        }
    }
    
    
    
    public function __construct(){
        $this->view = new PerfilView();   
        $this->dao = new PerfilDAO();
    }
    public function telaPerfil(){

        $this->deletar();
        if(isset($_GET['deletar_id'])){
            return;
        }
        $this->cadastro();
        if(isset($_GET['cadastro_perfil'])){
            return;
        }     
        $this->listar();

    }
    public function deletar(){
        if(!isset($_GET['deletar_id'])){
            return;
        }
        $this->view->formConfirmacaoDeletar();
        if(!isset($_POST['certeza_deletar'])){
            return;
        }
        
        $perfil = new Perfil();
        $perfil->setId($_GET['deletar_id']);
        if($this->dao->deletar($perfil)){
            $this->view->mensagemSucessoDeletar();
        }else{
            $this->view->mensagem("Erro ao tentar deletar");
        }
        
        echo '<meta http-equiv="refresh" content="2; url=.\?pagina=perfil">';
    }
    public function listar(){
        $lista = $this->dao->retornaLista();
        $this->view->exibirLista($lista);
    }
    public function cadastro(){
        if(isset($_GET['ajuda'])){
            $this->view->mensagemAjuda();
        }
        if(!isset($_GET['cadastro_perfil'])){
            $this->view->formCadastro();
            return;
        }  
        if(!isset($_GET['nome'])){
            $this->view->mensagem("Preencha todos os campos");
            return;
        }
        if($_GET['nome'] == null){
            $this->view->mensagem("Preencha todos os campos");
            return;
        }
        if(!isset($_GET['tempo_turno'])){
            $this->view->mensagem("Preencha todos os campos");
            return;
        }
        if(!isset($_GET['lotacao'])){
            $this->view->mensagem("Preencha todos os campos");
            return;
        }
        if(!isset($_GET['cota'])){
            $this->view->mensagem("Preencha todos os campos");
            return;
        }
        $perfil = new Perfil();
        $perfil->setNome($_GET['nome']);
        $perfil->setTempoTurno($_GET['tempo_turno']);
        $perfil->setLotacao($_GET['lotacao']);
        $perfil->setCota($this->horasParaSegundos($_GET['cota']));

        if(isset($_GET['bonus'])){
            $perfil->setBonusHabilitado(true);
        }
        if(isset($_GET['visitante'])){
            $perfil->setVisitanteHabilitado(true);
        }
        if(!isset($_POST['certeza'])){
            $this->view->formConfirmacao();
            return;
        }
        if($this->dao->inserir($perfil)){
            $this->view->mensagemSucesso();
        }else{
            $this->view->mensagemFracasso();
        }
        echo '<meta http-equiv="refresh" content="2; url=.\?pagina=perfil">';
        
    }
    
    public function horasParaSegundos($strHoras){
        $time = strtotime($strHoras);
        $horas = date("H", $time);
        $minutos = date("i", $time);
        $segundos = date("s", $time);
        $total = ($horas*3600)+($minutos*60)+$segundos;
        return $total;
    }
    
    
    
    
    
    
}


?>