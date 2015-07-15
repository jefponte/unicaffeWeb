<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="ISO-8859-1">	
  <title>UniCafe</title>
  <link rel="stylesheet" href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script>
	var auto_refresh = setInterval (function () {
		$.ajax({
			url: 'json/processa2.php',
			success: function (response) {
				$('#maquinas').html(response);
			}
		});
	}, 1000);
  </script>
</head>

<body>

<div id="barra-governo">
    <div class="resolucao">
       <div class="a-esquerda">
          <a href="http://brasil.gov.br/" target="_blank"><span id="bandeira"></span><span>BRASIL</span></a>
          <a href="http://acessoainformacao.unilab.edu.br/" target="_blank">Acesso à informação</a>
       </div>
       <div class="a-direita"><a href="#"><i class="icone-menu"></i></a></div>
       <ul>
          <li><a href="http://brasil.gov.br/barra#participe" target="_blank">Participe</a></li>
          <li><a href="http://www.servicos.gov.br/" target="_blank">Serviços</a></li>
          <li><a href="http://www.planalto.gov.br/legislacao" target="_blank">Legislação</a></li>
          <li><a href="http://brasil.gov.br/barra#orgaos-atuacao-canais" target="_blank">Canais</a></li>
       </ul>
    </div>
</div>
<div class="pagina">
    <div class="doze colunas fundo-verde2">
		<h1 class="titulo maximo centralizado texto-branco">UniCafe Web </h1>
	</div>	
	<div class="doze colunas barra-menu">
    <div class="menu-horizontal">
        <ol class="a-esquerda">
            <li><a href="#" class="item-ativo"><span class="icone-home3"></span> <span class="item-texto">Início</span></a></li>
        </ol>
        <ol class="a-direita" start="4"> <!-- Altere o valor do start de acordo com a quantidade de itens à esquerda -->
            <li><a href="#" class="item"><span class="icone-exit"></span> <span class="item-texto">Sair</span></a></li>
        </ol>
    </div>
</div>
<div class="onze colunas no-centro conteudo fundo-cinza1" id="maquinas">
<?php
include_once 'libs/unicafe.php';
include_once 'libs/model/Maquina.class.php';
include_once 'libs/model/Acesso.class.php';
include_once 'libs/model/Usuario.class.php';
include_once 'libs/dao/DAO.class.php';
include_once 'libs/dao/MaquinaDAO.class.php';

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
			echo '<div class="conteudo medio fundo-vermelho2">';
			echo '<div class="seis colunas a-esquerda ">
					<div class="doze colunas fundo-vermelho1 texto-branco linha">
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
				<div class="seis colunas a-direita fundo-vermelho2">
					<div class="doze a-esquerda colunas fundo-vermelho2 texto-branco ">
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
			echo '<div class="conteudo medio fundo-azul2">';
			echo '<div class="seis colunas a-esquerda ">
					<div class="doze colunas fundo-azul1 texto-branco linha">
						<div class="conteudo">
							<span class="icone-display centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
							.$maquina->getNome().
						'</div>
					</div>
					<div class="doze colunas fundo-azul1 texto-branco linha">
						<div class="conteudo">
							<span class="icone-clock centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
								.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).
						'</div>
					</div>
				</div>
				<div class="seis colunas a-direita fundo-azul2">
					<div class="doze a-esquerda colunas fundo-vazul2 texto-branco ">
						<div class="conteudo">
							<h1 class="icone-user centralizado"></h1>'
								.ucfirst(strtolower($maquina->getAcesso()->getUsuario()->getLogin())).
						'</div>
					</div>
				</div>';
		}
	} else {
		echo '<div class="conteudo medio fundo-cinza3">';
		echo '<div class="seis colunas a-esquerda ">
				<div class="doze colunas fundo-cinza2 texto-branco linha">
					<div class="conteudo">
						<span class="icone-display centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
						.$maquina->getNome().
					'</div>
				</div>
				<div class="doze colunas fundo-cinza2 texto-branco linha">
					<div class="conteudo">
						<span class="icone-clock centralizado">&nbsp;&nbsp;&nbsp;&nbsp;</span>'
							.gmdate("H:i:s",$maquina->getAcesso()->getTempoUsado()).
					'</div>
				</div>
			</div>
			<div class="seis colunas a-direita fundo-cinza3">
				<div class="doze a-esquerda colunas fundo-cinza3 texto-branco ">
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
</div>

</div>
  
</body>

</html>