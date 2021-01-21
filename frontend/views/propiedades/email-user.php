<?php 

require 'zmail/PHPMailerAutoload.php';

if ($telefono) {
	// print_r($model);
	// exit();

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->Host = "smtp.gmail.com";


	$mail->SMTPOptions = array(
	    'ssl' => array(
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
	    )
	);
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = "micolpa08@gmail.com";
	$mail->Password = 'buscando';


	$mail->setFrom('micolpa08@gmail.com', 'Lex Realty');
	//$mail->addReplyTo('laserficher.cne@gmail.com', 'CNE notificaciones');
	$mail->addAddress("$correo", $nombre);
	$mail->Subject = 'Nueva propuesta';
	$mail->msgHTML(" Hola $telefono");
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
		// $path = Yii::getAlias("@web") . "/site/index/?status=1";
		// header("Location: $path");
		exit();
	} else {
		// $path = Yii::getAlias("@web") . "/site/index/?status=1";
		// header("Location: $path");
		exit();
	}

}

?>