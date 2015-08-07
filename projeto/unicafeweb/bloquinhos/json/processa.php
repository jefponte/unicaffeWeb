<?php
//VERSÃO ANTIGA
include_once '../classes/model/Maquina.class.php';
include_once '../classes/model/Acesso.class.php';
include_once '../classes/model/Usuario.class.php';
include_once '../classes/dao/DAO.class.php';
include_once '../classes/dao/MaquinaDAO.class.php';

$dao = new MaquinaDAO();
$lista = $dao->retornaListaDoJSON();

foreach($lista as $maquina){

	echo '<div class="tres colunas centralizado';
	if ($x==4){
		echo ' linha">';
		$x=0;
	}else {
		echo '">';
	}
	//$maquina->getAcesso()->getTempoUsado();
	echo '<div class="conteudo medio">';
	if ( $maquina->getAcesso()->getUsuario()->getLogin() != "Não identificado") {
		if ($maquina->getAcesso()->getTempoUsado() >= 3600) {
			echo '<div class="quatro colunas fundo-vermelho1 texto-branco"><div class="conteudo"><h1 class="icone-display centralizado"></h1>'.$maquina->getNome().'</div></div><div class="quatro colunas fundo-vermelho2 texto-branco "><div class="conteudo"><h1 class="icone-user centralizado"></h1>'.$maquina->getAcesso()->getUsuario()->getLogin(). '</div></div> <div class="quatro colunas fundo-vermelho1 texto-branco "><div class="conteudo"><h1 class="icone-clock centralizado"></h1>'.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).'</div></div>';
		} elseif (($maquina->getAcesso()->getTempoUsado() > 3000)&&($maquina->getAcesso()->getTempoUsado() < 3600)) {
			echo '<div class="quatro colunas fundo-laranja1 texto-branco"><div class="conteudo"><h1 class="icone-display centralizado"></h1>'.$maquina->getNome().'</div></div><div class="quatro colunas fundo-laranja3 texto-branco "><div class="conteudo"><h1 class="icone-user centralizado"></h1>'.$maquina->getAcesso()->getUsuario()->getLogin(). '</div></div> <div class="quatro colunas fundo-laranja1 texto-branco "><div class="conteudo"><h1 class="icone-clock centralizado"></h1>'.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).'</div></div>';
		} else {
			echo '<div class="quatro colunas fundo-azul1 texto-branco"><div class="conteudo"><h1 class="icone-display centralizado"></h1>'.$maquina->getNome().'</div></div><div class="quatro colunas fundo-azul3 texto-branco "><div class="conteudo"><h1 class="icone-user centralizado"></h1>'.$maquina->getAcesso()->getUsuario()->getLogin(). '</div></div> <div class="quatro colunas fundo-azul1 texto-branco "><div class="conteudo"><h1 class="icone-clock centralizado"></h1>'.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).'</div></div>';
		}
	} else {
		echo '<div class="quatro colunas fundo-cinza2 texto-branco"><div class="conteudo"><h1 class="icone-display centralizado"></h1>'.$maquina->getNome().'</div></div><div class="quatro colunas fundo-cinza3 texto-branco "><div class="conteudo"><h1 class="icone-user centralizado"></h1> Livre </div></div> <div class="quatro colunas fundo-cinza2 texto-branco "><div class="conteudo"><h1 class="icone-clock centralizado"></h1>'.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).'</div></div>';
	}	
	echo '</div>';
	echo '</div>';
	$x++;
}


?>