<?php


require("class/phpMailer/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "enviosites.secrel.com.br"; // Endereço do servidor SMTP
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'mouraoecompanhiaftp'; // Usuário do servidor SMTP
$mail->Password = 'hOaw86Op'; // Senha do servidor SMTP
$mail->Port = 587;
$mail->From = "comunicacao@unilab.edu.br"; // Seu e-mail
$mail->FromName = "UNILAB - Comunicação"; // Seu nome

$mail->AddAddress('giovanildos@unilab.edu.br', 'Francisco Giovanildo');


$mail->IsHTML(true); 


$mail->Subject  = "Aviso importante! "; // Assunto da mensagem
$mail->Body = "Comunicamos que, devido cortes orçamentários todos os técnicos de laboratórios serão exonerados.";
$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n  ";


$enviado = $mail->Send();
$mail->ClearAllRecipients();
$mail->ClearAttachments();

if ($enviado) {
echo "E-mail enviado com sucesso!";
} else {
echo "Não foi possível enviar o e-mail.<br /><br />";
echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}

?>