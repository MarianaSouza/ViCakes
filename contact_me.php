<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->CharSet = 'UTF-8';
$mail->Debugoutput = 'html';
$mail->Host = "mail.marianacaldas.com";
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = "dev@marianacaldas.com";
$mail->Password = "MariDev@2016";
$mail->setFrom('dev@marianacaldas.com', 'Formulário de contato - Vicakes');
if(empty($_POST['name'])      ||
    empty($_POST['email'])    ||
  empty($_POST['message'])  ||
!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
  echo "Verifique os dados enviados, inclusive o formato do email";
  return false;
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$mail->addReplyTo($email_address, $name);
$mail->addAddress('vickavante@hotmail.com', 'Viviane Avante');
  
  // create email body and send it
$to = 'marianacaldassouza@gmail.com'; // *REPLACE WITH THE EMAIL ADDRESS YOU WANT THE FORM TO SEND MAIL TO*
$email_subject = "Nova mensagem de:  $name";
$email_body = "
Você recebeu uma nova mensagem.\n\n
"."Seguem os detalhes:\n\n
Name: $name\n\n
Email: $email_address\n\n
Message:\n$message";
$headers = "From: noreply@vicakesdoces.com.br\n"; // *REPLACE WITH THE EMAIL ADDRESS YOU WANT THE MESSAGE TO BE FROM*
  $headers .= "Reply-To: $email_address";
$mail->Subject = $email_subject;
$mail->Body    = $email_body;

//send the message, check for errors
if (!$mail->send()) {
echo "Ops, ocorreu um problema. Por favor, tente novamente mais tarde.";
} else {
echo "Mensagem enviada com sucesso. Em breve, entraremos em contato.";
}
?>