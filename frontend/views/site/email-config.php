<?php 

require 'zmail/PHPMailerAutoload.php';

if ($model) {
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
	$content = $this->render('email-notification-template', ['model' => $model, 'transaccion' => $transaccion]);
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = "administrador@propiedades.lexrealtymagazine.com";
	$mail->Password = '1985RCrc2';


	$mail->setFrom('administrador@propiedades.lexrealtymagazine.com', 'Lex Realty');
	$mail->addAddress("$model->correo", $model->nombre);
	$mail->Subject = 'Solicitud Debida Diligencia';

	// $mail->addAddress("administrador@propiedades.lexrealtymagazine.com", 'Lex Realty');
	$mail->msgHTML("$content");
	$mail->send();
	if ($mail->send()) {
        $model->email_notification = 1;
		$model->save();
	}else{
	}
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

}

?>