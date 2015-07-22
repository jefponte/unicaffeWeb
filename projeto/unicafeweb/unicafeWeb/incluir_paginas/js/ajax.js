
// função para criar objeto ajax
// Variaveis globa para ajax!
var ajaxRequest; 
var ajaxUrl;
var ajaxStrQuery;
var ajaxDisplay;

//função ajax
function crearObjAjax(){    
    try{
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    } catch (e){
            // Internet Explorer Browsers
            try{
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e){
                            // Something went wrong
                            alert("Seu navegador não suporta ajax!");
                            return false;
                    }
            }
    }
}

function Ajax(url,dados,id){   

     msg = document.getElementById(id);
    
    //criar objeto ajax
    crearObjAjax();
    //url de envio
    ajaxUrl = "add_perm_menu.php?deletePerm=1";
    msg.innerHTML = "Carregando..."
    
    //enviando o dados
    ajaxRequest.open("GET",ajaxUrl,false);
    ajaxRequest.send();

    
    msg.innerHTML = ajaxRequest.responseText;
    
    
    
}

function carrega_lab(campo,tipo){
  //alert();
   //criar objeto ajax
  
  var op = document.getElementById.value="";

   var WxhReq = new XMLHttpRequest();
   WxhReq.open("GET", "busca_lab.php?queryString="+campo+"&tipo="+tipo,false);
   WxhReq.send(null);			
   var Wsvrs = WxhReq.responseText;
				//alert(Wsvrs);
   quebraStr=Wsvrs.split("-");
   //alert   (Wsvrs);
      html = "";
   
    
    
    for(var key in quebraStr) {
        html += "<option value=" + quebraStr[key] + ">" +key + "</option>"
    }
    document.getElementById("aa").innerHTML = html;
       
     
  
   
}


$(function(){

    /* funcções de requisição de ajax para ações em Pessoa*/

    $("#formCadastroPessoa").submit(function (){
        


        $.ajax({
        
            type: 'POST',
            
            url: 'requisicoes_de_pessoa.php',
            
            data: {
                butaoCadastroPessoa: 'true',
                nome        :$("#nomePessoa").val(),           
                email       :$("#emailPessoa").val(),
                cpf         :$("#cpf").val(),
                matricula   :$("#matriculaPessoa").val(),
                endereco    :$("#endPessoa").val(),
                nascimento  :$("#data").val(),
                sexo        :$("input[name='sexo']:checked").val()          
            }, 
            beforeSend : function (){
                $("#alerta").removeClass("alerta-sucesso");
                $("#alerta").removeClass("alerta-erro");

                $("#alerta").addClass("alerta-ajuda");
                $(".titulo-alerta").html("Aguarde, Carregando..");
                
            }, 
            success : function (resultado){
                if(resultado=="true"){
                    $("#alerta").removeClass("alerta-ajuda");
                    $("#alerta").removeClass("alerta-erro");

                    $("#alerta").addClass("alerta-sucesso");
                    $(".titulo-alerta").html("Cadastro realizado com sucesso!");
                    $("#nomePessoa").val("");           
                    $("#emailPessoa").val("");
                    $("#cpf").val("");
                    $("#matriculaPessoa").val("");
                    $("#endPessoa").val("");
                    $("#data").val("");

                }else{
                    $("#alerta").removeClass("alerta-ajuda");
                    $("#alerta").removeClass("alerta-sucesso");

                    $("#alerta").addClass("alerta-erro");
                    $(".titulo-alerta").html(resultado);
                      
                }
            }
                
        });

    
        return false;
    
    });
    
    $("#formListarPessoa").submit(function (){
        
      

        $.ajax({
        
            type: 'POST',
            
            url: 'requisicoes_de_pessoa.php',
            
            data: {
                formListarPessoa : 'true',
                op1         :$("#op1:checked").val(),
                nome        :$("#f_nome").val(),  
                
                op2         :$("#op2:checked").val(),    
                email       :$("#f_email").val(),
                
                op3         :$("#op3:checked").val(),  
                matricula   :$("#f_matricula").val(),
                
                op4         :$("#op4:checked").val(),  
                cpf         :$("#cpf").val()               

                        
            }, 
            beforeSend : function (){
                $("#alerta").removeClass("alerta-sucesso");
                $("#alerta").removeClass("alerta-erro");

                $("#alerta").addClass("alerta-ajuda");
                $(".titulo-alerta").html("Aguarde, Carregando..");
                
            }, 
            success : function (resultado){

                var resp = resultado.substr(0,1);
                

                $("#alerta").removeClass("alerta-ajuda");
                $(".titulo-alerta").html("");
                


                if(resp == "-"){

                    $("#tabelaListaPessoa").show();
                    $("#tabelaListaPessoa tbody").html(resultado);

                }else{

                    $("#alerta").addClass("alerta-erro");
                    $(".titulo-alerta").html(resultado);                    
                }
                      
               
            }
                
        });

    
        return false;
    
    });


});

