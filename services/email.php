<?php
date_default_timezone_set("America/Sao_Paulo");
require_once('../src/PHPMailer.php');
require_once('../src/SMTP.php');
require_once('../src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

#creation of form variables

$name     = isset($_POST["name"]) ? $_POST["name"] : "Não Informado";
$email    = isset($_POST["email"]) ? $_POST["email"] : "Não Informado";
$comments = isset($_POST["comments"]) ? $_POST["comments"] : "Não Informado";
$data     = date("d/m/Y H:i:s"); #Optional


#Field validations with the method POST
#If the user does not inform either the email or the message
#OBS: Access to less secure applications is required for php mailer to work

if($email && $comments){
	
	$mail = new PHPMailer();


	
	$mail->isSMTP();
	$mail->Host     = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'seuemail@gmail.com';
	$mail->Password = 'senhadoemail';
	$mail->Port     = 587;	
	
	$mail->setFrom('seuemail@gmail.com');
	$mail->addAddress('endereco1@provedor.com.br');
	
	
	$mail->isHTML(true);
	$mail->Subject = 'You have a reservation';
	$mail->Body    = "Name:{$name}<br>
					  Email:{$email}<br>
					  Comments:{$comments}<br>
					  Data/Hora: {$data}";

	$mail->AltBody = 'Chegou o email teste do Canal TI';
	
	if ($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}



}else{
	echo "Email não enviado, informe o email e a mensagem!";
}


