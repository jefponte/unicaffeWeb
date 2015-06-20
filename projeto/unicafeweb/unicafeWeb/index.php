<?php

session_start();
include 'classes/autoload.php';


?>

<!-- pagina destina a crição do cabeçalho da pagina -->
<html>
<head>
<title>UniCafé</title>
<meta charset="UTF-8">
<link rel="stylesheet"
	href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
<link rel="stylesheet" href="css/unicafe.css" />

<link rel="shortcut icon" href="img/unicafe-logo-pp-b.png" />
<!-- arquivos JavaScript -->

<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script src="js/jquery.maskedinput.js"></script>
<script src="js/ajax.js"></script>
<script src="js/valida_campos.js"></script>
<script src="js/funcoes.js"></script>




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
	<div class="doze colunas barra-menu">
		<div class="menu-horizontal">
			<ol class="a-esquerda">
				<li><a href="#" class="item-ativo"><span class="icone-home3"></span>
						<span class="item-texto">Item ativo</span></a></li>
				<li><a href="#" class="item"><span class="icone-link"></span> <span
						class="item-texto">Item padrao</span></a></li>
				<li><a href="#" class="item"><span class="icone-enlarge2"></span> <span
						class="item-texto">Item com subitens</span><span
						class="icone-expande"></span></a></li>
			</ol>

		</div>


	</div>


	<div class="doze coluna fundo-branco com-bordas">
		<div class="conteudo alinhado-a-esquerda">

		
			
		
			<?php 
			
			if(isset($_GET['pagina'])){
				switch ($_GET['pagina'])
				{
					case "home":
						echo '<div class="titulo-com-borda">UniCafe</div>
			<p>Pagina Inicial</p>';
						break;
					case "maquina":
						echo '<div class="titulo-com-borda">Maquina</div>
			<p>Pagina Maquina</p>';
						break;
					default:
						echo '<div class="titulo-com-borda">UniCafe</div>
			<p>Pagina Inicial</p>';
							break;
				}
				
			}else{
				echo '<div class="titulo-com-borda">UniCafe</div><p>Pagina Inicial</p>';
			}
			
			$dao = new DAO(null, DAO::TIPO_PG_TESTE);
			$stmt = $dao->getConexao()->query("SELECT * FROM acesso");
			foreach ($stmt as $elemento)
			{
				echo $elemento['id_acesso'].' -  '.$elemento['hora_inicial'].' - '.$elemento['tempo_usado'].'<br>';
			}
			
			
			
			?>
						
			

		</div>
	</div>



	<div class="doze colunas medio centralizado">
		<div class="conteudo">&copy; 2015 Desenvolvido pela Divisão de
			Suporte (DISUP) - DTI/UNILAB.</div>
	</div>
</body>
</html>