<?php
	define('titulo_site', 'Sitio Web'); //Titulo del sitio
	define('url_site', 'http://localhost/MercadoPago/proyecto');  //URL del sitio obligatorio
	define('client_id', ' 3842236325011871'); //client id MP
	define('client_secret', 'F2NtpkhZFieUkGDVeUEjhxioqZOToIJV'); //client_secret MP
	define('email', 'gabrielgomez362@gmail.com'); //Email que recibira los emails


	function sendMail($nome, $sobrenome, $email, $telefone, $valor, $status){
		$to = email;
		$subject = '['.titulo_site.'] PAGO EFECTUADO!'; 
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$message = '<html><body>';
		$message .= 
		'
		<h1>Hola, Usted ha recibido un nuevo pago!</h1>
		<hr>
		<h2>Datos del pagador:</h2>
		<p><b>Nombre:</b> '.$nome.' '.$sobrenome.'</p>
		<p><b>Email:</b> '.$email.' </p>
		<p><b>Telefono:</b> '.$telefone.' </p>
		<p><b>Precio:</b> <code> R$ '.$valor.' </code>
		<p><b>Estado:</b> '.$status.' </p>
		<hr>
		<p>Observación: 
		Confirme el pago en la cuenta de MercadoPago antes de realizar el lanzamiento.</p>
		</p>';
		$message .= '</body></html>';

		mail($to, $subject, $message, $headers);
	}
?>