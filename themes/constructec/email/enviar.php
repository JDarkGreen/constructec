<?php
	
	
	#Cargar archivo load php de wordpress
	require_once("../../../../wp-load.php");

	#Obtenemos variable de personalización
	$options = get_option('constructec_custom_settings');

	var_dump($_POST); exit;

	//Obtenemos las valores enviados
	$name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : "";
	$address = isset( $_POST['address'] ) ? sanitize_text_field($_POST['address']) : "";
	$email   = isset( $_POST['email'] ) ? sanitize_text_field($_POST['email']) : "";
	$message = isset( $_POST['message'] ) ? sanitize_text_field($_POST['message']) : "";

	//$phone   = $_POST['phone'];
	//$subject = $_POST['subject'];

	//Email A quien se le rinde cuentas
	$webmaster_email1 = isset($options['contact_email']) && !empty($options['contact_email']) ? $options['contact_email'] : "proyectos@construtec.com.pe";

	$webmaster_email2 = "jgomez.4net@gmail.com";

	include("./class.phpmailer.php");
 	include("./class.smtp.php");

	$mail = new PHPMailer();
	
	/*$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host      = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port      = 465;
	$mail->SMTPAuth  = true; // turn on SMTP authentication
	$mail->Username  = "jgomez.4net@gmail.com"; // Enter your SMTP username
	$mail->Password  = "ARLAC_RINO1EVER"; // SMTP password */

	$mail->From     = $email;
	$mail->FromName = $name;
	$mail->AddAddress( $webmaster_email1 );
	$mail->AddAddress( $webmaster_email2 );

	$mail->IsHTML( true ); // send as HTML
	$mail->Subject = "Consulta - Mensaje Constructec Formulario: ";

	//Customizar el mensaje
	$mensaje  = "De Sr.(a) " . $name . "<br/>";
	$mensaje .= "Mensaje: " . $message . "<br/>";
	$mensaje .= "Su direcci&oacute;n es: " . $address;
	//$mensaje .= "<br/> Su tel&eacute;fono &oacute; celular es: " . $phone;

	$mail->Body = $mensaje;

	if($mail->Send()){
		echo "Su mensaje a sido enviado con éxito, estaremos respondiendo a la brevedad."; 
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo ; 
	}

?>