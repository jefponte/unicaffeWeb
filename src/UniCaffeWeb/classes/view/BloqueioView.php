<?php
				
/**
 * Classe de visao para Bloqueio
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */				
class BloqueioView {
	public function mostraFormInserir() {	
	    date_default_timezone_set('America/Fortaleza');
	    $daquiUmDia = date ( 'Y-m-d', strtotime ( "+1 days" ) ) . 'T' . date ( 'G:i:s' );
		echo '<form action="" method="post">
					<fieldset>
						<legend>
							Adicionar Bloqueio
						</legend>
						<br>

						<label for="dataHoraFim">dataHoraFim:</label>
                        <br>

						<input type="datetime-local" value="'.$daquiUmDia.'" name="dataHoraFim" id="dataHoraFim" />
                        
                        <br>
						<label for="usuarioBloqueado">usuarioBloqueado:</label>
                        <br>

						<input type="text" name="usuarioBloqueado" id="usuarioBloqueado" />

                        <br>
						<label for="motivo">motivo:</label>
                        <br>

						<input type="text" name="motivo" id="motivo" />
            
                        <br>
						<input type="submit" name="enviar_bloqueio" value="Cadastrar">
					</fieldset>
				</form>';
	}	
}