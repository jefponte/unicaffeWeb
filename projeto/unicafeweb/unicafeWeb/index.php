<?php
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
<link rel="stylesheet"
	href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
<link rel="stylesheet" href="styles.css">
<link rel="shortcut icon" href="img/unicafe-logo-pp-b.png" />
<script type="text/javascript"
	src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<!-- arquivos JavaScript -->

<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script src="../js/jquery.maskedinput.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/valida_campos.js"></script>
<script src="../js/funcoes.js"></script>
</head>
<body class="fundo-cinza1">

<?php
$sessao = new Sessao ();
ini_set ( "display_errors", 1 );
include_once "incluir_paginas/topo.php";
// include_once "incluir_paginas/menu.php";

if ($sessao->getNivelAcesso () != Sessao::NIVEL_SUPER) {
	
	include './visao/login.php';
	return;
} else {
	include_once "incluir_paginas/menu.php";
}
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
	// print $_GET["maquina"];
	include './visao/comandos.php';
} else if (isset ( $_GET ["editar"] )) {
	include './visao/listagemLab.php';
} else if (isset ( $_GET ["editarmaq"] )) {
	include './visao/listagemMaquina.php';
} else if (isset ( $_GET ["editarmaqlab"] )) {
	include './visao/editarLabMaq.php';
} 

else if (isset ( $_GET ["vermaquina"] )) {
	include './visao/listagemLab.php';
} else {
	
	$homeView = new HomeView ();
	$homeView->conteudoPaginaInicial ();
}

?>
	
	
	
	</body>
</html>


