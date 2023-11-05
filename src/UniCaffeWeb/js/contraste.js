$(document).ready(function () {
    //Ativar e desativar o contraste
    function gerarCookie(strCookie, strValor, lngDias) {
        $.cookie(strCookie, strValor, {expires : lngDias, path: '/'});
    }
    $("#contraste").click(function(){
        if ($.cookie('contraste') != 'true' ){
              gerarCookie('contraste', 'true', 7);
              $("#css").attr("href", "css/contraste.css");
	      $("#contraste").attr("title", "Desativar contraste");
        }else{
              gerarCookie('contraste', 'false', 7);
              $("#css").attr("href", "");
	      $("#contraste").attr("title", "Ativar contraste");
        }
    });
});
