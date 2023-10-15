<?php

/**
 * 
 * Tela de gerenciamento de comandos administrativos. 
 * @author Jefferson Uchôa Ponte
 * 
 */
class ComandoController
{

    /**
     * Comando desligar.
     * 
     * @var integer
     */
    const COMANDO_DESLIGAR = 1;

    /**
    * Comando aula.
    *
    * @var integer
    */
    const COMANDO_AULA = 2;
    /**
     * Comando visitante.
     * 
     * @var integer
     */
    const COMANDO_VISITANTE = 3;

    /**
     * Comando bloqueia
     * 
     * @var integer
     */
    const COMANDO_BLOQUEIA = 4;

    /**
     * Comando alocar máquina a um laboratório.
     * 
     * @var integer
     */
    const COMANDO_ALOCAR = 5;

    /**
     * Comando ligar.
     * 
     * @var integer
     */
    const COMANDO_LIGAR = 6;
    /**
     * Comando para enviar mensagem de aviso para as maquinas
     *
     * @var integer
     */
    const COMANDO_AVISO = 7;
    
     /**
     * Apaga arquivos da pasta localunicafe
     * @var integer
     */
    const COMANDO_LIMPAR = 10;
    
    /**
     * Comando atualizar Endereço MAC.
     * 
     * @var integer
     */
    const COMANDO_ATUALIZAR_MAC = 25;
    /**
     * Comando atualizar.
     *
     * @var integer
     */
    const COMANDO_ATUALIZAR = 26;
    /**
     * Enviar a lista de programas a serem liberados
     * @var integer
     */
    const COMANDO_LIBERA_PROCESSOS_BLOQUEADOS = 27;    
    /**
     * Define o perfil a um laboratório. 
     * @var integer
     */
    const COMANDO_DEFINIR_PERFIL = 28;

    //---------------------------------------------    
    
    /**
     * Comando apagar dados do usuário.
     *
     * @var integer
     */

    const COMANDO_APAGAR = 99;
    
    /**
     * Comando com internet.
     *
     * @var integer
     */
    const COMANDO_COM_INTERNET = 123;
    
    /**
     * Comando manutenção.
     *
     * @var integer
     */
    
    const COMANDO_DESATIVAR = 300;
    
    /**
     * Comando sem internet.
     *
     * @var integer
     */
    const COMANDO_SEM_INTERNET = 321;
    
    /**
     * Inicia aplicação que gerencia comandos.
     *
     * @param integer $nivelDeAcesso
     */
    
