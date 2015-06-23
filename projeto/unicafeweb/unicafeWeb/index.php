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
			<li><a href='#'>1-Op&ccedil;&ouml;es administrativas<!--[if IE 7]><!--></a><!--<![endif]-->
		        <!--[if lte IE 6]><table><tr><td><![endif]-->
		        	<ul>
			            
			            <li><a href='index.php?cadastroLab' title=>Cadastrar Laboratorio</a></li>
			            <li><a href='index.php?cadastroLabMaquina' >cadastroLabMaquina</a></li>
			            
		            </ul>
                           
		                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
		        </li>
                        <li><a href='#'>2-Relat&oacute;rios<!--[if IE 7]><!--></a><!--<![endif]-->
		        <!--[if lte IE 6]><table><tr><td><![endif]-->
		        	<ul>
			            
			            <li><a href='index.php?listarmaq' title=>Listar m&aacute;quinas </a></li>
			            <li><a href='index.php?listarlab' >Listar Laborat&oacute;rios</a></li>
			           
		            </ul>
                           
		                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
		        </li>

		</div>


	</div>


	<div class="doze coluna fundo-branco com-bordas">
		<div class="conteudo alinhado-a-esquerda">

		
			
		
			<?php 
			if(isset($_GET["cadastroLab"]))
				LaboratorioControl::main(LaboratorioControl::$TELA_CADASTRO=1);
			else if  (isset($_GET["cadastroLabMaquina"])){
				LaboratorioControl::main(LaboratorioControl::$TELA_CADASTRO=2);
			}
			else if(isset($_GET["listarmaq"])){
				LaboratorioControl::main(LaboratorioControl::$TELA_CADASTRO=3);
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