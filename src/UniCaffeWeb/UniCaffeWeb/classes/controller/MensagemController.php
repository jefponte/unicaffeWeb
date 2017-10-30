<?php


class MensagemController{
	
	
	public static function main($nivelDeAcesso){
		switch ($nivelDeAcesso) {
			case Sessao::NIVEL_SUPER :
				$controller = new MensagemController();
				$controller->telaMensagem();
				break;
			case Sessao::NIVEL_ADMIN:
				$controller = new MensagemController();
				$controller->telaMensagem();
				break;
			default:
				echo "Acesso negado";
				break;
		}
		
	}
	
	public function telaMensagem(){
		
		
		
	
		
		echo '<h1>Enviar mensagem a um laboratório</h1>
				<form action="" method="get">
							<input type="hidden" name="pagina" value="mensagens" />	
				<select name="laboratorio">';
		
		
		$laboratorioDao = new LaboratorioDAO();
		$lista = $laboratorioDao->retornaLaboratorios();
		foreach ($lista as $laboratorio){
			echo "<option value=".$laboratorio->getNome().">".$laboratorio->getNome()."</option>";
		
		}
		echo '</select>
			<br>
			<textarea name="mensagem"></textarea>
			<br>
			<input type="submit" name="enviar" />
			
			</form>
				';
		
		
		
		if(isset($_GET['mensagem'])){
		

			$mensagem = $_GET['mensagem'];
		
			$nomeLaboratorio = $_GET['laboratorio'];
			$strComando = "mensagemLaboatorio(".$nomeLaboratorio.", ".$mensagem.")";
				
			if(strlen($strComando) > 300){
				echo "Mensagem muito grande. Máximo 200 caracteres. ";
				
			}else{
				$unicafe = new UniCaffe();
				$resposta = $unicafe->dialoga($strComando);
				echo $resposta;
				
			}
		
		}
	
		
	}
	
}