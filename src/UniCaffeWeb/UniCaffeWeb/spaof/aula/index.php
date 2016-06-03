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
					<a href="?pagina=inicio"> <img alt="logotipo do Unicaff�"
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
						<?php 
						if($sessao->getNivelAcesso() == Sessao::NIVEL_SUPER)
							echo '<li><a href="?pagina=laboratorios_cadastro">Cadastro</a></li>';
						
						?>
						
					</ul></li>
				<li><a href="?pagina=maquinas&laboratorio=LABTI01">Máquinas</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=maquinas&laboratorio=LABTI01" class="ativo">Listagem</a>
							<ul>
								<li><a href="?pagina=maquinas&laboratorio=BIBLIBERDADE">BIBLIBERDADE</a></li>
								<li><a href="?pagina=maquinas&laboratorio=BIBPALMARES">BIBPALMARES</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI01">LABTI01</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI02">LABTI02</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI03">LABTI03</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI04">LABTI04</a></li>
							</ul></li>
					</ul></li>

				<li><a href="?pagina=relatorio_geral">Gerenciamento</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=relatorio_geral">Relatorios </a>
						<ul>
								<li><a href="?pagina=relatorio_geral">Geral</a></li>
								<?php 
									if($sessao->getNivelAcesso() == Sessao::NIVEL_ADMIN || $sessao->getNivelAcesso() == Sessao::NIVEL_SUPER)
										echo '<li><a href="?pagina=gerenciamento_relatorios">Acessos por Usuário</a>';
								?>
								
						</ul>
						</li>
						<?php 
									if($sessao->getNivelAcesso() == Sessao::NIVEL_SUPER)
										echo '<li><a href="?pagina=relatorio_geral">Administrador</a></li>';
						?>

					</ul></li>
					<?php 
                    	if($sessao->getNivelAcesso() == Sessao::NIVEL_DESLOGADO)
                    		echo '<li class="a-direita"><a href="?pagina=login" class="ativo">Login</a></li>';
                    	else 
                    		echo '<li class="a-direita"><a href="?sair=daqui" class="ativo">Sair</a></li>';                  
                    ?>
			</ol>
		</div>



		
		
		<h2>Arquivos da Aula:  </h2>
		<ul>

			<li><a href="Analise SWOT - Unilab.xlsx">Analise SWOT</a></li>
			<li><a href="Diagnostico Empresarial - Prof. Wilson. - Unilab..xlsx">Diagnostico Empresarial</a></li>
			<li><a href="Disponibilidade de Frota.xlsx">Disponibilidade De Frota</a></li>
			<li><a href="Indicadores de RH.xlsx">Indicadores de RH</a></li>
			<li><a href="Mini Curso.xlsx">Mini Curso</a></li>

		</ul>
		</ul>

	</div>

	<div class="linha doze colunas fundo-marrom">
		<div class="conteudo">
			<p class="medio centralizado conteudo texto-branco">Desenvolvido pela Divisão de Suporte (DISUP) © 2015 - DTI / Unilab</p>
		</div>
	</div>

</body>
</html>