<?php
	$status = $explode['1'];
	$nome = $_SESSION['nome'];
	$sobrenome = $_SESSION['sobrenome'];
	$email = $_SESSION['email'];
	$telefone = $_SESSION['telefone'];
	$valor = $_SESSION['valor'];

	switch($status){
		case "success":
		$textoStatus = "PAGO APROBADO";
		$classStatus = "alert alert-success";
		$mensagemStatus = "Pago Confirmado, aguarde la liberacion de su pedido";
		sendMail($nome, $sobrenome, $email, $telefone, $valor, 'Aprobado');
		break;

		case "failure":
		$textoStatus = "PAGO RECHAZADO";
		$classStatus = "alert alert-danger";
		$mensagemStatus = "Su pago fue rechazado. Por favor prueba con otro método de pago.";
		sendMail($nome, $sobrenome, $email, $telefone, $valor, 'Rechazado');
		break;

		case "pending":
		$textoStatus = "PAGO PENDIENTE";
		$classStatus = "alert alert-warning";
		$mensagemStatus = "Pago pendiente Una vez aprobado, liberaremos su pedido. Por favor esperar";
		sendMail($nome, $sobrenome, $email, $telefone, $valor, 'Pendiente');
		break;

	}

	?>
	<div class="col-sm" align="center">
	    <h4><?php echo titulo_site;?> | Estado</h4>
	<hr>
	    <div><?php echo $textoStatus;?></div>
	    <hr>
	    <div class='<?php echo $classStatus;?>'><?php echo $mensagemStatus;?></div></br>
	    <p align="right"><a href="" class="btn btn-outline-primary btn-lg">Volver al Inicio</a></p>
	    <hr>
	</div>
</div>