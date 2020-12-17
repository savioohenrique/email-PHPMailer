<?php

	require_once "vendor/autoload.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use HPMailer\PHPMailer\Exception;

	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	    $mail->isSMTP();                                           	// Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                    	// Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'email';                     			// SMTP username
	    $mail->Password   = 'password';                             // SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	    $mail->Port       = 587;

	    //Recipients
	    $mail->setFrom('from');
	    $mail->addAddress('to');

	    // Content
	    $mail->isHTML(true);
	    $mail->Subject = 'PHPMailer';
	    $mail->Body    = 'Testando o <b>PHPMailer<\b>.';
	    $mail->AltBody = 'Testando o PHPMailer.';

	    $mail->send();
	    echo 'Mensagem foi enviada';
	} catch (Exception $e) {
	    echo "Mensagem não foi enviada. Mailer Error: {$mail->ErrorInfo}";
	}

