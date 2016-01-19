<?php


class RelatorioController{
	
	
	const TIPO_HISTOGRAMA_TURNO = 1;
	
	public static function main($tipoDeTela) {
		$relatorio = new RelatorioController();
		$relatorio->histogramaTurno();
		
	}
	
	
	public function histogramaTurno(){
		
		echo '';
		
		
		
	}
	
	
	
}