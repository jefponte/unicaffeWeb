<?php
		
/**
 * Classe feita para manipulação do objeto Bloqueio
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 *
 *
 */
class BloqueioDAO extends DAO {
	
	
	public function inserir(Bloqueio $bloqueio){
		
		$sql = "INSERT INTO bloqueio(data_hora_inicio, data_hora_fim, id_usuario_responsavel, id_usuario_bloqueado, motivo)
				VALUES(:dataHoraInicio, :dataHoraFim, :usuarioResponsavel, :usuarioBloqueado, :motivo)";
			$dataHoraInicio = $bloqueio->getDataHoraInicio();
			$dataHoraFim = $bloqueio->getDataHoraFim();
			$usuarioResponsavel = $bloqueio->getUsuarioResponsavel();
			$usuarioBloqueado = $bloqueio->getUsuarioBloqueado();
			$motivo = $bloqueio->getMotivo();
		try {
			$db = $this->getConexao();
			$stmt = $db->prepare($sql);		
			$stmt->bindParam("dataHoraInicio", $dataHoraInicio, PDO::PARAM_STR);		
			$stmt->bindParam("dataHoraFim", $dataHoraFim, PDO::PARAM_STR);		
			$stmt->bindParam("usuarioResponsavel", $usuarioResponsavel, PDO::PARAM_STR);		
			$stmt->bindParam("usuarioBloqueado", $usuarioBloqueado, PDO::PARAM_STR);		
			$stmt->bindParam("motivo", $motivo, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
	public function excluir(Bloqueio $bloqueio){
		$id = $bloqueio->getId();
		$sql = "DELETE FROM bloqueio WHERE id = :id";
		
		try {
			$db = $this->getConexao();
			$stmt = $db->prepare($sql);
			$stmt->bindParam("id", $id, PDO::PARAM_INT);
			return $stmt->execute();
	
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
	public function alterar(){
		//Aqui vc escreve o codigo pra alterar bloqueio
	
	}
	
	public function retornaLista() {
		$lista = array ();
		$sql = "SELECT * FROM bloqueio LIMIT 1000";
		$result = $this->getConexao ()->query ( $sql );
	
		foreach ( $result as $linha ) {
				
			$bloqueio = new Bloqueio();

			$bloqueio->setId( $linha ['id'] );
			$bloqueio->setDataHoraInicio( $linha ['dataHoraInicio'] );
			$bloqueio->setDataHoraFim( $linha ['dataHoraFim'] );
			$bloqueio->setUsuarioResponsavel( $linha ['usuarioResponsavel'] );
			$bloqueio->setUsuarioBloqueado( $linha ['usuarioBloqueado'] );
			$bloqueio->setMotivo( $linha ['motivo'] );
			$lista [] = $bloqueio;
		}
		return $lista;
	}			
				
}