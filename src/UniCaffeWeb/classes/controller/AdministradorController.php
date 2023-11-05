<?php

class AdministradorController
{

    private $view;

    private $dao;

    public static function main($tipoDeTela)
    {
        switch ($tipoDeTela) {
            case Sessao::NIVEL_SUPER:
                $controller = new AdministradorController();
                $controller->telaAdm();
                break;
            
            default:
                echo 'Indisponível';
                break;
        }
    }

    public function __construct()
    {
        $this->dao = new UsuarioDAO();
        $this->view = new AdministradorView();
    }

    public function telaAdm()
    {
        $this->cadastrar();
        $this->listar();
    }

    public function cadastrar()
    {
        $this->view->mostraFormulario();
        
        if (! isset($_GET['form_gerencia_adm'])) {
            return;
        }
        if (! isset($_GET['usuario'])) {
            return;
        }
        if (! isset($_GET['laboratorio'])) {
            return;
        }
        $usuario = new Usuario();
        $usuario->setLogin($_GET['usuario']);
        $laboratorio = new Laboratorio();
        $laboratorio->setNome($_GET['laboratorio']);
        
        if (! $this->dao->preenchePorLogin($usuario)) {
            $this->view->printMensagem("Usuario Inexistente");
            return;
        }
        
        if (! $this->dao->preenchePorNome($laboratorio)) {
            $this->view->printMensagem("Laboratorio Inexistente");
            return;
        }
        
        if ($this->dao->ehAdministrador($usuario, $laboratorio)) {
            $this->view->printMensagem("Ele ja era administrador");
            return;
        }
        if (! $this->dao->adicionaAdministrador($usuario, $laboratorio)) {
            $this->view->printMensagem("Erro na transacao principal");
            return;
        }
        $this->view->sucessoAddAdm();
        return;
    }

    public function tornarPadrao()
    {
        if (! isset($_GET['padrao_id'])) {
            return;
        }
        if (! isset($_POST['confirmar_padrao'])) {
            $this->view->formConfirmarTornarPadrao();
            return;
        }
        $usuario = new Usuario();
        $usuario->setId($_GET['padrao_id']);
        
        if ($this->dao->tornarPadrao($usuario)) {
            $this->view->sucessoTornarPadrao();
        } else {
            $this->view->erroTornarPadrao();
        }
        
        echo '<meta http-equiv="refresh" content="2; url=.\?pagina=gerenciamento_administrador">';
    }

    public function tornarSuper()
    {
        if (! isset($_GET['super_id'])) {
            return;
        }
        if (! isset($_POST['confirmar_super'])) {
            $this->view->formConfirmarTornarSuper();
            return;
        }
        $usuario = new Usuario();
        $usuario->setId($_GET['super_id']);
        
        if ($this->dao->tornarSuper($usuario)) {
            $this->view->sucessoTornarSuper();
        } else {
            $this->view->erroTornarSuper();
        }
        
        echo '<meta http-equiv="refresh" content="2; url=.\?pagina=gerenciamento_administrador">';
    }

    public function listar()
    {
        $this->tornarPadrao();
        if (isset($_GET['padrao_id'])) {
            return;
        }
        $this->tornarSuper();
        if (isset($_GET['super_id'])) {
            return;
        }
        $lista = $this->dao->retornaAdministradores();
        
        echo '
            <div class="borda" >
                <table border="1">';
        if (! count($lista)) {
            echo "Lista Vazia";
        } else {
            echo '<tr><th>Nome</th><th>Laboratorios</th><th>Login</th><th>Padrão</th><th>Super</th></tr>';
            foreach ($lista as $usuario) {
                
                echo '<tr><td>' . $usuario->getNome() . '</td>';
                if ($usuario->getNivelAcesso() != Sessao::NIVEL_SUPER) {
                    $labs = $this->dao->retornaLaboratoriosAdm($usuario);
                    echo '<td>';
                    foreach ($labs as $laboratorio) {
                        echo $laboratorio->getNome() . ' ';
                    }
                    echo '</td>';
                } else {
                    echo '<td>Super Usuario</td>';
                }
                
                echo '<td>' . $usuario->getLogin() . '</td><td><a class="botao" href="?pagina=gerenciamento_administrador&padrao_id=' . $usuario->getId() . '">Tornar Padrão</a></td><td><a class="botao" href="?pagina=gerenciamento_administrador&super_id=' . $usuario->getId() . '">Tornar Super</a></td></tr>';
            }
        }
        
        echo '</table>
            
            </div>';
    }
}

?>