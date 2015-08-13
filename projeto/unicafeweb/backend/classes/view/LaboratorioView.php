<?php


class LaboratorioView{
	
	
	public function mostraLaboratorio(Laboratorio $laboratorio) {
	
		$cor = 'cinza';
		
		echo '<a href="?pagina=maquinas&laboratorio='.$laboratorio->getNome().'"> <div  class="maquina maquina-verde">
		  	<h2 class="maquina-titulo">'.$laboratorio->getNome().'</h2>
		  	<div class="maquina-icone">
		  	</div>
		  	<div class="maquina-info">
		  		<span class="maquina-usuario">Aberto</span>
			</div>
		</div></a>';
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