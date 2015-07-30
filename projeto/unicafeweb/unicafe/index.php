<?php 


$sessao = new Sessao ();
ini_set ( "display_errors", 1 );
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
MaquinaController::main(MaquinaController::TELA_SUPER);



?>


</div>
</body>
</html>