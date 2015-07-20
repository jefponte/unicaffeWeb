<?php



$sessao = new Sessao ();
ini_set ( "display_errors", 1 );
include_once "incluir_paginas/cabecalho.php";
include_once "incluir_paginas/topo.php";
// include_once "incluir_paginas/menu.php";
function __autoload($classe) {
	if (file_exists ( 'dao/' . $classe . '.php' ))
		include_once 'dao/' . $classe . '.php';
	if (file_exists ( 'modelo/' . $classe . '.php' ))
		include_once 'modelo/' . $classe . '.php';
	if (file_exists ( 'controle/' . $classe . '.php' ))
		include_once 'controle/' . $classe . '.php';
	if (file_exists ( 'util/' . $classe . '.php' ))
		include_once 'util/' . $classe . '.php';
}





?>

<!DOCTYPE html>
<html>
<head>
<title>UniCafe</title>
<meta charset="UTF-8">
<link rel="stylesheet"
	href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
<link rel="shortcut icon" href="img/unicafe-logo-pp-b.png" />
<script type="text/javascript"
	src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<!-- arquivos JavaScript -->

<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script src="../js/jquery.maskedinput.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/valida_campos.js"></script>
<script src="../js/funcoes.js"></script>



<style rel="stylesheet" type="text/css">
#modal {
	background-color: rgba(0, 0, 0, 0.6);
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	display: block;
}

.box-modal {
	background: #FFF;
	position: absolute;
	top: 50%;
	left: 50%;
	width: 40%;
	margin-left: -20%;
	margin-top: -300px;
}

.box-modal-load {
	float: float;
	margin: 10px 10px;
	width: 1%;
}

.fechar {
	color: #CCC;
	cursor: pointer;
	border: 1px solid #CCC;
	border-radius: 7px;
	padding: 5px 10px;
	position: absolute;
	top: 2px;
	right: 2px;
}

.resolucao {
	width: 980px;
	margin: 0 auto;
}
</style>



</head>


<body class="fundo-cinza1">
	<div class="doze colunas">
		<div id="barra-governo">
			<div class="resolucao">
				<div class="a-esquerda">
					<a href="http://brasil.gov.br/" target="_blank"><span id="bandeira"></span><span>BRASIL</span></a>
					<a href="http://acessoainformacao.unilab.edu.br/" target="_blank">Acesso
						à informação</a>
				</div>
				<ul>
					<li><a href="http://brasil.gov.br/barra#participe" target="_blank">Participe</a></li>
					<li><a href="http://www.servicos.gov.br/" target="_blank">Serviços</a></li>
					<li><a href="http://www.planalto.gov.br/legislacao" target="_blank">Legislação</a></li>
					<li><a href="http://brasil.gov.br/barra#orgaos-atuacao-canais"
						target="_blank">Canais</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="pagina">
		<!-- Opcional -->
		
		
<?php

if (isset ( $_GET ["sair"] )) {
	
	$sessao->mataSessao ();
	header ( "Location: index.php" );
} 

else if ($sessao->getNivelAcesso () != Sessao::NIVEL_SUPER) {
	include './visao/login.php';
	return;
} 
else
{
	include_once "incluir_paginas/menu.php";

	
	?>
	<div class="resolucao">
			<div class="conteudo fundo-branco">

				<h1>Seja bem-vindo(a),</h1>
				<br />
				<p>Esse é um sistema de gerenciamneto de laborat&oacute;rio do UniCafe: </p>
				<br />
				<p></p>
				<br />

				<?php 
				
				if(isset($_GET['comando'])){
					if($_GET['comando'] == '1'){
						$comandos[] = "desliga(BIBPALMARES12)";
						$comandos[] = "desliga(BIBPALMARES15)";
						$comandos[] = "desliga(BIBPALMARES16)";
						$comandos[] = "desliga(BIBPALMARES17)";
						$comandos[] = "desliga(BIBPALMARES18)";
						
						foreach ($comandos as $comando){
							$unicafe = new UniCafe();
							echo $unicafe->dialoga($comando).'<br>';
								
						}
						
					}elseif ($_GET['comando'] == '2'){
						$comandos[] = "desliga(BIBLIBERDADE09)";
						$comandos[] = "desliga(BIBLIBERDADE10)";
						$comandos[] = "desliga(BIBLIBERDADE11)";
						$comandos[] = "desliga(BIBLIBERDADE12)";
						$comandos[] = "desliga(BIBLIBERDADE13)";
						$comandos[] = "desliga(BIBLIBERDADE14)";
						$comandos[] = "desliga(BIBLIBERDADE15)";
						$comandos[] = "desliga(BIBLIBERDADE16)";
						foreach ($comandos as $comando){
							$unicafe = new UniCafe();
							echo $unicafe->dialoga($comando).'<br>';
							
						}
												
					}
				}
				
				?>
				<ol>
					<li> <a href="desligar.php?comando=1">Desligar Pcs da Biblioteca de Palmares</a></li>
					<li> <a href="desligar.php?comando=2">Desligar Pcs da Biblioteca de Liberdade</a></li>
				</ol>
				<br /> <br />
			</div>
		</div>
		<meta http-equiv="refresh" content="5;url=index.php">
</div>

<?php 
}
?>     