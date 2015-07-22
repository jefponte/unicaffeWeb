/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function letras_maiusculas(campo){
    
    campo.value = campo.value.toUpperCase();
}

function MostrarEsconderMensagem(id){
    $("#"+id).toggle();
}

function Adicionar(idTab,nOption){
            
    createInputs = "";
    inputValues = new Array();
    inputValuesId = new Array();

    for(i = 1; i <= nOption; i++){

        inputValues[i] = $("#op"+i).val();
        inputValuesId[i] =  inputValues[i].split(" - ",1);     
    }

    createInputs = "<tr>";

    for(cols = 1; cols <= nOption; cols++){
        inputValues[cols] = inputValues[cols].split(" - ");
        
        createInputs += "<td><input type='text' name='inputDesc"+cols+"[]' value='"+inputValues[cols][1]+"' style='border:0;' readonly/>";
        createInputs += "<input type='hidden' name='input"+cols+"[]' value='"+inputValuesId[cols]+"' style='border:0;' readonly/>";
        createInputs += "</td>";
    }
    createInputs += "<td><a href='#' onclick='excluir(this);'>Remover</a></td</tr>";
    
    $("#"+idTab+" tbody").append(createInputs);
    $("#bt_disabled").removeAttr("disabled");

                
}


function excluir(linha){
    var tr = $(linha).closest('tr');
    tr.fadeOut(400, function(){ 
      tr.remove(); 
    }); 
}


/*
    função para gerar mascaras para formalarios
    
*/
$(function(){

    $("#data").mask("99/99/9999"); //mascara para data
    $("#cpf").mask("999.999.999-99"); // mascara para CPF


});