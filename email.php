<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    require "Phpmailer/src/PHPMailer.php";
	require "Phpmailer/src/SMTP.php";
	function phpmailsend($to, $subject, $content)
	{
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com'; //
		$mail->SMTPAuth = TRUE;
		$mail->Username = "visioncaregcc@gmail.com";
		// $mail->Password = "buspass123";
		$mail->Password = "dgctoepiojtoujox";
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Port     = "587";

		$mail->SMTPDebug = 0;
		$mail->SetFrom('visioncaregcc@gmail.com', "VISION CONTROL");
		$mail->AddAddress($to); //we can add here multiple email 
		$mail->isHTML(true);
		//$mail->Mailer   = "smtp";



		$mail->Subject = $subject;
		$mail->Body = $content;


		if (!$mail->Send()) {
			// echo $mail->ErrorInfo;
		} else {
			// echo "sent";
		}
	}
