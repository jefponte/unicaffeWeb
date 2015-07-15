<?php
include_once '../libs/unicafe.php';
include_once '../libs/model/Maquina.class.php';
include_once '../libs/model/Acesso.class.php';
include_once '../libs/model/Usuario.class.php';
include_once '../libs/dao/DAO.class.php';
include_once '../libs/dao/MaquinaDAO.class.php';

$dao = new MaquinaDAO();
$lista = $dao->retornaListaDoJSON();
$x = 0;
foreach($lista as $maquina){

	echo '<div class="duas colunas centralizado';
	
	if ($x==6){
		echo ' linha">';
		$x=0;
	}else {
		echo '">';
	}
	if ($maquina->getAcesso()->getStatus() == 0) {

		if ($maquina->getAcesso()->getTempoUsado() >= 3600) {
			echo '<div class="conteudo medio fundo-marrom3">';
			echo '<div class="seis colunas a-esquerda ">
					<div class="doze colunas fundo-marrom1 texto-branco linha">
						<div class="conteudo">
							<span class="icone-display centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
							.$maquina->getNome().
						'</div>
					</div>
					<div class="doze colunas fundo-marrom1 texto-branco linha">
						<div class="conteudo">
							<span  class="icone-clock centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
								.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).
						'</div>
					</div>
				</div>
				<div class="seis colunas a-direita fundo-marrom3">
					<div class="doze a-esquerda colunas fundo-marrom3 texto-branco ">
						<div class="conteudo">
							<h1 class="icone-user centralizado"></h1>'
								.ucfirst(strtolower($maquina->getAcesso()->getUsuario()->getLogin())).
						'</div>
					</div>
				</div>';
		} elseif (($maquina->getAcesso()->getTempoUsado() > 3000)&&($maquina->getAcesso()->getTempoUsado() < 3600)) {
			echo '<div class="conteudo medio fundo-laranja2">';
			echo '<div class="seis colunas a-esquerda ">
					<div class="doze colunas fundo-laranja1 texto-branco linha">
						<div class="conteudo">
							<span class="icone-display centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
							.$maquina->getNome().
						'</div>
					</div>
					<div class="doze colunas fundo-laranja1 texto-branco linha">
						<div class="conteudo">
							<span class="icone-clock centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
								.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).
						'</div>
					</div>
				</div>
				<div class="seis colunas a-direita fundo-laranja2">
					<div class="doze a-esquerda colunas fundo-laranja2 texto-branco ">
						<div class="conteudo">
							<h1 class="icone-user centralizado"></h1>'
								.ucfirst(strtolower($maquina->getAcesso()->getUsuario()->getLogin())).
						'</div>
					</div>
				</div>';
		} else {
			echo '<div class="conteudo medio fundo-vermelho2">';
			echo '<div class="seis colunas a-esquerda ">
					<div class="doze colunas  fundo-vermelho1  texto-branco linha">
						<div class="conteudo">
							<span class="icone-display centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
							.$maquina->getNome().
						'</div>
					</div>
					<div class="doze colunas fundo-vermelho1 texto-branco linha">
						<div class="conteudo">
							<span class="icone-clock centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
								.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).
						'</div>
					</div>
				</div>
				<div class="seis colunas a-direita  fundo-vermelho2">
					<div class="doze a-esquerda colunas fundo-vazul2 texto-branco ">
						<div class="conteudo">
							<h1 class="icone-user centralizado"></h1>'
								.ucfirst(strtolower($maquina->getAcesso()->getUsuario()->getLogin())).
						'</div>
					</div>
				</div>';
		}
	} else {
		echo '<div class="conteudo medio fundo-limao3">';
		echo '<div class="seis colunas a-esquerda ">
				<div class="doze colunas fundo-limao1 texto-branco linha">
					<div class="conteudo">
						<span class="icone-display centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
						.$maquina->getNome().
					'</div>
				</div>
				<div class="doze colunas fundo-limao1  texto-branco linha">
					<div class="conteudo">
						<span class="icone-clock centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
							.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).
					'</div>
				</div>
			</div>
			<div class="seis colunas a-direita fundo-limao3">
				<div class="doze a-esquerda colunas fundo-limao3 texto-branco ">
					<div class="conteudo">
						<h1 class="icone-user centralizado"></h1>'
							.'[Livre]'.
					'</div>
				</div>
			</div>';
	}	
	echo '</div>';
	echo '</div>';
	$x++;
}


?>