<?php
class MaquinaView {
	
	
	public static function segundosParaHora($intTempo) {
		
		if($intTempo < 0){
			$intTempo = 0;
		}
		$hours = floor ( $intTempo / 3600 );
		$intTempo -= $hours * 3600;
		$minutes = floor ( $intTempo / 60 );
		$intTempo -= $minutes * 60;
		$strHoras = "";
		$strHoras .= str_pad($hours, 2, "0", STR_PAD_LEFT);
		$strHoras .= ':';
		
		$strHoras .= str_pad($minutes, 2, "0", STR_PAD_LEFT);
		
		$strHoras .= ':';
		
		$strHoras .= str_pad($intTempo, 2, "0", STR_PAD_LEFT);
		
		return $strHoras;
	}
	
	public function mostraMaquinaDetalhe(Maquina $maquina) {
		$admin = true;//Depois a gente muda isso. Vamos futuramente receber por parametro.
		$valor = "";
		if(!$maquina->getLaboratorio()->getNome())
			$maquina->getLaboratorio()->setNome("---");
		if(!$maquina->getAcesso()->getUsuario()->getEmail())
			$maquina->getAcesso()->getUsuario()->setEmail("---");
		if(!$maquina->getAcesso()->getUsuario()->getLogin())
			$maquina->getAcesso()->getUsuario()->setLogin("---");
		if(!$maquina->getEnderecoMac())
			$maquina->setEnderecoMac("---");
		$cor = 'cinza';
		$status = "Desconectada";
		if ($maquina->getStatus () == Maquina::STATUS_DISPONIVEL){
			$cor = 'verde';
			$status = "Disponível";
			$maquina->getAcesso()->getUsuario()->setNome('Livre');
				
		}
		else if ($maquina->getStatus () == Maquina::STATUS_DESCONECTADA){
			$cor = 'cinza';
			$status = "Desconectada";
			$maquina->getAcesso()->getUsuario()->setNome('---');
		}
		else if ($maquina->getStatus () == Maquina::STATUS_OCUPADA){
			$cor = 'laranja';
			$status = "Ocupada";
			$valor = "online";
			if($maquina->getAcesso()->getTempoDisponibilizado() - $maquina->getAcesso()->getTempoUsado() <= 600){
				$cor = 'vermelho';
				$status = "Finalizando";
				if(!$admin)
					$maquina->getAcesso()->getUsuario()->setNome('Finalizando');
			}else
			{
				if(!$admin)
					$maquina->getAcesso()->getUsuario()->setNome('Ocupada');
			}
				
		}
		if($maquina->getStatus() != Maquina::STATUS_DESCONECTADA){
			$valor = 'online';
		}
		
		if(!$admin){
			$valor = "";//Desabilitar o menu para n�o administradores.
		}
		
		
		
		echo '<div id="'.$maquina->getNome().'" class="maquina detalhes maquina-'.$valor.'">
				<h2 class="maquina-titulo">Máquina: '.$maquina->getNome().'</h2>
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
		                        <rect class="fill-'.$cor.'2" x="0" y="34.652"
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
					<span class="maquina-tempo maquina-tempo-total">Status</span> <span
						class="maquina-tempo maquina-tempo-restante">'.$status.'</span> <span
						class="maquina-tempo maquina-tempo-total">Laboratório</span> <span
						class="maquina-tempo maquina-tempo-restante">'.$maquina->getLaboratorio()->getNome().'</span>
					<span class="maquina-tempo maquina-tempo-total">Endereço Mac</span>
					<span class="maquina-tempo maquina-tempo-restante">'.$maquina->getEnderecoMac().'</span> 
							
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
					<span class="maquina-usuario">'.$maquina->getAcesso()->getUsuario()->getNome().'</span> <span
						class="maquina-tempo maquina-tempo-total">Login</span> <span
						class="maquina-tempo maquina-tempo-restante">'.$maquina->getAcesso()->getUsuario()->getLogin().'</span> <span
						class="maquina-tempo maquina-tempo-total">E-mail</span> <span
						class="maquina-tempo maquina-tempo-restante">'.$maquina->getAcesso()->getUsuario()->getEmail().'</span>
					
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
				<div class="maquina-info">';
		
		if($maquina->getStatus() == Maquina::STATUS_OCUPADA)
			echo '
					<span class="maquina-tempo maquina-tempo-total">Hora de Entrada</span> <span
						class="maquina-tempo maquina-tempo-restante">'.date("H:i:s",intval(($maquina->getAcesso()->getHoraInicial()/1000))).'</span> 
						<span
						class="maquina-tempo maquina-tempo-total">Tempo Usado</span>
					<span class="maquina-tempo maquina-tempo-restante">'.self::segundosParaHora($maquina->getAcesso()->getTempoUsado()).'</span>
					<span class="maquina-tempo maquina-tempo-total">Tempo Restante</span>
					<span class="maquina-tempo maquina-tempo-restante">'.self::segundosParaHora($maquina->getAcesso()->getTempoDisponibilizado() - $maquina->getAcesso()->getTempoUsado()).'</span> <span
						class="maquina-tempo maquina-tempo-total">Ip: </span> 
					<span class="maquina-tempo maquina-tempo-restante">'.$maquina->getAcesso()->getIp().'</span>';
		else
				echo '
					<span class="maquina-tempo maquina-tempo-total">Hora de Entrada</span> <span
						class="maquina-tempo maquina-tempo-restante">--:--:--</span> <span
						class="maquina-tempo maquina-tempo-total">Tempo Usado</span>
					<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>
					<span class="maquina-tempo maquina-tempo-total">Tempo Restante</span>
					<span class="maquina-tempo maquina-tempo-restante">--:--:--</span> <span
						class="maquina-tempo maquina-tempo-total">Ip: </span> <span
						class="maquina-tempo maquina-tempo-restante">'.MaquinaDAO::retornaUltimoIP($maquina).'</span>';
		echo '</div>
				<div class="linha">
					<hr />
				</div>
				
				<div class="comando doze centralizado">
					<a href="index.php?pagina=maquinas&comando=4&maquina='.$maquina->getNome().'" class="botao b-aviso"><span class="icone-lock"> </span>Bloquear</a>
					<a href="index.php?pagina=maquinas&comando=2&maquina='.$maquina->getNome().'" class="botao b-sucesso"><span class="icone-books"></span>Aula</a> 
							<a href="index.php?pagina=maquinas&comando=1&maquina='.$maquina->getNome().'" class="botao b-erro"><span
						class="icone-switch"> </span>Desligar</a> 
						<a href="#link" class="botao disabled"><span class="icone-switch"> </span>Ligar</a>
								</div>
				<div class="linha"></div>
			</div>';
	}
	
