<?php
class Menu {
	public function mostraMenu() {
		$sessao = new Sessao ();
		switch ($sessao->getNivelAcesso ()) {
			case Sessao::NIVEL_COMUM :
				
				break;
			default :
				
				break;
		}
	}
}

?>