<!DOCTYPE html>
<html lang="pt-br">
    <head>	
        <meta charset="UTF-8">
        <title>Unicaffé Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" /><!-- meta tag para responsividade em Windows e Linux -->  
        <link rel="stylesheet" href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/maquina.css" />
        <link rel="stylesheet" href="css/new_maquina.css" />
        <link rel="stylesheet" type="text/css" href="css/context.standalone.css"/>
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
                        <a href="#">
                            <img alt="logotipo do Unicaffé" src="img/logo_unicaffe.png" title="Ir para Unicaffé">
                        </a>
                    </div>
                    <div id="logo-universidade">
                        <a href="#">
                            <img alt="logotipo da Unilab" src="img/logo_unilab.png" title="Ir para Unilab">
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
                        </ul>
                    </li>
                    <li><a href="?pagina=maquinas">Máquinas</a>
                        <ul class="seta-pra-cima">
                            <li><a href="?pagina=maquinas" class="ativo">Listagem</a>
                            <ul>
                            <li><a href="?pagina=maquinas&laboratorio=BIBLIBERDADE">BIBLIBERDADE</a></li><li><a href="?pagina=maquinas&laboratorio=BIBPALMARES">BIBPALMARES</a></li><li><a href="?pagina=maquinas&laboratorio=LABTI01">LABTI01</a></li><li><a href="?pagina=maquinas&laboratorio=LABTI02">LABTI02</a></li><li><a href="?pagina=maquinas&laboratorio=LABTI03">LABTI03</a></li><li><a href="?pagina=maquinas&laboratorio=LABTI04">LABTI04</a></li>                            	
                            </ul>
                            
                            </li>
                        </ul>
                    </li>
                    
                    <li><a href="?pagina=gerenciamento_relatorios">Gerenciamento</a>
                        <ul class="seta-pra-cima">
                            <li><a href="?pagina=gerenciamento_relatorios">Relatorios </a></li>
                            <li><a href="?pagina=gerenciamento_administrador">Administrador</a></li><li><a href="?pagina=maquinas&comando=10&maquina=LABTI08">Teste Oi Ligador</a></li>                        </ul>
                    </li>
                    <li class="a-direita"><a href="?sair=daqui" class="ativo">Sair</a></li>                    
                </ol>
            </div>



            
            <div class="linha doze colunas fundo-azul1" >
                <div class="conteudo">
                    <div class="linha doze">
                        <h1 class="titulo texto-branco maiusculas a-esquerda seis grande">Visualização de acessos</h1>
                        <div class="a-direita seis alinhado-a-direita">
                            <form method="get" action="?pagina=maquinas" class="formulario doze">
                                <label class="dez" style="display: inline;">
                                    <span class="texto-branco negrito">Visualizar laboratório: </span>
                                    <select name="laboratorio">
                                    <option value="BIBLIBERDADE">BIBLIBERDADE</option><option value="BIBPALMARES">BIBPALMARES</option><option value="LABTI01">LABTI01</option><option value="LABTI02">LABTI02</option><option value="LABTI03">LABTI03</option><option value="LABTI04">LABTI04</option> <option value="nao_listada">Sem Laboratorio</option>                                        
                                    </select>
                                    <input type="hidden" name="pagina" value="maquinas">
                                </label>
                                <button class="botao b-aviso duas" type="submit">Alterar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
							var auto_refresh = setInterval (function () {
							$.ajax({
							url: 'maquinas.php',
							success: function (response) {
							$('#olinda').html(response);
							}
							});
							}, 1000);
							</script>
							<div id="olinda" class="doze colunas fundo-branco"><a href="?pagina=detalhe&maquina=BIBLIBERDADE09"> <div id="BIBLIBERDADE09" class="maquina maquina-">
		  	<h2 class="maquina-titulo">BIBLIBERDADE09</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBLIBERDADE10"> <div id="BIBLIBERDADE10" class="maquina maquina-">
		  	<h2 class="maquina-titulo">BIBLIBERDADE10</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBLIBERDADE11"> <div id="BIBLIBERDADE11" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">BIBLIBERDADE11</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-verde2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Livre</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBLIBERDADE12"> <div id="BIBLIBERDADE12" class="maquina maquina-">
		  	<h2 class="maquina-titulo">BIBLIBERDADE12</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBLIBERDADE13"> <div id="BIBLIBERDADE13" class="maquina maquina-">
		  	<h2 class="maquina-titulo">BIBLIBERDADE13</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBLIBERDADE14"> <div id="BIBLIBERDADE14" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">BIBLIBERDADE14</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">ALBERTINHO MANE</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:13:26</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:46:34</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBLIBERDADE15"> <div id="BIBLIBERDADE15" class="maquina maquina-">
		  	<h2 class="maquina-titulo">BIBLIBERDADE15</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBLIBERDADE16"> <div id="BIBLIBERDADE16" class="maquina maquina-">
		  	<h2 class="maquina-titulo">BIBLIBERDADE16</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBPALMARES12"> <div id="BIBPALMARES12" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">BIBPALMARES12</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-verde2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Livre</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBPALMARES15"> <div id="BIBPALMARES15" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">BIBPALMARES15</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-verde2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Livre</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBPALMARES16"> <div id="BIBPALMARES16" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">BIBPALMARES16</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-verde2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Livre</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBPALMARES17"> <div id="BIBPALMARES17" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">BIBPALMARES17</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-verde2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Livre</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=BIBPALMARES18"> <div id="BIBPALMARES18" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">BIBPALMARES18</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-verde2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Livre</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI01"> <div id="LABTI01" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI01</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">FERNANDO SIGA</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:41:19</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:18:41</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI02"> <div id="LABTI02" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI02</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">JOS? AERTON MENDES PEREIRA</span>
			    	<span class="maquina-tempo maquina-tempo-total">01:14:19</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:00:00</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI03"> <div id="LABTI03" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI03</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">GESICA ITALVINA MARTINS DE PINA</span>
			    	<span class="maquina-tempo maquina-tempo-total">01:14:55</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:00:00</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI04"> <div id="LABTI04" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI04</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">BRUNO GOMES</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:53:55</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:06:05</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LabTI05"> <div id="LabTI05" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LabTI05</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">ERISSON MOURA CO?LHO</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:23:55</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:36:05</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI06"> <div id="LABTI06" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI06</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">J?LIO AGOSTINHO DINGNA</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:10:28</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:44:33</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI07"> <div id="LABTI07" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI07</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">MAGNUSON DJANGO MENDES</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:51:32</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:08:28</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI08"> <div id="LABTI08" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI08</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">MILTON LUIS FILIPE MUHONGO</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:18:37</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:41:23</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LabTI09"> <div id="LabTI09" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LabTI09</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">CRISNA BATISTA DA SILVA FERREIRA</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:04:29</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:55:31</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI10"> <div id="LABTI10" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI10</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-verde2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Livre</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI101"> <div id="LABTI101" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI101</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI103"> <div id="LABTI103" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI103</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI104"> <div id="LABTI104" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI104</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI11"> <div id="LABTI11" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI11</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">MALAQUIAS AUGUSTO LOPES</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:34:57</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:20:01</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI112"> <div id="LABTI112" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI112</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI113"> <div id="LABTI113" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI113</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI114"> <div id="LABTI114" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI114</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI115"> <div id="LABTI115" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI115</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI116"> <div id="LABTI116" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI116</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI117"> <div id="LABTI117" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI117</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI118"> <div id="LABTI118" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI118</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI119"> <div id="LABTI119" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI119</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI12"> <div id="LABTI12" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI12</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">DAVITSON GOMES DA COSTA</span>
			    	<span class="maquina-tempo maquina-tempo-total">01:02:53</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:00:00</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI120"> <div id="LABTI120" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI120</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI121"> <div id="LABTI121" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI121</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI122"> <div id="LABTI122" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI122</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI123"> <div id="LABTI123" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI123</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI124"> <div id="LABTI124" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI124</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI125"> <div id="LABTI125" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI125</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI126"> <div id="LABTI126" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI126</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI127"> <div id="LABTI127" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI127</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI128"> <div id="LABTI128" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI128</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI129"> <div id="LABTI129" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI129</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI13"> <div id="LABTI13" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI13</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">JAILSON SULEIMANE GOMES CAND?</span>
			    	<span class="maquina-tempo maquina-tempo-total">01:06:01</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:00:00</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI130"> <div id="LABTI130" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI130</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI131"> <div id="LABTI131" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI131</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI132"> <div id="LABTI132" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI132</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI133"> <div id="LABTI133" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI133</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI134"> <div id="LABTI134" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI134</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI135"> <div id="LABTI135" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI135</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI136"> <div id="LABTI136" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI136</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI137"> <div id="LABTI137" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI137</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI138"> <div id="LABTI138" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI138</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI139"> <div id="LABTI139" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI139</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LabTI14"> <div id="LabTI14" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LabTI14</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">LEONILDO DIAS LAURENCE</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:03:24</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:24:36</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI140"> <div id="LABTI140" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI140</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI141"> <div id="LABTI141" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI141</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI142"> <div id="LABTI142" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI142</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI143"> <div id="LABTI143" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI143</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI144"> <div id="LABTI144" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI144</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI145"> <div id="LABTI145" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI145</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI146"> <div id="LABTI146" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI146</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI147"> <div id="LABTI147" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI147</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI15"> <div id="LABTI15" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI15</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">PITER INDAMI</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:20:52</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:39:08</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI16"> <div id="LABTI16" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI16</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">ABDEL BONEENSA C?</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:56:16</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:00:00</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI17"> <div id="LABTI17" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI17</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">RICARDO AGUINELO AQUIXINCO GOMES C?</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:56:53</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:03:07</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI18"> <div id="LABTI18" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI18</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">J?LIO AGOSTINHO DINGNA</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:05:00</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:55:00</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI19"> <div id="LABTI19" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI19</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">MOHAMED SAIDO BALDE</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:19:52</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:21:10</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI20"> <div id="LABTI20" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI20</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">YANICK RODOLFO GOMES</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:49:04</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:10:56</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI21"> <div id="LABTI21" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI21</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI22"> <div id="LABTI22" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI22</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">ANTONIO GISLAILSON DELFINO DA SILVA</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:53:44</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:06:16</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LabTI226"> <div id="LabTI226" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LabTI226</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">JULIMAR TRAJANO LOPES</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:19:32</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:40:28</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI23"> <div id="LABTI23" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI23</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">IDER BORGES DA VEIGA</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:21:25</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:30:18</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI24"> <div id="LABTI24" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI24</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI25"> <div id="LABTI25" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI25</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI27"> <div id="LABTI27" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI27</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Visitante</span>
			    	<span class="maquina-tempo maquina-tempo-total">01:00:11</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:00:00</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI28"> <div id="LABTI28" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI28</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">MAMADI TRAUALE</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:27:37</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:32:23</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI29"> <div id="LABTI29" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI29</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">PAULINO JOSE LOPES</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:17:54</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:42:06</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI30"> <div id="LABTI30" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI30</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">NILS MENDES TAVARES</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:58:06</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:01:54</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LabTI31"> <div id="LabTI31" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LabTI31</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-vermelho2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Visitante</span>
			    	<span class="maquina-tempo maquina-tempo-total">01:00:06</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:00:00</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI32"> <div id="LABTI32" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI32</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">ALEXANDRINO MOREIRA LOPES</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:18:05</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:41:55</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI33"> <div id="LABTI33" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI33</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">YTHALO VIANA LIMA</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:19:11</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:40:49</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LabTI34"> <div id="LabTI34" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LabTI34</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-laranja2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">SAARA MADALENA GON?ALVES DA SILVA</span>
			    	<span class="maquina-tempo maquina-tempo-total">00:17:19</span>
			    	<span class="maquina-tempo maquina-tempo-restante">00:42:41</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI35"> <div id="LABTI35" class="maquina maquina-online">
		  	<h2 class="maquina-titulo">LABTI35</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-verde2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Livre</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI36"> <div id="LABTI36" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI36</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI38"> <div id="LABTI38" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI38</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI39"> <div id="LABTI39" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI39</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI40"> <div id="LABTI40" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI40</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI41"> <div id="LABTI41" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI41</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI42"> <div id="LABTI42" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI42</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI43"> <div id="LABTI43" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI43</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI44"> <div id="LABTI44" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI44</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI45"> <div id="LABTI45" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI45</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI46"> <div id="LABTI46" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI46</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI47"> <div id="LABTI47" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI47</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI48"> <div id="LABTI48" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI48</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI49"> <div id="LABTI49" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI49</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI50"> <div id="LABTI50" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI50</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI51"> <div id="LABTI51" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI51</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI52"> <div id="LABTI52" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI52</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI53"> <div id="LABTI53" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI53</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI54"> <div id="LABTI54" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI54</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI55"> <div id="LABTI55" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI55</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI56"> <div id="LABTI56" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI56</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI57"> <div id="LABTI57" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI57</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI58"> <div id="LABTI58" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI58</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI59"> <div id="LABTI59" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI59</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI60"> <div id="LABTI60" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI60</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI61"> <div id="LABTI61" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI61</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI62"> <div id="LABTI62" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI62</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI63"> <div id="LABTI63" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI63</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI64"> <div id="LABTI64" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI64</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI65"> <div id="LABTI65" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI65</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI66"> <div id="LABTI66" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI66</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI67"> <div id="LABTI67" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI67</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI68"> <div id="LABTI68" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI68</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI69"> <div id="LABTI69" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI69</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI70"> <div id="LABTI70" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI70</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI71"> <div id="LABTI71" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI71</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI72"> <div id="LABTI72" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI72</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI73"> <div id="LABTI73" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI73</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI74"> <div id="LABTI74" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI74</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI75"> <div id="LABTI75" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI75</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI76"> <div id="LABTI76" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI76</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI77"> <div id="LABTI77" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI77</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI79"> <div id="LABTI79" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI79</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI80"> <div id="LABTI80" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI80</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI81"> <div id="LABTI81" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI81</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI82"> <div id="LABTI82" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI82</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI83"> <div id="LABTI83" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI83</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI84"> <div id="LABTI84" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI84</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI85"> <div id="LABTI85" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI85</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI86"> <div id="LABTI86" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI86</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI87"> <div id="LABTI87" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI87</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI88"> <div id="LABTI88" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI88</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI89"> <div id="LABTI89" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI89</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI92"> <div id="LABTI92" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI92</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI93"> <div id="LABTI93" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI93</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTISEC"> <div id="LABTISEC" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTISEC</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a><a href="?pagina=detalhe&maquina=LABTI91"> <div id="LABTI91" class="maquina maquina-">
		  	<h2 class="maquina-titulo">LABTI91</h2>
		  	<div class="maquina-icone">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 109.602 109.602" style="enable-background:new 0 0 109.602 109.602;" xml:space="preserve">
		            <g>
		                <g>
		                    <g>
		                        <ellipse style="fill:#939393;" cx="99.549" cy="28.919" rx="1.51" ry="0.752"/>
		                    </g>
		                    <g>
		                        <path style="fill:#939393;" d="M106.585,17.166H67.443c-1.657,0-3.013,1.356-3.013,3.01V31.07h6.027v-8.353h33.119v9.029H75.163
		                            v8.278h28.412v1.507H75.163v7.526h28.412v1.503H75.163v34.189H64.437v4.67c0,1.653,1.356,3.01,3.01,3.01h39.145
		                            c1.653,0,3.01-1.356,3.01-3.01V20.172C109.595,18.522,108.239,17.166,106.585,17.166z M87.009,72.527
		                            c-2.491,0-4.517-2.018-4.517-4.517c0-2.491,2.022-4.517,4.517-4.517c2.494,0,4.52,2.018,4.52,4.517
		                            C91.529,70.509,89.503,72.527,87.009,72.527z"/>
		                    </g>
		                    <g>
		                        <rect class="fill-cinza2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Desligado</span>
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
			</div>
		</div></a> </div>        </div>
        
        
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/context.js"></script>
	<script type="text/javascript" src="js/unicaffe_context_menu.js" charset="UTF-8"></script>
    </body>
</html>