<?php


class LaboratorioView{
	
	
	
	public function mostraMaquinas($lista){
		foreach($lista as $elemento){
			
			echo ' <div class="duas colunas">
                    <div class="conteudo maquina borda-vermelho3">
                        <h2 class="titulo texto-cinza3 maiusculas centralizado fundo-cinza1">'.$elemento->getNome().'</h2>
                        <div class="fundo-cinza1">
                            <div class="seis no-centro">
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
                        </div>
                        <h3 class="titulo fundo-vermelho2"><span class="icone-user a-esquerda fundo-vermelho3"></span>joseolinda</h3>
                        <h3 class="titulo fundo-vermelho2"><span class="icone-clock2 a-esquerda fundo-vermelho3"></span>10:05:14</h3>
                    </div>
                </div>';
		}
		
	}
	public function mostraMaquina(Maquina $maquina){
		
		$cor = 'cinza';
		if($maquina->getStatus() == Maquina::STATUS_DISPONIVEL)
			$cor = 'verde';
		else if($maquina->getStatus() == Maquina::STATUS_DESCONECTADA)
			$cor = 'cinza';
		else if($maquina->getStatus() == Maquina::STATUS_OCUPADA)
			$cor = 'vermelho';
		echo '<div class="duas colunas">
                    <div class="conteudo maquina borda-'.$cor.'3">
                        <h2 class="titulo texto-cinza3 maiusculas centralizado fundo-cinza1">'.substr($maquina->getNome(), 0,8).'</h2>
                        <div class="fundo-cinza1">
                            <div class="seis no-centro">
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
                                                <rect class="fill-'.$cor.'2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
                                            </g>
                                            <g>
                                                <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <h3 class="titulo fundo-'.$cor.'2"><span class="icone-user a-esquerda fundo-'.$cor.'3"></span>'.$maquina->getAcesso()->getUsuario()->getLogin().'</h3>
                        <h3 class="titulo fundo-'.$cor.'2"><span class="icone-clock2 a-esquerda fundo-'.$cor.'3"></span>--:--:--</h3>
                    </div>
                </div>';
		
		
			
			
		
	}
	public function mostraFormLaboratorio(){
		echo '            <div class="linha doze colunas fundo-azul1" >
                <div class="conteudo">
                    <div class="linha doze">
                        <h1 class="titulo texto-branco maiusculas a-esquerda seis grande">Visualização de acessos</h1>
                        <div class="a-direita seis alinhado-a-direita">
                            <form method="post" action="#" class="formulario doze">
                                <label class="dez" style="display: inline;">
                                    <span class="texto-branco negrito">Visualizar laboratório: </span>
                                    <select>
                                        <option>LABTI01</option>
                                        <option>LABTI02</option>
                                        <option>LABTI03</option>
                                    </select>
                                </label>
                                <button class="botao b-aviso duas" type="submit">Alterar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            ';
	}
	
}


?>