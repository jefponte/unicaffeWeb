<?php	

/**
 * Classe feita para manipulação do objeto Bloqueio
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */
class BloqueioController {
	private $post;
	private $view;
	public function __construct(){		
		$this->view = new BloqueioView();
		foreach($_POST as $chave => $valor){
			$this->post[$chave] = $valor;
		}
	}
	public function cadastrar($idResponsavel) {
		$this->view->mostraFormInserir();
        if(!isset($this->post['enviar_bloqueio'])){
		    return;
		}
		if (! ( isset ( $this->post ['dataHoraFim'] ) && isset ( $this->post ['usuarioBloqueado'] ) && isset ( $this->post ['motivo'] ))) {
			echo "Incompleto";
			return;
		}
		
		$bloqueio = new Bloqueio ();		
		date_default_timezone_set('America/Fortaleza');
		$bloqueio->setDataHoraInicio ( date ( "Y-m-d G:i:s" ) );		
		$bloqueio->setDataHoraFim ( $this->post ['dataHoraFim'] );		
		$bloqueio->setUsuarioResponsavel ( $idResponsavel );		
		$bloqueio->setUsuarioBloqueado ( $this->post ['usuarioBloqueado'] );		
		$bloqueio->setMotivo ( $this->post ['motivo'] );	
		$bloqueioDao = new BloqueioDAO ();
		if ($bloqueioDao->inserir ( $bloqueio )) {
			echo "Sucesso";
		} else {
			echo "Fracasso";
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=index.php?pagina=bloqueio">';
	}
				
	public function listarJSON() {
		$bloqueioDao = new BloqueioDAO ();
		$lista = $bloqueioDao->retornaLista ();
		$listagem ['lista'] = array ();
		foreach ( $lista as $linha ) {
			$listagem ['lista'] [] = array (
					'id' => $linha->getId (), 
					'dataHoraInicio' => $linha->getDataHoraInicio (), 
					'dataHoraFim' => $linha->getDataHoraFim (), 
					'usuarioResponsavel' => $linha->getUsuarioResponsavel (), 
					'usuarioBloqueado' => $linha->getUsuarioBloqueado (), 
					'motivo' => $linha->getMotivo ()
						
						
			);
		}
		echo json_encode ( $listagem );
	}			
	public function listar() {
		$bloqueioDao = new BloqueioDAO ();
		$lista = $bloqueioDao->retornaLista ();
		echo '<table border="1">';
			echo '<th>Id</th>';
			echo '<th>DataHoraInicio</th>';
			echo '<th>DataHoraFim</th>';
			echo '<th>UsuarioResponsavel</th>';
			echo '<th>UsuarioBloqueado</th>';
			echo '<th>Motivo</th>';
		foreach ( $lista as $bloqueio) {
			echo '<tr>';		
		
			echo '<td>'.$bloqueio->getId ().'</td>';
			echo '<td>'.$bloqueio->getDataHoraInicio ().'</td>';
			echo '<td>'.$bloqueio->getDataHoraFim ().'</td>';
			echo '<td>'.$bloqueio->getUsuarioResponsavel ().'</td>';
			echo '<td>'.$bloqueio->getUsuarioBloqueado ().'</td>';
			echo '<td>'.$bloqueio->getMotivo ().'</td>';
			echo '</tr>';
		}
		echo '</table>';
		
		
	}			
	
		
}
?>