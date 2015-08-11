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
	
	
}