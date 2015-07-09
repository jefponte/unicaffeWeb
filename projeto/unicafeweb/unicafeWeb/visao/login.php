<?php
$erro=FALSE;
if(isset($_POST['formlogin']))
    
{
    $usuarioDAO = new UsuarioDAO();
    $usuario = new Usuario();
    $usuario->setLogin($_POST['login']);
    $usuario->setSenha($_POST['senha']);
    if($usuarioDAO->autentica($usuario)){
      
        $sessao2 = new Sessao();
        $sessao2->criaSessao($usuario->getId(), $usuario->getNivelAcesso(), $usuario->getLogin());
        header("Location: index.php");
    }else{
        $msg_erro= "Senha ou usuário Inválido";
        $erro=true;
        
    }
    
            
    
}
 

?>
<div class="tela fundo-cinza1">
     <div class="duas colunas no-meio">
            <div class="no-centro">
                <img src="img/unicafe-logo-p.png" class="seis">
            </div>
            <div class="linha fundo-branco com-bordas">
                <div class="conteudo">

                    <?php if($erro){?>
                    <div class="alerta-erro">
                       <div class="icone icone-fire ix16"></div>
                       <div class="titulo-alerta"><?php echo $msg_erro;?></div>
                       <div class="subtitulo-alerta">Favor verificar novamente.</div>
                    </div>
                    <?php }?>


                   <form method="post" action="" class="formulario-organizado">

                       <label for="idTextLogin">
                           Login
                           <input type="text" name="login" id="idTextLogin" class="doze" placeholder="Digite seu Usuário"/>
                        </label>
                        <label for="idTextSenha">
                            Senha
                            <input type="password" name="senha" id="idTextSenha" class="doze" placeholder="Digite sua Senha" />
                        </label>
                       <button type="submit" name="formlogin" class="botao b-primario doze"><span class="icone-redo2"></span> Entrar </button>                
                    </form>
                    <a href="recuperar_acesso.php" class="medio centralizado doze colunas">Não consegue acessar o sistema?</a>                 
                </div>
            </div>
            <div class="conteudo medio">
                <?php include_once "incluir_paginas/rodape.php"; ?>
            </div>
     </div>
</div>




