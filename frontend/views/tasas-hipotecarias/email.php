<?php 

require 'zmail/PHPMailerAutoload.php';

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
	$content = $this->render('email-template', ['model' =>  $model]);
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = "administrador@propiedades.lexrealtymagazine.com";
	$mail->Password = '1985RCrc2';


	$mail->setFrom('administrador@propiedades.lexrealtymagazine.com', 'Lex Realty');
	$mail->addAddress("$correo", $banco_nombre);
	$mail->Subject = 'Nueva propuesta financiamiento';

	// $mail->addAddress("$correo_agente", 'Lex Realty');
	$mail->msgHTML("$content");
	$mail->send();
	// if (!$mail->send()) {
	// 	echo "Mailer Error: " . $mail->ErrorInfo;
	// 	$path = Yii::getAlias("@web") . "/site/index/?status=1";
	// 	header("Location: $path");
	// 	exit();
	// } else {
	// 	echo "Enviado";
	// 	$path = Yii::getAlias("@web") . "/site/index/?status=1";
	// 	header("Location: $path");
	// 	exit();
	// }


?>