<?php

class ComandoController{
	
	
	
	public static function main($nivelDeAcesso){
		
		switch ($nivelDeAcesso)
		{
			case Sessao::NIVEL_SUPER:
				$comandoController = new ComandoController();
				$comandoController->gerenciaComando();
				break;
			default:
				break;
		}
		
	}
	public function gerenciaComando(){
		if(isset($_GET['comando']) && isset($_GET['maquina'])){
			switch ($_GET['comando']){
				case 1:
					$unicafe = new UniCafe();
					echo '<p>'.$unicafe->dialoga('desliga('.$_GET['maquina'].')').'</p>';
		
					break;
				case 2:
					$unicafe = new UniCafe();
					echo '<p>'.$unicafe->dialoga('aula('.$_GET['maquina'].')').'</p>';
					break;
				case 3:
					$unicafe = new UniCafe();
					echo '<p>'.$unicafe->dialoga('visitante('.$_GET['maquina'].')').'</p>';
					break;
				case 4:
					$unicafe = new UniCafe();
					echo '<p>'.$unicafe->dialoga('bloqueia('.$_GET['maquina'].')').'</p>';
					break;
				default:
					echo '<p>Comando desconhecido</p>';
					break;
			}
		
		}
	}
}