<?php

$sessao = new Sessao ();
ini_set ( "display_errors", 1 );
function __autoload($classe) {
	if (file_exists ( 'classes/dao/' . $classe . '.php' ))
		include_once 'classes/dao/' . $classe . '.php';
	if (file_exists ( 'classes/modelo/' . $classe . '.php' ))
		include_once 'classes/modelo/' . $classe . '.php';
	if (file_exists ( 'classes/controle/' . $classe . '.php' ))
		include_once 'classes/controle/' . $classe . '.php';
	if (file_exists ( 'classes/util/' . $classe . '.php' ))
		include_once 'classes/util/' . $classe . '.php';
	if (file_exists ( 'classes/visao/' . $classe . '.php' ))
		include_once 'classes/visao/' . $classe . '.php';
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
       <link rel="shortcut icon" href="img/unicafe-logo-pp-b.png"  />
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

        <!-- arquivos JavaScript -->
        <script src="http://code.jquery.com/jquery-1.5.js"></script>
        <script src="incluir_paginas/js/valida_campos.js"></script>
		<!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        
        
</head>

  <body class="fundo-cinza1">
	<div class="doze colunas">
	<div id="barra-governo">
       <div class="resolucao">
          <div class="a-esquerda">
             <a href="http://brasil.gov.br/" target="_blank"><span id="bandeira"></span><span>BRASIL</span></a>
             <a href="http://acessoainformacao.unilab.edu.br/" target="_blank">Acesso √† informa√ß√£o</a>
          </div>
          <ul>
             <li><a href="http://brasil.gov.br/barra#participe" target="_blank">Participe</a></li>
             <li><a href="http://www.servicos.gov.br/" target="_blank">Servi√ßos</a></li>
             <li><a href="http://www.planalto.gov.br/legislacao" target="_blank">Legisla√ß√£o</a></li>
             <li><a href="http://brasil.gov.br/barra#orgaos-atuacao-canais" target="_blank">Canais</a></li>
          </ul>
       </div>
    </div>
</div>
<div class="pagina"> 

<!-- Conteudo -->
<?php 

switch ($sessao->getNivelAcesso()){
	case Sessao::NIVEL_SUPER:
		MenuController::main();
		break;
	case Sessao::NIVEL_USUARIO_ESPECIAL:
		//NinguÈm na biblioteca tem senha do SIG. 
		//Essa È uma proposta emergencial para que eles possam ao menos desligar suas m·quinas. 
		$menuController = new MenuController();
		$menuController->menuEspecial();
		break;
	default:
		//Formul·rio de login. 
		UsuarioController::main();
		break;
}


?>


</div>
</body>
</html>
