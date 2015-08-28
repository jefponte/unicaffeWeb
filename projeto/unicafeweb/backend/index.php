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
<title>UniCaffeWeb</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- meta tag para responsividade em Windows e Linux -->
<link rel="stylesheet"
	href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/maquina.css" />
<link rel="stylesheet" href="css/new_maquina.css" />
<link rel="stylesheet" type="text/css" href="css/context.standalone.css" />

</head>
<body>
	<div class="pagina doze colunas">
		<div class="topo doze linha fundo-branco">
			<div class="conteudo">
				<div id="logo-unicaffe">
					<a href="#"> <img alt="logotipo do Unicaff�"
						src="img/logo_unicaffe.png" title="Ir para Unicaff�">
					</a>
				</div>
				<div id="logo-universidade">
					<a href="#"> <img alt="logotipo da Unilab"
						src="img/logo_unilab.png" title="Ir para Unilab">
					</a>
				</div>
			</div>
		</div>
		<div class="unicaffe-menu">
			<ol>
				<li><a href="?pagina=inicio">Inicio</a></li>
				<li><a href="?pagina=laboratorios">Laboratório</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=laboratorios" class="ativo">Visualização</a></li>
						<li><a href="?pagina=laboratorios_cadastro">Cadastro</a></li>
					</ul></li>
				<li><a href="?pagina=maquinas">Máquinas</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=maquinas" class="ativo">Listagem</a>
							<ul>
								<li><a href="?pagina=maquinas&laboratorio=BIBLIBERDADE">BIBLIBERDADE</a></li>
								<li><a href="?pagina=maquinas&laboratorio=BIBPALMARES">BIBPALMARES</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI01">LABTI01</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI02">LABTI02</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI03">LABTI03</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI04">LABTI04</a></li>
							</ul></li>
					</ul></li>

				<li><a href="?pagina=gerenciamento_relatorios">Gerenciamento</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=gerenciamento_relatorios">Relatorios </a></li>
						<li><a href="?pagina=gerenciamento_administrador">Administrador</a></li>

					</ul></li>
					<?php 
                    	if($sessao->getNivelAcesso() == Sessao::NIVEL_DESLOGADO)
                    		echo '<li class="a-direita"><a href="?pagina=login" class="ativo">Login</a></li>';
                    	else 
                    		echo '<li class="a-direita"><a href="?sair=daqui" class="ativo">Sair</a></li>';                  
                    ?>
			</ol>
		</div>



		
		
		<?php 
		ComandoController::main($sessao->getNivelAcesso());
		if(isset($_GET['pagina'])){
			switch ($_GET['pagina']){
				
				case 'inicio':
					HomeView::main();
					break;
				case 'maquinas':
					echo '<div class="linha doze colunas fundo-azul1" >
			                <div class="conteudo">
			                    <div class="linha doze">
			                        <h1 class="titulo texto-branco maiusculas a-esquerda seis grande">Visualização de acessos</h1>
			                        <div class="a-direita seis alinhado-a-direita">
			                            <form method="get" action="?pagina=maquinas" class="formulario doze">
			                                <label class="dez" style="display: inline;">
			                                    <span class="texto-branco negrito">Visualizar laborat&oacute;rio: </span>
			                                    <select name="laboratorio">
			                                    <option value="BIBLIBERDADE">BIBLIBERDADE</option><option value="BIBPALMARES">BIBPALMARES</option><option value="LABTI01">LABTI01</option><option value="LABTI02">LABTI02</option><option value="LABTI03">LABTI03</option><option value="LABTI04">LABTI04</option> <option value="nao_listada">Sem Laboratorio</option>                                        
			                                    </select>
			                                    <input type="hidden" name="pagina" value="maquinas">
			                                </label>
			                                <button class="botao b-aviso duas" type="submit">Alterar</button>
			                            </form>
			                        </div>
			                    </div>
			                </div>
			            </div>';
					echo '	<!-- 	Menu Click Esquerdo - Aparece na pagina de maquinas e laboratorios.  -->
							<script type="text/javascript" src="js/jquery.min.js"></script>
							<script type="text/javascript" src="js/context.js"></script>
							<script type="text/javascript" src="js/unicaffe_context_menu.js" charset="UTF-8"></script>';
					
					echo '<script type="text/javascript">
							        var subMenu =  [';
													foreach ($listaDeLaboratorios as $lab){
														echo '{text: \''.$lab->getNome().'\', action: function(e){
								    	     						outroSeleciona(5,that.id,"'.$lab->getNome().'");
								    	     					}},';
													
													}
					
							    	     echo '];
							        function enviaComando(comando, valor){';
									if(isset($_GET['laboratorio']))
										echo 'location.href=\'?pagina=maquinas&comando=\'+comando+\'&maquina=\'+valor+\'&laboratorio=\'+\''.$_GET['laboratorio'].'\';';
									else
										echo 'location.href=\'?pagina=maquinas&comando=\'+comando+\'&maquina=\'+valor;';
												
									echo '} </script>';
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
				case 'maquina':
           				echo '<br><br><div id="olinda" class="doze colunas fundo-branco">';
           				MaquinaController::mainDetalhe($sessao->getNivelAcesso());
           				echo ' </div>';
           				break;
           		case 'laboratorios':
           			echo '<br><div class="doze colunas fundo-branco">';
           			LaboratorioController::main($sessao->getNivelAcesso());
           			echo ' </div>';
           			break;
           		case 'laboratorios_cadastro':
           			echo '<div class="doze colunas fundo-branco">';
           			LaboratorioController::mainCadastro($sessao->getNivelAcesso());
           			echo ' </div>';
           			break;
				case 'login':
					UsuarioController::main($sessao->getNivelAcesso());
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
		}else{
			HomeView::main();
		}
			
		
		?>
		
		
		
		
	</div>

	<div class="linha doze colunas fundo-marrom">
		<div class="conteudo">
			<p class="medio centralizado conteudo texto-branco">Desenvolvido pela Divisão de Suporte (DISUP) © 2015 - DTI / Unilab</p>
		</div>
	</div>

</body>
</html>