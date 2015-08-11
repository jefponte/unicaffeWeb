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
	public function mostraMaquina(Maquina $maquina, $admin = true) {
		
		$cor = 'cinza';
		if ($maquina->getStatus () == Maquina::STATUS_DISPONIVEL)
			$cor = 'verde';
		else if ($maquina->getStatus () == Maquina::STATUS_DESCONECTADA)
			$cor = 'cinza';
		else if ($maquina->getStatus () == Maquina::STATUS_OCUPADA)
			$cor = 'vermelho';
		$valor = "offline";
		if($maquina->getStatus() != Maquina::STATUS_DESCONECTADA)
			$valor = 'online';
		if(!$admin){
			$valor = "";//Desabilitar o menu para não administradores. 
		}
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
		echo '
			</div>
		</div>';
	}
	
}

?>