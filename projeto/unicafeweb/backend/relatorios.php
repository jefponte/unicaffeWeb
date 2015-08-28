
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Unicaffé Web</title>
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
					<a href="#"> <img alt="logotipo do Unicaffé"
						src="img/logo_unicaffe.png" title="Ir para Unicaffé">
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
				<li><a href="?pagina=inicio">Inicío</a></li>
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


		<br />
		<table class="tabela quadro doze">
			<caption>
				Exemplo do tipo quadro<br />Tabela Tiobe 2015.
			</caption>
			<thead>
				<tr>
					<th>#</th>
					<th>Linguagem</th>
					<th>Plataforma</th>
					<th>Percentual</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>C</td>
					<td>Desktop</td>
					<td>16.703%</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Java</td>
					<td>Desktop/Web</td>
					<td>15.528%</td>
				</tr>
				<tr>
					<td>6</td>
					<td>PHP</td>
					<td>Web</td>
					<td>3.784%</td>
				</tr>
				<tr>
					<td>7</td>
					<td>JavaScript</td>
					<td>Web</td>
					<td>3.274%</td>
				</tr>
			</tbody>
		</table>
		
		
		

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