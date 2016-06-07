<?php
	require_once '../Main/PHPMailer/PHPMailerAutoload.php';

	$m = new PHPMailer;
	
	//properties
	$m->isSMTP(); //we want to use SMTP server to send emails
	$m->SMTPAuth = true;
	$m->SMTPDebug = 2; //set debugging on 2-just messages 1-errorcodes and messages

	$m->Host = 'smtp.gmail.com';
	$m->Username = 'kristiinavoolar@gmail.com';
	$m->Password = '***';
	$m->SMTPSecure = 'ssl';
	$m->Port = 465;
	
	$m->From = 'kristiinavoolar@gmail.com';
	$m->FromName = 'Kristiina Voolar';
	//$m->addReplyTo('reply@gmail.com', 'Reply address');
	$m->addAddress('kristiinavoolar@gmail.com', 'Kristiina Voolar');
	//$m->addCC('kristiinavoolar@gmail', 'Kristiina Voolar');
	//$m->addBCC('kristiinavoolar@gmail', 'Kristiina Voolar');
	
	$m->Subject = 'Here is an email';
	$m->Body = 'This is body';
	$m->AltBody = 'This is body';
	
	var_dump($m->send());
?>