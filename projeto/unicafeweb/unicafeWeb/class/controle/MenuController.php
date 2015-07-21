<?php

/**
 * Essa classe serve tanto para mostrar o menu, como para capturar o menu que foi selecionado. 
 * @author jefponte
 *
 */
class MenuController{
	
	
	public static function main()
	{
		$menuView = new MenuView();
		$menuView->mostraMenu();
		
	}
	
	public function capturaMenu(){
		
	}
	
}


?>