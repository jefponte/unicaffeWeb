<?php


class HomeView{
	
	public static function main(){
		$homeView = new HomeView();
		$homeView->mostraPaginaInicial();
	}
	public function mostraPaginaInicial(){
		echo '<div class="linha doze colunas fundo-azul linha-inicio">
			<div class="conteudo">
				<a name="unicaffe"></a>
				<div class="seis a-esquerda">
					<p class="conteudo centralizado">
						<img alt="logotipo Unicaffé" src="img/logo1_unicaffe.png" class="imagem-responsiva" />	
					</p>
				</div>	
				<div class="seis a-direita">
					<p class="justificado texto-branco maximo conteudo">
				

O UniCaffé (Sistema de Controle de Acesso de Laboratórios de Universidade), 
é um conjunto de softwares que permite que os laboratórios de informática 
tornem-se autogerenciados na medida em que dispensa necessidade de um 
 atendente. 
			
Qualquer membro da comunidade poderá ter acesso a um PC com UniCaffé através de suas 
credenciais do sistema acadêmico da universidade, recebendo inicialmente uma hora de acesso. 
Ao findar essa hora de acesso o tempo é automaticamente estendido enquanto o 
laboratório não estiver lotado, permitindo uma maximização do potencial de
utilização de acesso das máquinas do laboratório de informática. 


					</p>
				
					
				</div>
			</div>
		</div>
		
		<div class="linha doze colunas fundo-marrom linha-inicio">
			<div class="conteudo">
				<a name="unicaffe_web"></a>
				<div class="seis a-esquerda">
					<p class="justificado texto-branco maximo conteudo">
				
UniCafféWeb é o serviço disponibilizado por esta pagina que, 
além de disponibilizar informação tempo real do panorama geral 
dos laboratórios de informática que utilizem UniCaffé, dispõe 
de ferramenta administrativa com a qual é possível enviar comandos 
de desligar, ligar, bloquear acesso, etc. 
				
				
				</p>
				</div>	
				<div class="seis a-direita">
					<p class="conteudo centralizado">
						<img alt="logotipo Unicaffé" src="img/logo2_unicaffe.png" class="imagem-responsiva" />	
					</p>
				</div>
			</div>
		</div>
		<div class="linha doze colunas fundo-azul linha-inicio">
			<div class="conteudo">
				<a name="LABPATI"></a>
				<div class="seis a-esquerda">
					<p class="conteudo centralizado">
						
						<img alt="logotipo Unicaffé" width="600" src="img/logo_labpati2.png" class="imagem-responsiva" />	
						<a href="http://dti.unilab.edu.br"><img alt="logotipo DTI" width="250"  src="img/logo_h-site.png" /></a> &nbsp; &nbsp;
						<a href="http://unilab.edu.br"><img alt="logotipo UNILAB" width="300"  src="img/logo_unilab.png"  /></a> 
					</p>
				</div>	
				<div class="seis a-direita">
					<p class="justificado texto-branco maximo conteudo">
					
				
O LABPATI - Laboratório de Projetos de Automação e Tecnologias Inovadoras surgiu
da necessidade em desenvolver soluções de hardware e software para a UNILAB, Universidade 
da Integração Internacional da Lusofonia Afro-Brasileira. 
O laboratório é composto por uma equipe de técnicos em laboratório de 
informática lotados na DISUP/DTI, tendo como objetivo a realização de projetos de 
inovação, pesquisa e extensão voltados às áreas de T.I, com ênfase na sustentabilidade,  
baixo custo de produção e suporte.
				
					</p>
				<p class="justificado texto-branco maximo"> Equipe do LABPATI: </p>
				<ul class="justificado texto-branco maximo">
					<li>Jefferson Uchôa Ponte</li>
					<li>Erivando de Sena Ramos</li>
					<li>Francisco Giovanildo Teixeira de Souza</li>
					<li>David Flavio de Lima Menezes</li>
					<li>Alan Cleber Morais Gomes</li>
				</ul>
				</div>
			</div>
		</div>';
		
	}
	
	
}