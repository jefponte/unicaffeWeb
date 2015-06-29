/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Legendas dos tipos de campos
 * 
 * TEXT = 1, EMAIL = 2, ENDERECO = 3
 */
function mostraDiv(id,div2)

{
   
var divstyle = new String();        
divstyle = document.getElementById(id).style.display;

var divAux = new String();        
divAux = document.getElementById(div2).style.display;
      
      if (divAux=="block" || divAux == ""){
	   document.getElementById(div2).style.display = "none";
	}   
	
	document.getElementById(id).style.display = "block"; 
 
}
function carrega_lab_(campo,tipo){
   alert();
   //criar objeto ajax
   crearObjAjax();
   //parametros de envio 
   ajaxUrl = "busca_lab.php";
   ajaxStrQuery = "?queryString="+campo+"&tipo="+tipo;
   //enviando o dados
   ajaxRequest.open("GET",ajaxUrl+ajaxStrQuery,false);
   ajaxRequest.send(); 
   
   
    var quebraStr = ajaxRequest.responseText;     
    alert(quebraStr);
   
    document.getElementById("msg-ok").innerHTML="<p><strong>Carregando...</strong></p><a href='' class='close'>close</a>";
   
   
   document.getElementById("list").innerHTML = "";
   
   var quebraStr = ajaxRequest.responseText;         
   
           
           
   for(var i=0; i < quebraStr.length-1; i++){
       //quebrando a string de acordo com o caractere '-' 

       var op = document.createElement("option");
       op.value = quebraStr[i];
       document.getElementById("list").appendChild(op); 
       
   }
   
              
               
   
   
}

function lookup(inputString,tipo) {
                alert();
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("busca_lab.php", {queryString: ""+inputString+"",tipo:""+tipo+""}, function(data){
				if(data.length >0) {
                                    
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}


function valida_texto(e){
    
    
    var tecla = e.charCode ? e.charCode : e.keyCode;
   
    
    if (tecla != 32 && tecla !=008 && tecla != 46 && tecla != 37 && tecla != 39 && tecla != 9){ 
        if (tecla<65 || tecla>122){            
            return false;
        }
    }    
    
}
function valida_texto_num(e){
    
    
    var tecla = e.charCode ? e.charCode : e.keyCode;
   
    
    if (tecla != 32 && tecla != 008){ 
        if (tecla<65 || tecla>122){
            if (tecla < 48 || tecla > 57){

                return false;
            }
        }
    }
     
    
}

function form_maquina(e,campo){
    
    
    var tecla = e.charCode ? e.charCode : e.keyCode;
   
    if(campo==1){
     document.getElementById('campo_service').innerHTML ="";
        if (tecla != 32 && tecla != 008){ 
            if (tecla<65 || tecla>122){
                if (tecla < 48 || tecla > 57){
                    document.getElementById('campo_service').innerHTML ="<font color=red>"+ "Digite apenas letras e números!"  +"</font>";

                    return false;
                }
            }
        }
    }
    if(campo==2){
        document.getElementById('campo_mac').innerHTML="";
         if (tecla != 32 && tecla != 008 && tecla!=58){ 
        if (tecla<65 || tecla>122){
            if (tecla < 48 || tecla > 57){
                document.getElementById('campo_mac').innerHTML ="<font color=red>"+ "Digite apenas letras, números e o sinal : !"  +"</font>";
               //msg.innerHTML = "Digite apenas letras , números e :.";
                return false;
            }
            else{
               
            }
        }
    }
    }
    
}




function numeros(e){  
    
    var tecla = e.keyCode;  
    if (tecla >= 48 && tecla <= 57){  
        return true;  
    }else{  
       return false;  
    }  
} 

function numeros_ponto(e,id_msg){ 
   var msg = document.getElementById(id_msg);

    
    var tecla = e.keyCode;  
    if (tecla >= 48 && tecla <= 57 || tecla==46){  
        return true;  
    }else{  
       msg.innerHTML = "Digite apenas números e pontos";
       return false;  
    }  
} 

function valida_email(email,id){
   var msg = document.getElementById(id);  
   
   if(email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1){
       msg.innerHTML = "Email inválido.";
       email.focus();
       return false;
   }
   msg.innerHTML = "";
}
function validaCPF(campo,id){

   var cpf = campo.value;
   var msg = document.getElementById(id);  
   var numeros, digitos, soma, i, resultado, digitos_iguais;
   digitos_iguais = 1;

   if (cpf.length < 11){
       msg.innerHTML = "CPF inválido.";
       campo.focus();
       return false;
   }
   for (i = 0; i < cpf.length - 1; i++){
       if (cpf.charAt(i) != cpf.charAt(i + 1))
       {
           digitos_iguais = 0;
           break;
       }
   }
   if (!digitos_iguais)
   {
       numeros = cpf.substring(0,9);
       digitos = cpf.substring(9);
       soma = 0;
       for (i = 10; i > 1; i--){
           soma += numeros.charAt(10 - i) * i;
       }
       resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
       if (resultado != digitos.charAt(0)){
           msg.innerHTML = "CPF inválido.";
           campo.focus();
           return false;
       }
       numeros = cpf.substring(0,10);
       soma = 0;
       for (i = 11; i > 1; i--){
           soma += numeros.charAt(11 - i) * i;
       }
       resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
       if (resultado != digitos.charAt(1)){
           msg.innerHTML = "CPF inválido.";
           campo.focus();
           return false;
       }
       msg.innerHTML = "";
       return true;
   }
   else{
       msg.innerHTML = "CPF inválido.";
       campo.focus();
       return false;
   }
}

function valida_matricula(matricula,id){
   var msg = document.getElementById(id);
   if(!vazio(matricula,id)){
        return false;
    }
    if(matricula < 10){       
       msg.innerHTML = "Matricula inválida. Matricula não pode ser menor que 10 números.";
       matricula.focus();
       return false;
    } 
    if(isNaN(matricula.value)){
       msg.innerHTML = "Matricula inválida.";
       matricula.focus();
       return false;
    }
    
    msg.innerHTML = "";
    return false;
    
}


function vazio(campo,id){
    var msg = document.getElementById(id);  
    if(campo.value == ""){
        msg.innerHTML = "Campo vazio.";
        campo.focus();
        return false;
    } 
    
    msg.innerHTML = "";    
    return true;
}

function marca_check(id){
   
    document.getElementById(id).checked=true;
    
    
    
}


function mascaraData(data){
   


}