	public function mostraMaquina(Maquina $maquina, $admin = true) {
		$valor = "";
		$cor = 'cinza';
		if ($maquina->getStatus () == Maquina::STATUS_DISPONIVEL){
			$cor = 'verde';
			$maquina->getAcesso()->getUsuario()->setNome('Livre');
			
		}
		else if ($maquina->getStatus () == Maquina::STATUS_DESCONECTADA){
			$cor = 'cinza';
			$maquina->getAcesso()->getUsuario()->setNome('Indisponível');
		}
		else if ($maquina->getStatus () == Maquina::STATUS_OCUPADA){
			$cor = 'laranja';
			$valor = "online";
			if($maquina->getAcesso()->getTempoDisponibilizado() - $maquina->getAcesso()->getTempoUsado() <= 600){
				$cor = 'vermelho';

				if(!$admin)
					$maquina->getAcesso()->getUsuario()->setNome('Finalizando');
			}else
			{
				if(!$admin)
					$maquina->getAcesso()->getUsuario()->setNome('Ocupada');
			}
			
		}
		if($maquina->getStatus() != Maquina::STATUS_DESCONECTADA){
			$valor = 'online';
		}
		if(!$admin){
			$valor = "";//Desabilitar o menu para n�o administradores. 
		}
// 		if($maquina->getAcesso()->getTempoDisponibilizado() - $maquina->getAcesso()->getTempoUsado() <= 600 && $maquina->getStatus() != Maquina::STATUS_DESCONECTADA){
// 			$cor = 'vermelho';
// 			$valor = 'online';
// 		}

		if($admin)
			echo '<a href="?pagina=maquina&maquina='.$maquina->getNome().'">';
		echo ' <div id="'.$maquina->getNome().'" class="maquina maquina-'.$valor.'">
		  	<h2 class="maquina-titulo">' . $maquina->getNome () . '</h2>
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
		                        <rect class="fill-' . $cor . '2" x="0" y="34.652" style="fill:#939393;" width="71.577" height="46.525"/>
		                    </g>
		                    <g>
		                        <polygon style="fill:#939393;" points="25.052,85.279 17.894,92.436 53.683,92.436 46.525,85.279          "/>
		                    </g>
		                </g>
		            </g>
		        </svg>
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">' . $maquina->getAcesso ()->getUsuario ()->getNome () . '</span>';
		
		if($maquina->getStatus() == Maquina::STATUS_OCUPADA)
			echo '
			    	<span class="maquina-tempo maquina-tempo-total">'.self::segundosParaHora($maquina->getAcesso()->getTempoUsado()).'</span>
			    	<span class="maquina-tempo maquina-tempo-restante">'.self::segundosParaHora($maquina->getAcesso()->getTempoDisponibilizado() - $maquina->getAcesso()->getTempoUsado()).'</span>';
		
		else 
			echo '
			    	<span class="maquina-tempo maquina-tempo-total">--:--:--</span>
			    	<span class="maquina-tempo maquina-tempo-restante">--:--:--</span>';
			
		echo '
			</div>
		</div>';
		if($admin)
			echo '</a>';
	}
	public function formPesquisaHistorico(){
		echo '<div class="resolucao">
            <div class="doze colunas">
                <div class="conteudo fundo-branco">';
		
		echo '<form action="#" method="get" name="form_pesquisa" id="pesquisa" class="formulario-organizado">
                      <label for="lab">
                      <object class="">Usuario: </object>
		
                      <input type="text" name="usuario" id="usuario" />
                      </label>
						<input type="hidden" name="pagina" value="gerenciamento_relatorios" />
                        <input type="submit" value="enviar" name="form_pesquisa" />
                    </form></div>
            </div>
        </div>';
	}
}

?>