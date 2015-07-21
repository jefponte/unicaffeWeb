<?php

ini_set ( "display_errors", 1 );
function __autoload($classe) {
	if (file_exists ( 'class/dao/' . $classe . '.php' ))
		include_once 'class/dao/' . $classe . '.php';
	if (file_exists ( 'class/modelo/' . $classe . '.php' ))
		include_once 'class/modelo/' . $classe . '.php';
	if (file_exists ( 'class/controle/' . $classe . '.php' ))
		include_once 'class/controle/' . $classe . '.php';
	if (file_exists ( 'class/util/' . $classe . '.php' ))
		include_once 'class/util/' . $classe . '.php';
}

if (isset ( $_GET ["sair"] )) {
	$sessao->mataSessao ();
	header ( "Location: index.php" );
}
?>

<!DOCTYPE html>
<html>
<head>
<title>UniCafe</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
<link rel="stylesheet" href="styles.css">
<link rel="shortcut icon" href="img/unicafe-logo-pp-b.png" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<!-- arquivos JavaScript -->

<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script src="../js/jquery.maskedinput.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/valida_campos.js"></script>
<script src="../js/funcoes.js"></script>
</head>
<body class="fundo-cinza1">

<div class="doze colunas">
    <div id="barra-governo">
       <div class="resolucao">
          <div class="a-esquerda">
             <a href="http://brasil.gov.br/" target="_blank"><span id="bandeira"></span><span>BRASIL</span></a>
             <a href="http://acessoainformacao.unilab.edu.br/" target="_blank">Acesso à informação</a>
          </div>
          <ul>
             <li><a href="http://brasil.gov.br/barra#participe" target="_blank">Participe</a></li>
             <li><a href="http://www.servicos.gov.br/" target="_blank">Serviços</a></li>
             <li><a href="http://www.planalto.gov.br/legislacao" target="_blank">Legislação</a></li>
             <li><a href="http://brasil.gov.br/barra#orgaos-atuacao-canais" target="_blank">Canais</a></li>
          </ul>
       </div>
    </div>
</div>
<div class="pagina"> 

<?php
$sessao = new Sessao ();
$homeView = new HomeView ();

switch ($sessao->getNivelAcesso ())
{
	
	case Sessao::NIVEL_SUPER:
		MenuController::main();
		if (isset ( $_GET ["cadastroLab"] ))
			include './visao/cadastroLab.php';
		else if (isset ( $_GET ["listarlab"] )) {
			include './visao/listagemLab.php';
		} else if (isset ( $_GET ["cadastromaq"] )) {
			include './visao/cadastroLabMaq.php';
		} else if (isset ( $_GET ["listarmaq"] )) {
			include './visao/listagemMaquina.php';
		} else if (isset ( $_GET ["acessosmaq"] )) {
			include './visao/acessos.php';
		} else if (isset ( $_GET ["historico"] )) {
			include './visao/historicoMaq.php';
		} else if (isset ( $_GET ["comandos"] )) {
			include './visao/comandos.php';
		} else if (isset ( $_GET ["comando"] )) {
			print $_GET ["maquina"];
			include './visao/comandos.php';
		} else if (isset ( $_GET ["comando1"] )) {
			include './visao/comandos.php';
		} else if (isset ( $_GET ["editar"] )) {
			include './visao/listagemLab.php';
		} else if (isset ( $_GET ["editarmaq"] )) {
			include './visao/listagemMaquina.php';
		} else if (isset ( $_GET ["editarmaqlab"] )) {
			include './visao/editarLabMaq.php';
		} else if (isset ( $_GET ["vermaquina"] )) {
			include './visao/listagemLab.php';
		}
		else
		{
			$homeView->conteudoPaginaInicial ();
			$homeView->mostraRodape();
		}
		break;
	case Sessao::NIVEL_DESLOGADO:
		$usuarioController = new UsuarioController();
		$usuarioController->login();
		break;
	default:
		$usuarioController = new UsuarioController();
		$usuarioController->login();
		break;
		
}



?>
	
		
	</div>
	</body>
</html>