    public static function main($nivelDeAcesso)
    {
        if (! isset($_GET['comando'])) {
            return;
        }
        switch ($nivelDeAcesso) {
            case Sessao::NIVEL_SUPER:
                
                if (isset($_GET['comando_laboratorio'])) {
                    if (! isset($_GET['confirmado'])) {
                        self::formConfirmacao("comando_laboratorio");
                        return;
                    }
                    echo ' <div class="confirmacao">';
                    $saida = "Nao respondeu";
                    $comandoController = new ComandoController();
                    $saida = "Resposta: " . $comandoController->gerenciaComandoLaboratorio($_GET['comando'], $_GET['comando_laboratorio']);
                    if (strlen($saida) > 100) {
                        $saida = substr($saida, 0, 99);
                    }
                    echo '<p>' . $saida . '</p>';
                    echo '</div>';
                    $strGet = "";
                    if (isset($_GET['laboratorio'])) {
                        $strGet = "&laboratorio=" . $_GET['laboratorio'];
                    }
                    echo '<meta http-equiv="refresh" content=3;url="index.php?pagina=maquinas' . $strGet . '">';
                    
                    return;
                }
                if (isset($_GET['maquina'])) {
                    if (! isset($_GET['confirmado'])) {
                        self::formConfirmacao("maquina");
                        return;
                    }
                    echo ' <div class="confirmacao">';
                    $comandoController = new ComandoController();
                    $saida = "Nao respondeu";
                    $saida = "Resposta: " . $comandoController->gerenciaComando($_GET['comando'], $_GET['maquina']);
                    if (strlen($saida) > 100) {
                        $saida = substr($saida, 0, 99);
                    }
                    echo '<p>' . $saida . '</p>';
                    echo '</div>';
                    $strGet = "";
                    if (isset($_GET['laboratorio'])) {
                        $strGet = "&laboratorio=" . $_GET['laboratorio'];
                    }
                    echo '<meta http-equiv="refresh" content=3;url="index.php?pagina=maquinas' . $strGet . '">';
                    
                    return;
                }
                if(isset($_GET['perfil']) && isset($_GET['laboratorio'])){
                    $controller = new ComandoController();
                    $resposta = $controller->definirPerfil($_GET['laboratorio'], $_GET['perfil']);
                    echo ' <div class="confirmacao">';
                    
                    echo '<p>Tentar Adicionar Perfil: '.$resposta.'</p>';
                    
                    echo '</div>';
                    
                    echo '<meta http-equiv="refresh" content=3;url="index.php?pagina=laboratorios">';
                    
                }
                break;
            case Sessao::NIVEL_ADMIN:
                if (isset($_GET['comando_laboratorio'])) {
                    if (! isset($_GET['confirmado'])) {
                        self::formConfirmacao("comando_laboratorio");
                        return;
                    }
                    echo ' <div class="confirmacao">';
                    $saida = "Nao respondeu";
                    $comandoController = new ComandoController();
                    $saida = $comandoController->gerenciaComandoLaboratorioAdmin($_GET['comando'], $_GET['comando_laboratorio']);
                    if (strlen($saida) > 100) {
                        $saida = substr($saida, 0, 99);
                    }
                    echo '<p>' . $saida . '</p>';
                    echo '</div>';
                    $strGet = "";
                    if (isset($_GET['laboratorio'])) {
                        $strGet = "&laboratorio=" . $_GET['laboratorio'];
                    }
                    echo '<meta http-equiv="refresh" content=3;url="index.php?pagina=maquinas' . $strGet . '">';
                    
                    return;
                }
                if (isset($_GET['maquina'])) {
                    if (! isset($_GET['confirmado'])) {
                        self::formConfirmacao("maquina");
                        return;
                    }
                    echo ' <div class="confirmacao">';
                    $saida = "Nao respondeu";
                    $comandoController = new ComandoController();
                    $saida = $comandoController->gerenciaComandoADM($_GET['comando'], $_GET['maquina']);
                    if (strlen($saida) > 100) {
                        $saida = substr($saida, 0, 99);
                    }
                    echo '<p>' . $saida . '</p>';
                    echo '</div>';
                    $strGet = "";
                    if (isset($_GET['laboratorio'])) {
                        $strGet = "&laboratorio=" . $_GET['laboratorio'];
                    }
                    echo '<meta http-equiv="refresh" content=3;url="index.php?pagina=maquinas' . $strGet . '">';
                }
                if(isset($_GET['perfil']) && isset($_GET['laboratorio'])){
                    $controller = new ComandoController();
                    $resposta = $controller->definirPerfil($_GET['laboratorio'], $_GET['perfil']);
                    echo ' <div class="confirmacao">';
                    
                    echo '<p>Tentar Adicionar Perfil: '.$resposta.'</p>';
                    
                    echo '</div>';
                    echo '<meta http-equiv="refresh" content=3;url="index.php?pagina=laboratorios">';
                }
                break;
                break;
            default:
                break;
        }
    }

    /**
     * Formulário que é uma tela de confirmação para envio do comando.
     * 
     * @param string $strTipoDeComando
     */
    public static function formConfirmacao($strTipoDeComando)
    {
        echo ' <div class="confirmacao"><form action="" method="get">
                                <label for="confirmado">Tem certeza que deseja executar este comando?</label>
                                <input type="hidden" name="comando" value="' . $_GET['comando'] . '" />
                                <input type="hidden" name="' . $strTipoDeComando . '" value="' . $_GET[$strTipoDeComando] . '" />';
        if (isset($_GET['laboratorio'])) {
            echo '<input type="hidden" name="laboratorio" value="' . $_GET['laboratorio'] . '" />';
        }
        if (isset($_GET['texto'])) {
            echo '<input type="hidden" name="texto" value="' . $_GET['texto'] . '" />';
        }
        
        echo '                      <input type="hidden" name="pagina" value="maquinas" /><br><br>

                                <input type="submit" class="botao b-primario" id="confirmado" name="confirmado" value="Confirmar" />';
        $strGet = "";
        if (isset($_GET['laboratorio'])) {
            $strGet = "&laboratorio=" . $_GET['laboratorio'];
        }
        echo '                   <a href="index.php?pagina=maquinas' . $strGet . '" class="botao b-erro" > Cancelar </a>
                            </form>
                            

                    </div>';
    }

    /**
     * Porta de conexão com UniCaffé.
     * 
     * @var integer
     */
    private $porta;

    /**
     * Host de conexão com UniCaffé.
     * 
     * @var string
     */
    private $host;

    /**
     * Constroi objeto ComandoController.
     */
    public function __construct()
    {
        $config = parse_ini_file(DAO::ARQUIVO_CONFIGURACAO);
        $this->porta = $config['unicaffe_porta'];
        $this->host = $config['unicaffe_host'];
    }

