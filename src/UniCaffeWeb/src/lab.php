
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


		<br/>
		<div class="doze colunas fundo-branco centralizado">
			<a href="?pagina=maquinas&laboratorio=LABTI04">
				<div class="maquina maquina-verde">
					<h2 class="maquina-titulo">LABTI04</h2>
					<div class="maquina-icone">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 464.309 464.309"
							style="enable-background: new 0 0 464.309 464.309;"
							xml:space="preserve">
					<path class="fill-verde2"
								d="M453.955,71.625H268.662c-5.709,0-10.354,4.644-10.354,10.352v46.872H206V81.976c0-5.708-4.645-10.352-10.354-10.352H10.354
						C4.644,71.625,0,76.268,0,81.976v114.961c0,5.709,4.644,10.353,10.354,10.353h63.662v5.768h-8.428
						c-5.708,0-10.352,4.645-10.352,10.354c0,5.708,4.644,10.352,10.352,10.352h35.473v54.758c0,6.846,5.572,12.415,12.421,12.415h82.392
						v9.074h-11.639c-6.848,0-12.418,5.571-12.418,12.418c0,6.848,5.57,12.419,12.418,12.419h39.92v21.17h-22c-4.411,0-8,3.589-8,8v2.333
						H56.488c-4.411,0-8,3.589-8,8c0,4.411,3.589,8,8,8h137.666v2.333c0,4.411,3.589,8,8,8h60c4.411,0,8-3.589,8-8v-2.333H407.82
						c4.411,0,8-3.589,8-8c0-4.411-3.589-8-8-8H270.154v-2.333c0-4.411-3.589-8-8-8h-22v-21.17h39.92c6.847,0,12.417-5.571,12.417-12.419
						c0-6.847-5.57-12.418-12.417-12.418h-11.639v-9.074h82.393c6.849,0,12.42-5.569,12.42-12.415v-54.758h35.473
						c5.708,0,10.352-4.644,10.352-10.352c0-5.709-4.643-10.354-10.352-10.354h-8.428v-5.768h63.662c5.709,0,10.353-4.645,10.353-10.353
						V81.976C464.309,76.268,459.664,71.625,453.955,71.625z M101.061,141.267v37.963H20.703v-86.9h164.592v36.519h-71.814
						C106.633,128.848,101.061,134.419,101.061,141.267z M232.154,293.819c-4.408,0-8-3.587-8-8s3.592-8,8-8s8,3.587,8,8
						S236.563,293.819,232.154,293.819z M338.409,266.683h-212.51V153.685h212.51V266.683z M443.605,179.23h-80.357v-37.963
						c0-6.848-5.571-12.419-12.42-12.419h-71.814V92.33h164.592V179.23z" />
				</svg>
					</div>
					<div class="maquina-info">
						<span class="maquina-usuario">Aberto</span>
						<span class="maquina-usuario pequeno">05 máquinas livres</span>
						<span class="maquina-usuario pequeno">05 máquinas ocupadas</span>
						<span class="maquina-usuario pequeno">05 máquinas desligadas</span>
					</div>
					<div class="linha">
						<hr />
					</div>

					<div class="comando doze centralizado minimo">
						<a href="#link" class="botao b-aviso"><span class="icone-lock"> </span>Bloquear</a>
						<a href="#link" class="botao b-sucesso"><span class="icone-books">
						</span>Aula</a> <a href="#link" class="botao b-erro"><span
							class="icone-switch"> </span>Desligar</a> <a href="#link"
							class="botao disabled"><span class="icone-switch"> </span>Ligar</a>
					</div>
					<div class="linha"></div>
				</div>
			</a>
			<a href="?pagina=maquinas&laboratorio=LABTI05">
				<div class="maquina maquina-verde">
					<h2 class="maquina-titulo">LABTI05</h2>
					<div class="maquina-icone">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 464.309 464.309"
							style="enable-background: new 0 0 464.309 464.309;"
							xml:space="preserve">
					<path class="fill-cinza3"
								d="M453.955,71.625H268.662c-5.709,0-10.354,4.644-10.354,10.352v46.872H206V81.976c0-5.708-4.645-10.352-10.354-10.352H10.354
						C4.644,71.625,0,76.268,0,81.976v114.961c0,5.709,4.644,10.353,10.354,10.353h63.662v5.768h-8.428
						c-5.708,0-10.352,4.645-10.352,10.354c0,5.708,4.644,10.352,10.352,10.352h35.473v54.758c0,6.846,5.572,12.415,12.421,12.415h82.392
						v9.074h-11.639c-6.848,0-12.418,5.571-12.418,12.418c0,6.848,5.57,12.419,12.418,12.419h39.92v21.17h-22c-4.411,0-8,3.589-8,8v2.333
						H56.488c-4.411,0-8,3.589-8,8c0,4.411,3.589,8,8,8h137.666v2.333c0,4.411,3.589,8,8,8h60c4.411,0,8-3.589,8-8v-2.333H407.82
						c4.411,0,8-3.589,8-8c0-4.411-3.589-8-8-8H270.154v-2.333c0-4.411-3.589-8-8-8h-22v-21.17h39.92c6.847,0,12.417-5.571,12.417-12.419
						c0-6.847-5.57-12.418-12.417-12.418h-11.639v-9.074h82.393c6.849,0,12.42-5.569,12.42-12.415v-54.758h35.473
						c5.708,0,10.352-4.644,10.352-10.352c0-5.709-4.643-10.354-10.352-10.354h-8.428v-5.768h63.662c5.709,0,10.353-4.645,10.353-10.353
						V81.976C464.309,76.268,459.664,71.625,453.955,71.625z M101.061,141.267v37.963H20.703v-86.9h164.592v36.519h-71.814
						C106.633,128.848,101.061,134.419,101.061,141.267z M232.154,293.819c-4.408,0-8-3.587-8-8s3.592-8,8-8s8,3.587,8,8
						S236.563,293.819,232.154,293.819z M338.409,266.683h-212.51V153.685h212.51V266.683z M443.605,179.23h-80.357v-37.963
						c0-6.848-5.571-12.419-12.42-12.419h-71.814V92.33h164.592V179.23z" />
				</svg>
					</div>
					<div class="maquina-info">
						<span class="maquina-usuario">Fechado</span>
						<span class="maquina-usuario pequeno">30 máquinas desligadas</span>
						<span class="maquina-usuario pequeno"></span>
						<span class="maquina-usuario pequeno"></span>
					</div>
					<div class="linha">
						<hr />
					</div>

					<div class="comando doze centralizado minimo">
						<a href="#link" class="botao b-aviso disabled"><span class="icone-lock"> </span>Bloquear</a>
						<a href="#link" class="botao b-sucesso disabled"><span class="icone-books">
						</span>Aula</a> <a href="#link" class="botao b-erro disabled"><span
							class="icone-switch"> </span>Desligar</a> <a href="#link"
							class="botao "><span class="icone-switch"> </span>Ligar</a>
					</div>
					<div class="linha"></div>
				</div>
			</a>
			<a href="?pagina=maquinas&laboratorio=LABTI06">
				<div class="maquina maquina-verde">
					<h2 class="maquina-titulo">LABTI06</h2>
					<div class="maquina-icone">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 464.309 464.309"
							style="enable-background: new 0 0 464.309 464.309;"
							xml:space="preserve">
					<path class="fill-laranja2"
								d="M453.955,71.625H268.662c-5.709,0-10.354,4.644-10.354,10.352v46.872H206V81.976c0-5.708-4.645-10.352-10.354-10.352H10.354
						C4.644,71.625,0,76.268,0,81.976v114.961c0,5.709,4.644,10.353,10.354,10.353h63.662v5.768h-8.428
						c-5.708,0-10.352,4.645-10.352,10.354c0,5.708,4.644,10.352,10.352,10.352h35.473v54.758c0,6.846,5.572,12.415,12.421,12.415h82.392
						v9.074h-11.639c-6.848,0-12.418,5.571-12.418,12.418c0,6.848,5.57,12.419,12.418,12.419h39.92v21.17h-22c-4.411,0-8,3.589-8,8v2.333
						H56.488c-4.411,0-8,3.589-8,8c0,4.411,3.589,8,8,8h137.666v2.333c0,4.411,3.589,8,8,8h60c4.411,0,8-3.589,8-8v-2.333H407.82
						c4.411,0,8-3.589,8-8c0-4.411-3.589-8-8-8H270.154v-2.333c0-4.411-3.589-8-8-8h-22v-21.17h39.92c6.847,0,12.417-5.571,12.417-12.419
						c0-6.847-5.57-12.418-12.417-12.418h-11.639v-9.074h82.393c6.849,0,12.42-5.569,12.42-12.415v-54.758h35.473
						c5.708,0,10.352-4.644,10.352-10.352c0-5.709-4.643-10.354-10.352-10.354h-8.428v-5.768h63.662c5.709,0,10.353-4.645,10.353-10.353
						V81.976C464.309,76.268,459.664,71.625,453.955,71.625z M101.061,141.267v37.963H20.703v-86.9h164.592v36.519h-71.814
						C106.633,128.848,101.061,134.419,101.061,141.267z M232.154,293.819c-4.408,0-8-3.587-8-8s3.592-8,8-8s8,3.587,8,8
						S236.563,293.819,232.154,293.819z M338.409,266.683h-212.51V153.685h212.51V266.683z M443.605,179.23h-80.357v-37.963
						c0-6.848-5.571-12.419-12.42-12.419h-71.814V92.33h164.592V179.23z" />
				</svg>
					</div>
					<div class="maquina-info">
						<span class="maquina-usuario">Ocupado</span>
						<span class="maquina-usuario pequeno">30 máquinas ocupadas</span>
						<span class="maquina-usuario pequeno">0 máquinas livres</span>
						<span class="maquina-usuario pequeno"></span>
					</div>
					<div class="linha">
						<hr />
					</div>

					<div class="comando doze centralizado minimo">
						<a href="#link" class="botao b-aviso "><span class="icone-lock"> </span>Bloquear</a>
						<a href="#link" class="botao b-sucesso "><span class="icone-books">
						</span>Aula</a> <a href="#link" class="botao b-erro "><span
							class="icone-switch"> </span>Desligar</a> <a href="#link"
							class="botao disabled"><span class="icone-switch"> </span>Ligar</a>
					</div>
					<div class="linha"></div>
				</div>
			</a>
		</div>
	</div>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/context.js"></script>
	<script type="text/javascript" src="js/unicaffe_context_menu.js"
		charset="UTF-8"></script>
</body>
</html>