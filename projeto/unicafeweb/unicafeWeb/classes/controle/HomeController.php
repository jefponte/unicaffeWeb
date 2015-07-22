<?php


class HomeController{
	
	
	public static function main(){
		
		
		$homeController = new HomeController();
		$homeController->paginaInicial();
		
		
	}
	public function paginaInicial(){
		$homeView = new HomeView();
		$homeView->mostraConteudoHome();
	}
	
}