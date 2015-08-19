
function seleciona(comando, valor){
	location.href='?pagina=maquinas&comando='+comando+'&maquina='+valor;
}



function outroSeleciona(comando, valor, valor2){
	location.href='?pagina=maquinas&comando='+comando+'&maquina='+valor+'&laboratorio='+valor2;
}
$(document).ready(function(){
	
	context.init({preventDoubleContext: false});

	context.attach('.maquina-online', [
		{header: 'Comandos:'},
		{text: 'Desligar', action: function(e){
			enviaComando(1,that.id);
			}},
		{text: 'Aula', action: function(e){
			enviaComando(2,that.id);
		}},
		{text: 'Bloquear acesso',  action: function(e){
			enviaComando(4,that.id);
		}},
		{text:'Definir Laboratório', subMenu},
	]);
	
	
	$('.maquina-offline').bind("contextmenu",function(e){
		return false;
	});
	
	$(document).on('mouseover', '.me-codesta', function(){
		$('.finale h1:first').css({opacity:0});
		$('.finale h1:last').css({opacity:1});
	});
	
	$(document).on('mouseout', '.me-codesta', function(){
		$('.finale h1:last').css({opacity:0});
		$('.finale h1:first').css({opacity:1});
	});
	
});