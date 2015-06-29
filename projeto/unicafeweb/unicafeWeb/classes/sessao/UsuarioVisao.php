<?php
class UsuarioVisao{
	
	
	
	
	public function mostraFormLogin(){
		
		
		echo "<form action=\"\" method=\"post\">";
		echo "<input type=\"text\" name=\"login\" placeholder=\"login\" />";
		echo "<input type=\"password\" name=\"senha\" placeholder=\"senha\" />";
		echo "<input type=\"submit\" name=\"formlogin\" />";
		echo "</form>";
	}
	public function mostraLinkSair(){
		echo "<a href=\"sair.php\">Sair</a>";
	}
	public function mostraSaldacao($login){
		echo "<p>Seja bem-vindo, $login</p>";
	}
}



?>