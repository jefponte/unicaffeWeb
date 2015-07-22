<?php
class MenuController {
	public static function main() {
		$menuController = new MenuController();
		$menuController->menu();
		
		
	}
	
	public function menu(){
		$menuView = new MenuView ();
		$menuView->mostraMenu ();
		$this->observaSelecao();
	}
	public function menuEspecial(){
		$menuView = new MenuView ();
		$menuView->mostraMenuEspecial ();
		$this->observaMenuEspecial();
	}
	public function observaMenuEspecial()
	{
		if (isset ( $_GET ["listarlab"] ))
			LaboratorioController::main(LaboratorioController::BIBLIOTECA);
		else
			HomeController::main();
		
	}
	public function observaSelecao() {
		if (isset ( $_GET ["cadastroLab"] ))
			include './visao/cadastroLab.php';
		else if (isset ( $_GET ["listarlab"] )) {
			include './visao/listagemLab.php';
		} else if (isset ( $_GET ["cadastromaq"] )) {
			include './visao/cadastroLabMaq.php';
		} else if (isset ( $_GET ["listarmaq"] )) {
			include './visao/listagemMaquina.php';
		} else if (isset ( $_GET ["acessosmaq"] )) {
			include './visao/acessos.php';
		} else if (isset ( $_GET ["historico"] )) {
			include './visao/historicoMaq.php';
		} else if (isset ( $_GET ["comandos"] )) {
			include './visao/comandos.php';
		} else if (isset ( $_GET ["comando"] )) {
			if(isset($_GET['maquina']))
				print $_GET ["maquina"];
			include './visao/comandos.php';
		} else if (isset ( $_GET ["comando1"] )) {
			// print $_GET["maquina"];
			include './visao/comandos.php';
		} else if (isset ( $_GET ["editar"] )) {
			include './visao/listagemLab.php';
		} else if (isset ( $_GET ["editarmaq"] )) {
			include './visao/listagemMaquina.php';
		} else if (isset ( $_GET ["editarmaqlab"] )) {
			include './visao/editarLabMaq.php';
		} else if (isset ( $_GET ["vermaquina"] )) {
			include './visao/listagemLab.php';
		} else {
			HomeController::main();
		}
	}
}

?>