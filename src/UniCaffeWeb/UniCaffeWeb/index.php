<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

function __autoload($classe) {
	if (file_exists ( 'classes/dao/' . $classe . '.php' )) {
		include_once 'classes/dao/' . $classe . '.php';
	}
	if (file_exists ( 'classes/model/' . $classe . '.php' )) {
		include_once 'classes/model/' . $classe . '.php';
	}
	if (file_exists ( 'classes/controller/' . $classe . '.php' )) {
		include_once 'classes/controller/' . $classe . '.php';
	}
	if (file_exists ( 'classes/util/' . $classe . '.php' )) {
		include_once 'classes/util/' . $classe . '.php';
	}
	if (file_exists ( 'classes/view/' . $classe . '.php' )) {
		include_once 'classes/view/' . $classe . '.php';
	}
}
$sessao = new Sessao ();
$laboratorioDao = new LaboratorioDAO ();
$listaDeLaboratorios = $laboratorioDao->retornaLaboratorios ();
if (isset ( $_GET ["sair"] )) {
	
	$sessao->mataSessao ();
	header ( "Location: index.php" );
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>UniCaffeWeb</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- meta tag para responsividade em Windows e Linux -->
<link rel="stylesheet" href="css_spa/spa.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/maquina.css" />
<link rel="stylesheet" href="css/new_maquina.css" />
<link rel="stylesheet" type="text/css" href="css/context.standalone.css" />
<link rel="stylesheet" type="text/css" media="all"
	href="<?php if ($_COOKIE['contraste']=='true') {echo '/css/contraste.css';}?>"
	id="css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/cookie.js"></script>
<script type="text/javascript" src="js/contraste.js"></script>
</head>
<body>
		<div id="barra-governo">
			<div class="resolucao config">
				<div class="a-esquerda">
					<a href="http://brasil.gov.br/" target="_blank"><span id="bandeira"></span><span>BRASIL</span></a>
					<a href="http://acessoainformacao.unilab.edu.br/" target="_blank">Acesso
						&agrave;  informa&ccedil;&atilde;o</a>
				</div>
				<div class="a-direita">
					<a href="#"><i class="icone-menu"></i></a>
				</div>
				<ul>
					<li><a href="http://brasil.gov.br/barra#participe" target="_blank">Participe</a></li>
					<li><a href="http://www.servicos.gov.br/" target="_blank">Servi&ccedil;os</a></li>
					<li><a href="http://www.planalto.gov.br/legislacao" target="_blank">Legisla&ccedil;&atilde;o</a></li>
					<li><a href="http://brasil.gov.br/barra#orgaos-atuacao-canais"
						target="_blank">Canais</a></li>
				</ul>
			</div>
		</div>

	<div class="pagina doze colunas">
		<div class="topo doze linha fundo-branco">
			<div class="conteudo">
				<div id="logo-unicaffe">
					<a href="#"> <img alt="logotipo da Unilab"
							src="img/logo_ufc.png" title="Ir para Unilab">
						</a>
					
				</div>
				<div id="logo-universidade">
					<a href="#"> <img alt="logotipo do Unicaffé"
						src="img/logo_labpati.png" title="Ir para Unicaffé">
					</a>
				</div>
			</div>
		</div>
		<div class="unicaffe-menu" id="menu">
		
		<?php 
		//Menu
		echo '<ol>';
		echo '<li><a href="?pagina=inicio">Inicio</a></li>';
		echo '		<li><a href="?pagina=laboratorios">Laboratórios</a>';
		echo '			<ul class="seta-pra-cima">';
		echo '<li><a href="?pagina=laboratorios" class="ativo">Visualização</a></li>';
		if ($sessao->getNivelAcesso () == Sessao::NIVEL_SUPER){
			echo '<li><a href="?pagina=laboratorios_cadastro">Cadastro</a></li>';
		}
		echo '</ul></li>';
		echo '
				<li><a href="?pagina=maquinas&laboratorio='.$listaDeLaboratorios[0]->getNome().'">Máquinas</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=maquinas&laboratorio='.$listaDeLaboratorios[0]->getNome().'" class="ativo">Listagem</a>
							<ul>';
		foreach($listaDeLaboratorios as $laboratorio){
			echo '<li><a href="?pagina=maquinas&laboratorio='.$laboratorio->getNome().'">'.$laboratorio->getNome().'</a></li>';
		}
		echo '						
							</ul>
							</li>
					</ul>
					</li>';
		echo '

				<li><a href="?pagina=relatorio_geral">Gerenciamento</a>';
		if($sessao->getNivelAcesso() == Sessao::NIVEL_ADMIN || $sessao->getNivelAcesso() == Sessao::NIVEL_SUPER){
			echo '<ul class="seta-pra-cima">';
			echo '<li><a href="?pagina=gerenciamento_relatorios">Acessos por Usuário</a></li>';
			echo '<li><a href="?pagina=gerenciamento_administrador">Cadastro de Administrador</a></li>';
			echo '<li><a href="?pagina=relatorios">Utilização Por Turno</a></li>';
			echo '</ul>';
			
		}
		
// 		
// 						<li><a href="?pagina=relatorio_geral">Relatorios </a>
// 							<ul>
// 								<li><a href="?pagina=relatorio_geral">Geral</a></li>
// 								';
// 								if ($sessao->getNivelAcesso () == Sessao::NIVEL_ADMIN || $sessao->getNivelAcesso () == Sessao::NIVEL_SUPER)
// 									
// 								echo '						</ul></li>
		

								
		echo '			</li>
					';
								

					if ($sessao->getNivelAcesso () == Sessao::NIVEL_DESLOGADO)
						echo '<li class="a-direita"><a href="?pagina=login" class="ativo">Login</a></li>';
					else
						echo '<li class="a-direita"><a href="?sair=daqui" class="ativo">Sair</a></li>';
			
			echo '</ol>';
			?>
		</div>


		<?php
		ComandoController::main ( $sessao->getNivelAcesso () );
		if (isset ( $_GET ['pagina'] )) {
			switch ($_GET ['pagina']) {
				
				case 'inicio' :
					HomeView::main ();
					break;
				case 'maquinas' :
					echo '<div class="linha doze colunas fundo-azul1" >
			                <div class="conteudo">
			                    <div class="linha doze">
			                        <h1 class="titulo texto-branco maiusculas a-esquerda seis grande">Visualização de acessos</h1>
			                        <div class="a-direita seis alinhado-a-direita">
			                            <form method="get" action="?pagina=maquinas" class="formulario doze">
			                                <label class="dez" style="display: inline;">
			                                    <span class="texto-branco negrito">Visualizar laborat&oacute;rio: </span>
			                                    <select name="laboratorio">';
					
					foreach($listaDeLaboratorios as $laboratorio){
							echo '
													<option value="'.$laboratorio->getNome().'">'.$laboratorio->getNome().'</option>';
					}
					
					echo '
													<option value="nao_listada">Sem Laboratorio</option>
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
							<script type="text/javascript" src="js/context.js"></script>
							<script type="text/javascript" src="js/unicaffe_context_menu.js" charset="UTF-8"></script>';
					
					echo '<script type="text/javascript">
							        var subMenu =  [';
					foreach ( $listaDeLaboratorios as $lab ) {
						echo '{text: \'' . $lab->getNome () . '\', action: function(e){
								    	     						outroSeleciona(5,that.id,"' . $lab->getNome () . '");
								    	     					}},';
					}
					
					echo '];
							        function enviaComando(comando, valor){';
					if (isset ( $_GET ['laboratorio'] ))
						echo 'location.href=\'?pagina=maquinas&comando=\'+comando+\'&maquina=\'+valor+\'&laboratorio=\'+\'' . $_GET ['laboratorio'] . '\';';
					else
						echo 'location.href=\'?pagina=maquinas&comando=\'+comando+\'&maquina=\'+valor;';
					
					echo '} </script>';
					if (isset ( $_GET ['laboratorio'] ))
						echo '<script>
							var auto_refresh = setInterval (function () {
							$.ajax({
							url: \'maquinas.php?laboratorio=' . $_GET ['laboratorio'] . '\',
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
					MaquinaController::main ( $sessao->getNivelAcesso () );
					echo ' </div>';
					
					break;
				case 'maquina' :
					echo '<br><br><div id="olinda" class="doze colunas fundo-branco">';
					MaquinaController::mainDetalhe ( $sessao->getNivelAcesso () );
					echo ' </div>';
					break;
				case 'laboratorios' :
					echo '<br><div class="doze colunas fundo-branco">';
					LaboratorioController::main ( $sessao->getNivelAcesso () );
					echo ' </div>';
					break;
				case 'laboratorios_cadastro' :
					echo '<br>';
					echo '<div class="doze colunas fundo-branco">';
					LaboratorioController::mainCadastro ( $sessao->getNivelAcesso () );
					echo ' </div>';
					break;
				case 'login' :
					UsuarioController::main ( $sessao->getNivelAcesso () );
					break;
				case 'gerenciamento_relatorios' :
					echo '<br>';
					echo '<div class="doze colunas fundo-branco">';
					MaquinaController::mainHistorico ( $sessao->getNivelAcesso () );
					echo ' </div>';
					break;
				case 'gerenciamento_administrador' :
					echo '<br>';
					echo '<div class="doze colunas fundo-branco">';
					UsuarioController::gerenciaAdmin ( $sessao->getNivelAcesso () );
					echo ' </div>';
					break;
				case 'relatorio_geral' :
					echo '<br>';
					echo '<div class="doze colunas fundo-branco">';
					LaboratorioController::mainRelatorioGeral ();
					echo ' </div>';
					break;
				case 'relatorios' :
					echo '<br>';
					echo '<div class="doze colunas fundo-branco">';
					RelatorioController::main ();
					echo ' </div>';
					break;
				default :
					echo '<br>';
					echo '<div id="olinda" class="doze colunas fundo-branco">';
					echo '<h1>404 Not Found</h1>';
					echo ' </div>';
					break;
			}
		} else {
			HomeView::main ();
		}
		
		?>
		
		
		
		
	</div>

	<div class="linha doze colunas fundo-marrom" id="rodape">
		<div class="conteudo">
			<p class="medio centralizado conteudo texto-branco">Desenvolvido pelo
				Laboratório de Projetos de Automação e Tecnologias Inovadoras (LABPATI) © 2015 - DTI / Unilab</p>
		</div>
	</div>

</body>
</html>
