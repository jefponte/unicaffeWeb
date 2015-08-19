<?php 

$sessao = new Sessao ();

function __autoload($classe) {
	if (file_exists ( 'classes/dao/' . $classe . '.php' ))
		include_once 'classes/dao/' . $classe . '.php';
	if (file_exists ( 'classes/model/' . $classe . '.php' ))
		include_once 'classes/model/' . $classe . '.php';
	if (file_exists ( 'classes/controller/' . $classe . '.php' ))
		include_once 'classes/controller/' . $classe . '.php';
	if (file_exists ( 'classes/util/' . $classe . '.php' ))
		include_once 'classes/util/' . $classe . '.php';
	if (file_exists ( 'classes/view/' . $classe . '.php' ))
		include_once 'classes/view/' . $classe . '.php';
	
	
}

$laboratorioDao = new LaboratorioDAO();
$listaDeLaboratorios = $laboratorioDao->retornaLaboratorios();
if (isset ( $_GET ["sair"] )) {

	$sessao->mataSessao ();
	header ( "Location: index.php" );
}
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>	
        <meta charset="UTF-8">
        <title>Unicaffé Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" /><!-- meta tag para responsividade em Windows e Linux -->  
        <link rel="stylesheet" href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/maquina.css" />
        <link rel="stylesheet" href="css/new_maquina.css" />
        <link rel="stylesheet" type="text/css" href="css/context.standalone.css"/>
        <script type="text/javascript">
        var subMenu =  [
    	      			<?php 
    	      			
    	     	 			foreach ($listaDeLaboratorios as $lab){
    	     	 				echo '{text: \''.$lab->getNome().'\', action: function(e){
    	     						outroSeleciona(5,that.id,"'.$lab->getNome().'");
    	     					}},';
    	     	 				
    	     	 			}	
    	      			
    	      			
    	      			?>
    	     			
    	     			
    	     		];
        function enviaComando(comando, valor){

        	
        	<?php 
        	if(isset($_GET['laboratorio']))
        		echo 'location.href=\'?pagina=maquinas&comando=\'+comando+\'&maquina=\'+valor+\'&laboratorio=\'+\''.$_GET['laboratorio'].'\';';
        	else
        		echo 'location.href=\'?pagina=maquinas&comando=\'+comando+\'&maquina=\'+valor;';
        	?>
        }
        
       

        </script>
    </head>
    <body>
        <div class="pagina doze colunas">
            <div class="topo doze linha fundo-branco">
                <div class="conteudo">
                    <div id="logo-unicaffe">
                        <a href="#">
                            <img alt="logotipo do Unicaffé" src="img/logo_unicaffe.png" title="Ir para Unicaffé">
                        </a>
                    </div>
                    <div id="logo-universidade">
                        <a href="#">
                            <img alt="logotipo da Unilab" src="img/logo_unilab.png" title="Ir para Unilab">
                        </a>
                    </div>
                </div>
            </div>
            <div class="unicaffe-menu">
                <ol>
                    <li><a href="?pagina=inicio">Inicío</a></li>
                    <li><a href="?pagina=laboratorios">Laboratório</a>
                        <ul class="seta-pra-cima">
                            <li><a href="?pagina=laboratorios" class="ativo">Visualização</a></li>
                            <?php 
                            if($sessao->getNivelAcesso() == Sessao::NIVEL_SUPER)
                            	echo '<li><a href="?pagina=laboratorios_cadastro">Cadastro</a></li>';
                            ?>
                            
                        </ul>
                    </li>
                    <li><a href="?pagina=maquinas">Máquinas</a>
                        <ul class="seta-pra-cima">
                            <li><a href="?pagina=maquinas" class="ativo">Listagem</a>
                            <ul>
                            <?php 
                            
                            foreach ($listaDeLaboratorios as $lab){
                            	
                            	echo '<li><a href="?pagina=maquinas&laboratorio='.$lab->getNome().'">'.$lab->getNome().'</a></li>';
                            }
                            	
                            
                            ?>
                            	
                            </ul>
                            
                            </li>
                        </ul>
                    </li>
                    
                    <li><a href="?pagina=gerenciamento_relatorios">Gerenciamento</a>
                        <ul class="seta-pra-cima">
                            <li><a href="?pagina=gerenciamento_relatorios">Relatorios </a></li>
                            <?php 
                            if($sessao->getNivelAcesso() == Sessao::NIVEL_SUPER)
                            	echo '<li><a href="?pagina=gerenciamento_administrador">Administrador</a></li>';
                            
                            ?>
                        </ul>
                    </li>
                    <?php 
                    	if($sessao->getNivelAcesso() == Sessao::NIVEL_DESLOGADO)
                    		echo '<li class="a-direita"><a href="?pagina=login" class="ativo">Login</a></li>';
                    	else 
                    		echo '<li class="a-direita"><a href="?sair=daqui" class="ativo">Sair</a></li>';                  
                    ?>
                    
                </ol>
            </div>



            
            <div class="linha doze colunas fundo-azul1" >
                <div class="conteudo">
                    <div class="linha doze">
                        <h1 class="titulo texto-branco maiusculas a-esquerda seis grande">Visualização de acessos</h1>
                        <div class="a-direita seis alinhado-a-direita">
                            <form method="get" action="?pagina=maquinas" class="formulario doze">
                                <label class="dez" style="display: inline;">
                                    <span class="texto-branco negrito">Visualizar laboratório: </span>
                                    <select name="laboratorio">
                                    <?php 
	                                    
	                                    foreach ($listaDeLaboratorios as $laboratorio){
	                                    	echo '<option value="'.$laboratorio->getNome().'">'.$laboratorio->getNome().'</option>';
	                                    }
	                                    echo ' <option value="nao_listada">Sem Laboratorio</option>';
                                    ?>
                                        
                                    </select>
                                    <input type="hidden" name="pagina" value="maquinas">
                                </label>
                                <button class="botao b-aviso duas" type="submit">Alterar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            
            ComandoController::main($sessao->getNivelAcesso());
           	if(isset($_GET['pagina'])){
           		switch ($_GET['pagina']){
           			case 'maquinas':
           				if(isset($_GET['laboratorio']))
           					echo '<script>
							var auto_refresh = setInterval (function () {
							$.ajax({
							url: \'maquinas.php?laboratorio='.$_GET['laboratorio'].'\',
							success: function (response) {
							$(\'#olinda\').html(response);
							}
							});
							}, 1000);
							</script>
							';
           				else
           					echo '<script>
							var auto_refresh = setInterval (function () {
							$.ajax({
							url: \'maquinas.php\',
							success: function (response) {
							$(\'#olinda\').html(response);
							}
							});
							}, 1000);
							</script>
							';
           				echo '<div id="olinda" class="doze colunas fundo-branco">';
           				MaquinaController::main($sessao->getNivelAcesso());
           				echo ' </div>';
           				 
           				break;
           			case 'detalhe':
           				echo '<div id="olinda" class="doze colunas fundo-branco">';
           				MaquinaController::mainDetalhe($sessao->getNivelAcesso());
           				echo ' </div>';
           				break;
           			case 'login':
           				UsuarioController::main($sessao->getNivelAcesso());
           				break;
           			case 'laboratorios':
           				echo '<div class="doze colunas fundo-branco">';
           				LaboratorioController::main($sessao->getNivelAcesso());
           				echo ' </div>';
           				break;
           			case 'laboratorios_cadastro':
           				echo '<div class="doze colunas fundo-branco">';
           				LaboratorioController::mainCadastro($sessao->getNivelAcesso());
           				echo ' </div>';
           				break;
           			case 'inicio':
           				echo '<div class="doze colunas fundo-branco">';
           				echo '<br><br><h1>Laboratorios</h1><br><br>';
           				LaboratorioController::main($sessao->getNivelAcesso());
           				echo ' </div>';
           				break;
           			case 'gerenciamento_relatorios':
           				echo '<div class="doze colunas fundo-branco">';
           				MaquinaController::mainHistorico($sessao->getNivelAcesso());
           				echo ' </div>';
           				break;
           			case 'gerenciamento_administrador':
           				echo '<div class="doze colunas fundo-branco">';
           				UsuarioController::gerenciaAdmin($sessao->getNivelAcesso());
           				echo ' </div>';
           				break;           			
           				
           			default:
           				echo '<div id="olinda" class="doze colunas fundo-branco">';
						echo '<h1>404 Not Found</h1>';
           				echo ' </div>';
           				break;
           			
           		}
           		
           		
           	}else {
           		echo '<div class="doze colunas fundo-branco">';
           		LaboratorioController::main($sessao->getNivelAcesso());
           		echo ' </div>';
           	}
           
	        ?>
        </div>
        
        
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/context.js"></script>
	<script type="text/javascript" src="js/unicaffe_context_menu.js" charset="UTF-8"></script>
    </body>
</html>