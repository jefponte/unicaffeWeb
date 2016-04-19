<?php


class LaboratorioView{
	
	
	public function mostraLaboratorio(Laboratorio $laboratorio, $admin = false, $livres, $ocupadas, $desconectadas, $total) {
		$estado = 'Fechado';
		$cor = 'cinza';
		if($livres >= 1){
			$cor = 'verde';
			$estado = 'Aberto';
		}else{
			if($desconectadas == $total){
				$cor = 'cinza';
				$estado = 'Indisponível';
				
			}else if($ocupadas == $total){
				$estado = 'Lotado';
				$cor = 'laranja';
			}else if($ocupadas >= 1)
			{
				$estado = 'Lotado';
				$cor = 'laranja';
			}
		}
		
		
		echo '<a href="?pagina=maquinas&laboratorio='.$laboratorio->getNome().'">
				<div class="maquina maquina-verde">
					<h2 class="maquina-titulo">'.$laboratorio->getNome().'</h2>
					<div class="maquina-icone">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 464.309 464.309"
							style="enable-background: new 0 0 464.309 464.309;"
							xml:space="preserve">
					<path class="fill-'.$cor.'2"
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
						<span class="maquina-usuario">'.$estado.'</span>
						<span class="maquina-usuario pequeno">'.$livres.' máquinas livres</span>
						<span class="maquina-usuario pequeno">'.$ocupadas.' máquinas ocupadas</span>
						<span class="maquina-usuario pequeno">'.$desconectadas.' máquinas indisponíveis</span>
						<span class="maquina-usuario pequeno">'.$total.' máquinas </span>
					</div>';
		
		if($admin)
			echo '
			<div class="linha">
						<hr />
					</div>
		

					<div class="comando doze centralizado minimo">
						<a href="?pagina=maquinas&laboratorio='.$laboratorio->getNome().'&comando_laboratorio='.$laboratorio->getNome().'&comando='.ComandoController::COMANDO_BLOQUEIA.'" class="botao b-aviso"><span class="icone-lock"> </span>Bloquear</a>
						<a href="?pagina=maquinas&laboratorio='.$laboratorio->getNome().'&comando_laboratorio='.$laboratorio->getNome().'&comando='.ComandoController::COMANDO_AULA.'" class="botao b-sucesso"><span class="icone-books">
						</span>Aula</a> <a href="?pagina=maquinas&laboratorio='.$laboratorio->getNome().'&comando_laboratorio='.$laboratorio->getNome().'&comando='.ComandoController::COMANDO_DESLIGAR.'" class="botao b-erro"><span
							class="icone-switch"> </span>Desligar</a> <a href="?pagina=maquinas&laboratorio='.$laboratorio->getNome().'&comando_laboratorio='.$laboratorio->getNome().'&comando='.ComandoController::COMANDO_LIGAR.'"
							class="botao"><span class="icone-switch"> </span>Ligar</a>
					</div>
					<div class="linha"></div>';
		echo '
				</div>
			</a>';
	}
	
	/**
	 * PReencha as entradas para que sejam mostrada mensagem de sucesso ou de erro no formulario. 
	 * @param string $mensagem
	 * @param string $erro
	 * @param string $sucesso
	 */
	public function formCadastro($mensagem = "", $erro = false, $sucesso = false){
		
		echo '<div class="resolucao">
            <div class="doze colunas">
                <div class="conteudo fundo-branco">';
		
			if($erro==TRUE)
				echo '<div class="alerta-erro">
                            <div class="icone icone-clock2 ix16"></div>
                            <div class="titulo-alerta">'.$mensagem.'</div>
                            <div class="subtitulo-alerta">'.$mensagem.'</div>
                        </div>';
			if($sucesso==TRUE)
				echo '<div class="alerta-sucesso">
                            <div class="icone icone-download ix48"></div>
                            <div class="titulo-alerta">'.$mensagem.'</div>
                            <div class="subtitulo-alerta"><?php ?></div>
                        </div>';
			echo '<form action="#" method="post" name="formulario_cadastro" id="formulario_cadastro" class="formulario-organizado">
                      <label for="lab">
                      <object class="">Nome Laboratório: </object> 
                      
                      <input type="text" name="nome" id="nome" />
                      </label>
                        <input type="submit" value="enviar" name="formulario_cadastro" />
                    </form></div>
            </div>
        </div>';
		
	}
}