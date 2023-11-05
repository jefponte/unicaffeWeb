
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
        		{text: 'Atualizar', action: function(e){
                        enviaComando(26,that.id);
                        }},
                {text: 'Manutenção', action: function(e){
                     enviaComando(300,that.id);
                            }},
                {text: 'Limpeza', action: function(e){
                   	 enviaComando(10,that.id);
                        }},
        		{text: 'Aula', action: function(e){
        			enviaComando(2,that.id);
        		}},
        		{text: 'Sem Internet',  action: function(e){
        			enviaComando(321,that.id);
        		}},
        		{text: 'Com Internet',  action: function(e){
        			enviaComando(123,that.id);
        		}},
        		{text: 'Bloquear acesso',  action: function(e){
        			enviaComando(4,that.id);
        		}},
        		{text:'Definir Laborat&oacute;rio', subMenu},
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
       