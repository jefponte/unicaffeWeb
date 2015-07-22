

function mostraDiv(id,div2)

{
    alert(id);
var divstyle = new String();        
divstyle = document.getElementById(id).style.display;

var divAux = new String();        
divAux = document.getElementById(div2).style.display;
      
      if (divAux=="block" || divAux == ""){
	   document.getElementById(div2).style.display = "none";
	}   
	
	document.getElementById(id).style.display = "block"; 
 
}

// JavaScript Document
var contem_mascara_fundo = "";


function cria_display(botao_fechar,mascara){
   
	contem_mascara_fundo = mascara;
	
	var style_display1 = "display:none; position:fixed; top:1.5%;left:1%;  padding:10px; width:400; height:200; background:#FFF; border: 2px solid #999;z-index:11;";
	var style_display2 = "display:none; position:fixed; top:0; left:0; border:1px solid #d0d0d0; background:#000; width:100%; height:180%; z-index:10; opacity:.75;";
	var style_display3 = "style='z-index:1; overflow: scroll;'";
			
	var div_display = cria_div("display_central","",style_display1,"","","1","","","","","onmousedown|onmouseup|","inicia_movimento();|para_display();|");
	var div_barra_rolagem = cria_div("barra_rolagem_display","",style_display3,"","","1","","","","","",""); 
	var div_conteudo_central = cria_div("div_conteudo_central","","","","","1","","","","","","");
	
	if(contem_mascara_fundo)
		var div_mascara = cria_div("mascara_fundo_op","",style_display2,"","","1","","","","","","");			
	
	var body_pag = document.getElementsByTagName("body");
				
	div_barra_rolagem.appendChild(div_conteudo_central);
	div_display.appendChild(div_barra_rolagem);
				
	if(botao_fechar){
		var botao_fechar = cria_campo_botao("id_bt_fch_display","","onclick|","fecha_display();|","Fechar","","","1","","","","");
		var div_botao_fcehar = cria_div("div_botao_fcehar_fch","","style='width:10%%;'","","","","","","","","","");
					 
		div_botao_fcehar.setAttribute("align","right");
		div_botao_fcehar.appendChild(botao_fechar);
		div_display.appendChild(div_botao_fcehar);
	}
				
	body_pag = body_pag[0];				
	body_pag.appendChild(div_display);
	
	if(contem_mascara_fundo)
		body_pag.appendChild(div_mascara);	
}			
function preenche_display(url,larg,alt){
    
	document.getElementById('display_central').style.display='block'; 
	
	if(contem_mascara_fundo)
		document.getElementById('mascara_fundo_op').style.display='block';				
				
	var WxhReq = new XMLHttpRequest();
	WxhReq.open("GET",url, false);
	WxhReq.send(null);
	var Wsvrs = WxhReq.responseText;
	var div = document.getElementById("div_conteudo_central");
	div.innerHTML = Wsvrs;
				
	div = document.getElementById('barra_rolagem_display');
	div.style.width = larg;
	div.style.height = alt;
}
function fecha_display(){
	document.getElementById('display_central').style.display='none'; 
	
	if(contem_mascara_fundo)
		document.getElementById('mascara_fundo_op').style.display='none';				
}
function inicia_movimento(){
	//document.captureEvents(Event.CLICK);
	//document.onmousemove = movimenta_display;
}
function para_display(){
	//document.onmousemove = "";
}
function movimenta_display(e){
	var display_central = document.getElementById("display_central");	
	var y = e.clientY;
	var x = e.clientX;
	
	y = y - 50;
	x = x - 50;
	
	display_central.style.top  = y + "px";
	display_central.style.left = x + "px"; 
}




// JavaScript Document
