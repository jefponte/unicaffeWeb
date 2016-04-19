
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




		<div class="linha doze colunas fundo-azul1">
			<div class="conteudo">
				<div class="linha doze">
					<h1 class="titulo texto-branco maiusculas a-esquerda seis grande">Visualização
						de acessos</h1>
					<div class="a-direita seis alinhado-a-direita">
						<form method="get" action="?pagina=maquinas"
							class="formulario doze">
							<label class="dez" style="display: inline;"> <span
								class="texto-branco negrito">Visualizar laboratório: </span> <select
								name="laboratorio">
									<option value="BIBLIBERDADE">BIBLIBERDADE</option>
									<option value="BIBPALMARES">BIBPALMARES</option>
									<option value="LABTI01">LABTI01</option>
									<option value="LABTI02">LABTI02</option>
									<option value="LABTI03">LABTI03</option>
									<option value="LABTI04">LABTI04</option>
									<option value="nao_listada">Sem Laboratorio</option>
							</select> <input type="hidden" name="pagina" value="maquinas">
							</label>
							<button class="botao b-aviso duas" type="submit">Alterar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="olinda" class="doze colunas fundo-branco">
			<div id="LabTI05" class="maquina detalhes maquina-online">
				<h2 class="maquina-titulo">Máquina: LabTI05</h2>
				<div class="maquina-icone">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
						xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 109.602 109.602"
						style="enable-background: new 0 0 109.602 109.602;"
						xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549"
							cy="28.919" rx="1.51" ry="0.752" />
		                    </g>
		                    <g>
		                        <path style="fill:#939393;"
							d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z" />
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652"
							style="fill:#939393;" width="71.577" height="46.525" />
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;"
							points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          " />
		                    </g>
		                </g>
		            </g>
		        </svg>
				</div>
				<div class="maquina-info">
					<span class="maquina-tempo maquina-tempo-total">01:55:53</span> <span
						class="maquina-tempo maquina-tempo-restante">00:00:00</span> <span
						class="maquina-tempo maquina-tempo-total">Endereco Mac</span> <span
						class="maquina-tempo maquina-tempo-restante">74-86-7A-FC-B8-4D</span>
					<span class="maquina-tempo maquina-tempo-total">Laboratorio</span>
					<span class="maquina-tempo maquina-tempo-restante">LABTI01</span> <span
						class="maquina-tempo maquina-tempo-total">IP:</span> <span
						class="maquina-tempo maquina-tempo-restante">/10.11.0.220</span>
				</div>
				<div class="linha">
					<hr />
				</div>
				<div class="maquina-icone">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
						xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 612 612" style="enable-background: new 0 0 612 612;"
						xml:space="preserve">
						<g>
							<g>
								<path class="fill-cinza2"
													d="M306.001,325.988c90.563-0.005,123.147-90.682,131.679-165.167C448.188,69.06,404.799,0,306.001,0
									c-98.782,0-142.195,69.055-131.679,160.82C182.862,235.304,215.436,325.995,306.001,325.988z" />
								<path class="fill-cinza3"
													d="M550.981,541.908c-0.99-28.904-4.377-57.939-9.421-86.393c-6.111-34.469-13.889-85.002-43.983-107.465
									c-17.404-12.988-39.941-17.249-59.865-25.081c-9.697-3.81-18.384-7.594-26.537-11.901c-27.518,30.176-63.4,45.962-105.186,45.964
									c-41.774,0-77.652-15.786-105.167-45.964c-8.153,4.308-16.84,8.093-26.537,11.901c-19.924,7.832-42.461,12.092-59.863,25.081
									c-30.096,22.463-37.873,72.996-43.983,107.465c-5.045,28.454-8.433,57.489-9.422,86.393
									c-0.766,22.387,10.288,25.525,29.017,32.284c23.453,8.458,47.666,14.737,72.041,19.884c47.077,9.941,95.603,17.582,143.921,17.924
									c48.318-0.343,96.844-7.983,143.921-17.924c24.375-5.145,48.59-11.424,72.041-19.884
									C540.694,567.435,551.747,564.297,550.981,541.908z" />
							</g>
						</g>
		        	</svg>
				</div>
				<div class="maquina-info">
					<span class="maquina-usuario">ERISSON MOURA CO?LHO</span> <span
						class="maquina-tempo maquina-tempo-total">01:55:53</span> <span
						class="maquina-tempo maquina-tempo-restante">00:00:00</span> <span
						class="maquina-tempo maquina-tempo-total">Endereco Mac</span> <span
						class="maquina-tempo maquina-tempo-restante">74-86-7A-FC-B8-4D</span>
					<span class="maquina-tempo maquina-tempo-total">Laboratorio</span>
					<span class="maquina-tempo maquina-tempo-restante">LABTI01</span> <span
						class="maquina-tempo maquina-tempo-total">IP:</span> <span
						class="maquina-tempo maquina-tempo-restante">/10.11.0.220</span>
				</div>
				<div class="linha">
					<hr />
				</div>
				<div class="maquina-icone">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
						<g id="clock">
							<g>
								<path class="fill-cinza3" d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.157
									C158.451,573.157,38.843,453.55,38.843,306C38.843,158.451,158.451,38.843,306,38.843c147.55,0,267.157,119.608,267.157,267.157
									C573.157,453.55,453.55,573.157,306,573.157z M325.125,115.955h-37.657l0.593,209.782l132.077,112.952l23.313-32.876
									l-118.326-99.221V115.955z"/>
							</g>
						</g>
		        	</svg>
				</div>
				<div class="maquina-info">
					<span class="maquina-tempo maquina-tempo-total">01:55:53</span> <span
						class="maquina-tempo maquina-tempo-restante">00:00:00</span> <span
						class="maquina-tempo maquina-tempo-total">Endereco Mac</span> <span
						class="maquina-tempo maquina-tempo-restante">74-86-7A-FC-B8-4D</span>
					<span class="maquina-tempo maquina-tempo-total">Laboratorio</span>
					<span class="maquina-tempo maquina-tempo-restante">LABTI01</span> <span
						class="maquina-tempo maquina-tempo-total">IP:</span> <span
						class="maquina-tempo maquina-tempo-restante">/10.11.0.220</span>
				</div>
				<div class="linha">
					<hr />
				</div>
				
				<div class="comando doze centralizado">
					<a href="#link" class="botao b-aviso"><span class="icone-lock"> </span>Bloquear</a>
					<a href="#link" class="botao b-sucesso"><span class="icone-books">
					</span>Aula</a> <a href="#link" class="botao b-erro"><span
						class="icone-switch"> </span>Desligar</a> <a href="#link"
						class="botao disabled"><span class="icone-switch"> </span>Ligar</a>
				</div>
				<div class="linha"></div>
			</div>
		</div>
	</div>
	<!-- 	Menu Click Esquerdo - Aparece na pagina de maquinas e laboratorios.  -->
<!-- 	<script type="text/javascript" src="js/jquery.min.js"></script> -->
<!-- 	<script type="text/javascript" src="js/context.js"></script> -->
<!-- 	<script type="text/javascript" src="js/unicaffe_context_menu.js" charset="UTF-8"></script> -->
</body>
</html>