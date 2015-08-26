
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Unicaff� Web</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- meta tag para responsividade em Windows e Linux -->
<link rel="stylesheet"
	href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/maquina.css" />
<link rel="stylesheet" href="css/new_maquina.css" />
<link rel="stylesheet" type="text/css" href="css/context.standalone.css" />
<script type="text/javascript">
        var subMenu =  [
    	      			{text: 'BIBLIBERDADE', action: function(e){
    	     						outroSeleciona(5,that.id,"BIBLIBERDADE");
    	     					}},{text: 'BIBPALMARES', action: function(e){
    	     						outroSeleciona(5,that.id,"BIBPALMARES");
    	     					}},{text: 'LABTI01', action: function(e){
    	     						outroSeleciona(5,that.id,"LABTI01");
    	     					}},{text: 'LABTI02', action: function(e){
    	     						outroSeleciona(5,that.id,"LABTI02");
    	     					}},{text: 'LABTI03', action: function(e){
    	     						outroSeleciona(5,that.id,"LABTI03");
    	     					}},{text: 'LABTI04', action: function(e){
    	     						outroSeleciona(5,that.id,"LABTI04");
    	     					}},    	     			
    	     			
    	     		];
        function enviaComando(comando, valor){

        	
        	location.href='?pagina=maquinas&comando='+comando+'&maquina='+valor;        }
        
       

        </script>
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
						<li><a href="?pagina=maquinas&comando=10&maquina=LABTI08">Teste Oi
								Ligador</a></li>
					</ul></li>
				<li class="a-direita"><a href="?sair=daqui" class="ativo">Sair</a></li>
			</ol>
		</div>




		<div class="linha doze colunas fundo-azul linha-inicio">
			<div class="conteudo">
				<div class="seis a-esquerda">
					<p class="conteudo centralizado">
						<img alt="logotipo Unicaffé" src="img/unicaffe_logo.png" class="imagem-responsiva" />	
					</p>
				</div>	
				<div class="seis a-direita">
					<p class="justificado texto-branco maximo conteudo">Sistema que integra alguns softwares e serve para controle de utilização de PCs em laboratórios de informática no contexto de uma universidade. Além de possibilitar uma maior transparência e isonomia na forma como os acessos são controlados; oferece aos usuários maior aproveitamento possível das máquinas, por exigir rotatividade apenas quando houver lotação; e mantém um registro de todos os acessos de cada usuário, possibilitando auditorias ou relatórios para a sociedade.</p>
				</div>
			</div>
		</div>
		
		<div class="linha doze colunas fundo-marrom linha-inicio">
			<div class="conteudo">
				<div class="seis a-esquerda">
					<p class="justificado texto-branco maximo conteudo">O acesso aos laboratórios poderá ser feito através do sistema SIGAA. Docente, discente, técnicos administrativos e demais colaboradores da universidade, devidamente cadastrados no sistema SIGAA poderão acessar utilizando seu login e senha. Em cada período, o Unicaffé disponibilizará 01 (uma) hora de acesso para cada usuário, podendo ser estendido automaticamente se o laboratório não estiver operando em sua capacidade máxima.</p>
				</div>	
				<div class="seis a-direita">
					<p class="conteudo centralizado">
						<img alt="logotipo Unicaffé" src="img/unicaffe_logo.png" class="imagem-responsiva" />	
					</p>
				</div>
			</div>
		</div>
		
		<div class="linha doze colunas fundo-azul linha-inicio">
			<div class="conteudo">
				<div class="seis a-esquerda">
					<h2 class="conteudo meio">
						<a class="botao b-sucesso" href="#link-para-download">Baixar Unicaffé</a>
					</h2>
				</div>	
				<div class="seis a-direita">
					<p class="justificado texto-branco maximo conteudo">Sistema que integra alguns softwares e serve para controle de utilização de PCs em laboratórios de informática no contexto de uma universidade. Além de possibilitar uma maior transparência e isonomia na forma como os acessos são controlados; oferece aos usuários maior aproveitamento possível das máquinas, por exigir rotatividade apenas quando houver lotação; e mantém um registro de todos os acessos de cada usuário, possibilitando auditorias ou relatórios para a sociedade.</p>
				</div>
			</div>
		</div>
		
		
		
		
	</div>

	<div class="linha doze colunas fundo-marrom">
		<div class="conteudo">
			<p class="medio centralizado conteudo texto-branco">Desenvolvido pela Divisão de Suporte (DISUP) © 2015 - DTI / Unilab</p>
		</div>
	</div>
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/context.js"></script>
	<script type="text/javascript" src="js/unicaffe_context_menu.js"
		charset="UTF-8"></script>
</body>
</html>