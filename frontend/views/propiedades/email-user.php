<?php 

require 'zmail/PHPMailerAutoload.php';

if ($telefono) {
	// print_r($model);
	// exit();

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->Host = "smtp.dreamhost.com";


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
	$mail->Username = "administrador@propiedades.lexrealtymagazine.com";
	$mail->Password = '1985RCrc2';


	$mail->setFrom('administrador@propiedades.lexrealtymagazine.com', 'Lex Realty');
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
		$path = Yii::getAlias("@web") . "/site/index/?status=1";
		header("Location: $path");
		exit();
	}

}

?>