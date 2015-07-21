<?php


class HomeView{
	
	public function conteudoPaginaInicial(){
		
		echo '<div class="resolucao">
		<div class="conteudo fundo-branco">
		
			<h1>Seja bem-vindo(a),</h1>
			<br />
			<p>Esse é um sistema de gerenciamneto de laborat&oacute;rio, onde
				será possível cadastrar máquinas e laborat&oacute;rios, bem como
				monitorar máquinas e enviar comandos, como por exemplo:</p>
			<br />
			<p></p>
			<br />
		
			<ol>
				<li>Desligar m&aacute;quinas</li>
				<li>Bloquear</li>
				<li>Liberar</li>
			</ol>
			<br /> <br />
		</div>';
		
	}
	public function mostraRodape(){
		echo '<div class="doze colunas medio centralizado">
			<div class="conteudo">
		        Desenvolvido pela Divisão de Suporte (DISUP) CopyRigth 2015 - DTI/UNILAB.
			</div>
		</div>';
	}
	
}