    public function definirPerfil($nomeLaboratorio, $idPerfil){
        $resposta = "Servidor não Respondeu.";
        $unicaffe = new UniCaffe($this->host, $this->porta);
        $resposta = $unicaffe->dialoga('setPerfil('.$idPerfil.','.$nomeLaboratorio.')');
        return $resposta;
        
    }
    /**
     * solicita ao servidor os processos bloqueados
     * @param String $nomeMaquina
     * @return string
     */
    public function meDeProcessosBloqueados($nomeMaquina){
        $unicaffe = new UniCaffe($this->host, $this->porta);
        $unicaffe->dialoga('meDeProcessosBloqueados(' . $nomeMaquina . ')');
        $unicaffe->close();
    }
    /**
     * Mostra os processos bloqueados
     * @param String $nomeMaquina
     * @return string
     */
    public function verProcessosBloqueados($nomeMaquina){
        $unicaffe = new UniCaffe($this->host, $this->porta);
        $resposta = $unicaffe->dialoga('verProcessosBloqueados(' . $nomeMaquina . ')');
        return $resposta;
        $unicaffe->close();
    }
    
    /**
     * Envia o comando para o servidor do UniCaffé.
     * 
     * @param integer $comando
     * @param string $nomeMaquina
     * @return string
     */
    public function gerenciaComando($comando, $nomeMaquina)
    {
        $resposta = "Servidor não Respondeu.";
        $unicaffe = new UniCaffe($this->host, $this->porta);
        
        switch ($comando) {
            case self::COMANDO_APAGAR:
                $resposta = $unicaffe->dialoga('limparDados(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_DESLIGAR:
                $resposta = $unicaffe->dialoga('desliga(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_AULA:
                $resposta = $unicaffe->dialoga('aula(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_VISITANTE:
                $resposta = $unicaffe->dialoga('visitante(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_SEM_INTERNET :
                $resposta = $unicaffe->dialoga ( 'semInternet(' . $nomeMaquina . ')' );
                break;
            case self::COMANDO_COM_INTERNET :
                $resposta = $unicaffe->dialoga ( 'comInternet(' . $nomeMaquina . ')' );
                break;
            case self::COMANDO_BLOQUEIA:
                $resposta = $unicaffe->dialoga('bloqueia(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_ALOCAR:
                if (isset($_GET['laboratorio'])) {
                    $resposta = $unicaffe->dialoga('alocarMaquina(' . $nomeMaquina . ',' . $_GET['laboratorio'] . ')');
                }
                break;
            case self::COMANDO_LIGAR:
                $resposta = $unicaffe->dialoga('ligador(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_ATUALIZAR:
                $resposta = $unicaffe->dialoga('atualiza(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_ATUALIZAR_MAC:
                $resposta = $unicaffe->dialoga('atualizaMac(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_DESATIVAR:
                $resposta = $unicaffe->dialoga('desativar(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_AVISO:
                $avisoPadrao = 'Bem vindo ao UniCaffe';
                if (isset($_GET['texto'])) {
                    $avisoPadrao = $_GET['texto'];
                    $avisoPadrao = str_replace("\n", " ", $avisoPadrao);
                    $avisoPadrao = str_replace("\r", " ", $avisoPadrao);
                }
                
                $resposta = $unicaffe->dialoga('aviso(' . $nomeMaquina . ',' . $avisoPadrao . ')');
                break;
            case self::COMANDO_LIBERA_PROCESSOS_BLOQUEADOS:
                $progsLiberados = 'libera Processos Bloqueados';
                if (isset($_GET['texto'])) {
                    $progsLiberados = $_GET['texto'];
                    $progsLiberados = str_replace("\n", ";", $progsLiberados);
                    $progsLiberados = str_replace("\r", ";", $progsLiberados);
                }
                
                $resposta = $unicaffe->dialoga('liberaProcessosBloqueados(' . $nomeMaquina . ',' . $progsLiberados . ')');
                break;
            case self::COMANDO_LIMPAR:
                $resposta = $unicaffe->dialoga('limparDados(' . $nomeMaquina . ')');
                break;
            default:
                $resposta = 'Comando desconhecido';
                break;
        }
        $unicaffe->close();
        return $resposta;
    }

    /**
     * Envia comandos para o servidor do UniCaffé.
     * Lista diferenciada para administradores.
     * 
     * @param integer $comando
     * @param string $nomeMaquina
     * @return void|string
     */
    public function gerenciaComandoADM($comando, $nomeMaquina)
    {
        $resposta = "Servidor nao Respondeu.";
        
        $maquina = new Maquina();
        $maquina->setNome($nomeMaquina);
        $maquinaDao = new MaquinaDAO();
        if (! $maquinaDao->procuraPorNome($maquina)) {
            echo "Maquina nao existe";
            return;
        }
        $usuarioDao = new UsuarioDAO($maquinaDao->getConexao());
        $usuario = new Usuario();
        $sessao = new Sessao();
        $usuario->setId($sessao->getIdUsuario());
        if (! $usuarioDao->ehAdministrador($usuario, $maquina->getLaboratorio())) {
            echo "Voce nao tem jurisdicao sobre este laboratorio";
            return;
        }
        $unicaffe = new UniCaffe($this->host, $this->porta);
        
        switch ($comando) {
            case self::COMANDO_APAGAR:
                $resposta = $unicaffe->dialoga('limparDados(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_DESLIGAR:
                $resposta = $unicaffe->dialoga('desliga(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_LIMPAR:
                $resposta = $unicaffe->dialoga('limparDados(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_AULA:
                $resposta = $unicaffe->dialoga('aula(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_VISITANTE:
                $resposta = $unicaffe->dialoga('visitante(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_SEM_INTERNET :
                $resposta = $unicaffe->dialoga ( 'semInternet(' . $nomeMaquina . ')' );
                break;
            case self::COMANDO_COM_INTERNET :
                $resposta = $unicaffe->dialoga ( 'comInternet(' . $nomeMaquina . ')' );
                break;
            case self::COMANDO_BLOQUEIA:
                $resposta = $unicaffe->dialoga('bloqueia(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_ALOCAR:
                if (isset($_GET['laboratorio'])) {
                    $resposta = $unicaffe->dialoga('alocarMaquina(' . $nomeMaquina . ',' . $_GET['laboratorio'] . ')');
                }
                break;
            case self::COMANDO_ATUALIZAR_MAC:
                $resposta = $unicaffe->dialoga('atualizaMac(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_ATUALIZAR:
                $resposta = $unicaffe->dialoga('atualiza(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_DESATIVAR:
                $resposta = $unicaffe->dialoga('desativar(' . $nomeMaquina . ')');
                break;
            case self::COMANDO_AVISO:
                $avisoPadrao = 'Bem vindo ao UniCaffe';
                if (isset($_GET['texto'])) {
                    $avisoPadrao = $_GET['texto'];
                    $avisoPadrao = str_replace("\n", " ", $avisoPadrao);
                    $avisoPadrao = str_replace("\r", " ", $avisoPadrao);
                }
                
                $resposta = $unicaffe->dialoga('aviso(' . $nomeMaquina . ',' . $avisoPadrao . ')');
                break;
            case self::COMANDO_LIBERA_PROCESSOS_BLOQUEADOS:
                $progsLiberados = 'libera Bloqueados';
                if (isset($_GET['texto'])) {
                    $progsLiberados = $_GET['texto'];
                    
                    $progsLiberados = str_replace("\n", ";", $progsLiberados);
                    $progsLiberados = str_replace("\r", ";", $progsLiberados);                    
                }
                
                $resposta = $unicaffe->dialoga('liberaProcessosBloqueados(' . $nomeMaquina . ',' . $progsLiberados . ')');
                break;
            
            default:
                $resposta = 'Comando desconhecido';
                break;
        }
        $unicaffe->close();
        return $resposta;
    }

    /**
     * Envia comando para todas as máquinas de um laboratório.
     * 
     * @param integer $comando
     * @param string $nomeLaboratorio
     * @return string
     */
    public function gerenciaComandoLaboratorio($comando, $nomeLaboratorio)
    {
        $resposta = "";
        $maquinaDao = new MaquinaDAO();
        $lista = $maquinaDao->listaCompleta();
        foreach ($lista as $maquina) {
            if (! (strtolower($maquina->getLaboratorio()->getNome()) == strtolower($nomeLaboratorio))) {
                continue;
            }
            
            $resposta .= $this->gerenciaComando($comando, $maquina->getNome());
        }
        return $resposta;
    }

    /**
     * Envia comando para todas as máquinas de um laboratório, usando a função de adminsitrador.
     * 
     * @param integer $comando
     * @param string $nomeLaboratorio
     * @return void|string
     */
    public function gerenciaComandoLaboratorioAdmin($comando, $nomeLaboratorio)
    {
        $resposta = "";
        $usuarioDao = new UsuarioDAO();
        $usuario = new Usuario();
        $sessao = new Sessao();
        $usuario->setId($sessao->getIdUsuario());
        
        $maquinaDao = new MaquinaDAO();
        $lista = $maquinaDao->listaCompleta();
        foreach ($lista as $maquina) {
            if (! (strtolower($maquina->getLaboratorio()->getNome()) == strtolower($nomeLaboratorio))) {
                continue;
            }
            if (! $usuarioDao->ehAdministrador($usuario, $maquina->getLaboratorio())) {
                $resposta = "Voce nao tem jurisdicao sobre este laboratorio";
                return;
            }
            
            $resposta .= $this->gerenciaComando($comando, $maquina->getNome());
            usleep(250000);
        }
        return $resposta;
    }
}
