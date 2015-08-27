<?php


class HomeView{
	
	public static function main(){
		$homeView = new HomeView();
		$homeView->mostraPaginaInicial();
	}
	public function mostraPaginaInicial(){
		echo '		<div class="linha doze colunas fundo-azul linha-inicio">
			<div class="conteudo">
				<div class="seis a-esquerda">
					<p class="conteudo centralizado">
						<img alt="logotipo Unicaffé" src="img/unicaffe_logo.png" class="imagem-responsiva" />	
					</p>
				</div>	
				<div class="seis a-direita">
					<p class="justificado texto-branco maximo conteudo">Sistema que integra alguns softwares e serve para controle de utilização de PCs em laboratórios de informática no contexto de uma universidade. Além de possibilitar uma maior transparência e isonomia na forma como os acessos são controlados; oferece aos usuários maior aproveitamento possível das máquinas, por exigir rotatividade apenas quando houver lotação; e mantém um registro de todos os acessos de cada usuário, possibilitando auditorias ou relatórios para a sociedade.</p>
				</div>
			</div>
		</div>
		
		<div class="linha doze colunas fundo-marrom linha-inicio">
			<div class="conteudo">
				<div class="seis a-esquerda">
					<p class="justificado texto-branco maximo conteudo">O acesso aos laboratórios poderá ser feito através do sistema SIGAA. Docente, discente, técnicos administrativos e demais colaboradores da universidade, devidamente cadastrados no sistema SIGAA poderão acessar utilizando seu login e senha. Em cada período, o Unicaffé disponibilizará 01 (uma) hora de acesso para cada usuário, podendo ser estendido automaticamente se o laboratório não estiver operando em sua capacidade máxima.</p>
				</div>	
				<div class="seis a-direita">
					<p class="conteudo centralizado">
						<img alt="logotipo Unicaffé" src="img/unicaffe_logo.png" class="imagem-responsiva" />	
					</p>
				</div>
			</div>
		</div>
		
		<div class="linha doze colunas fundo-azul linha-inicio">
			<div class="conteudo">
				<div class="seis a-esquerda">
					<h2 class="conteudo meio">
						<a class="botao b-sucesso" href="#link-para-download">Baixar Unicaffé</a>
					</h2>
				</div>	
				<div class="seis a-direita">
					<p class="justificado texto-branco maximo conteudo">Sistema que integra alguns softwares e serve para controle de utilização de PCs em laboratórios de informática no contexto de uma universidade. Além de possibilitar uma maior transparência e isonomia na forma como os acessos são controlados; oferece aos usuários maior aproveitamento possível das máquinas, por exigir rotatividade apenas quando houver lotação; e mantém um registro de todos os acessos de cada usuário, possibilitando auditorias ou relatórios para a sociedade.</p>
				</div>
			</div>
		</div>';
		
	}
	
	
}