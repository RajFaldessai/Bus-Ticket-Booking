<?php
require('connection.php');

require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";
require "./PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function sendOTP($email, $otp)
{
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->port = 587;
	$mail->Username="narvekargsamarth5@gmail.com";
	$mail->Password="fkgtngqqqnxzbsiu";
	$mail->setFrom("narvekargsamarth5@gmail.com", "Samarth Narvekar");
	$mail->addAddress($email);
	$mail->Subject = "OTP TO LOGIN";
	$message_body = "One time password for your login is: <br><br>" . $otp;
	$mail->addReplyTo("narvekargsamarth5@gmail.com", "Samarth Narvekar");
	$mail->msgHTML($message_body);
	$result = $mail->send();
	if (!$result) {
		echo "Mail Error" . $mail->ErrorInfo;
	} else {
		return $result;
	}
}





// // require ('C:\xampp\htdocs\phpmailer\src\PHPMailer.php');
// // require ('C:\xampp\htdocs\phpmailer\src');
// $msg="Your OTP is :". $otp;
// function sendOTP($t,$subject){
// 	require_once("smtp/class.phpmailer.php");
// 	$mail = new PHPMailer(); 
// 	$mail->IsSMTP(); 
// 	$mail->SMTPDebug = 1; 
// 	$mail->SMTPAuth = true; 
// 	$mail->SMTPSecure = 'TLS'; 
// 	$mail->Host = "smtp.sendgrid.net";
// 	$mail->Port = 587; 
// 	$mail->IsHTML(true);
// 	$mail->CharSet = 'UTF-8';
// 	$mail->Username = "USERNAME";
// 	$mail->Password = "PASSWORD";
// 	$mail->SetFrom("vishalphpyt@gmail.com");
// 	$mail->addAttachment("dummy.pdf");
// 	$mail->Subject = $subject;
// 	$mail->Body =$msg;
// 	$mail->AddAddress($to);
// 	if(!$mail->Send()){
// 		return 0;
// 	}else{
// 		return 1;
// 	}
// }
?>