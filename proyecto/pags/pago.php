<?php
	$_SESSION['nome'] = $_POST['nome'];
	
	$_SESSION['sobrenome'] = $_POST['sobrenome'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['telefone'] = $_POST['telefone'];
	$_SESSION['valor'] = number_format($_POST['valor'], 2,',', '.');

	include_once("../lib/configs.php");
  	require_once "../lib/mercadopago.php";

	$mp = new MP('3842236325011871', 'F2NtpkhZFieUkGDVeUEjhxioqZOToIJV');
	$preference_data = array(
	"items" => array(
	  array(
	    "payer_email" => $_SESSION['email'],
	    "back_url" => url_site,
	      "title" => mb_convert_encoding("Celular J7 ", "UTF-8", "auto"),
	      "currency_id" => "ARG",
	      "category_id" => "Servicios",
	      "quantity" => 1,
	      "unit_price" => floatval(number_format((float)str_replace(",",".",$_SESSION['valor']), 2, '.', '')
		))),

		"payment_methods" => array(
            "excluded_payment_methods" => array(
              array("id" => "master")
            ),
            "excluded_payment_types" => array(
              array("id" => "ticket")
            ),
            "installments" => 12
		),
		  
		'shipments' => array(
			'mode' => "me2",
			'local_pickup' => true, //si quiere retirar por sucursal
			"dimensions" => "30x30x30,500",
          	'default_shipping_method' => 73328
          /* 'receiver_address' => */
		),

	      "payer" => array(
	      "name" => $_SESSION['nome'],
	      "surname" => $_SESSION['sobrenome'],
	      "email" => $_SESSION['email']
		  ),

		  
	    'auto_return' => "approved",

		"back_urls" => array(
			"success" => url_site."status/success/",
			"failure" => url_site."status/failure/",
			"pending" => url_site."status/pending/"
		));

	$preference = $mp->create_preference($preference_data);
	
	var_dump($preference);
?>
<div class="col-sm-8 offset-md-2">
	<h4 align="center">Pedido efectuado con Exito!</h4><br>

	<div class="row">
		<div class="col-sm-7">
			<h4>Sus Datos:</h4>
			<hr>
			<p>Nombre: <b><?php echo $_SESSION['nome'];?> <?php echo $_SESSION['sobrenome'];?></b></p>
			<p>Email: <b><?php echo $_SESSION['email'];?></b></p>
			<p>Telefono: <b><?php echo $_SESSION['telefone'];?></b></p>
			<p>Valor a pagar: <code>$ <?php echo $_SESSION['valor'];?></code></p>
		</div>

		<div class="col-sm-5">
			<!-- <h5>Pago:</h5> -->
			<hr>
			<small class="text-success">Pagar con Mercado Pago(sera redireccionado a MercadoPago)</small>
			<hr>
			<a target="_blank" href="<?php echo $preference["response"]["init_point"];?>" name="MP-Checkout" class="orange-ar-m-sq-arall"><img src="/MercadoPago/images/mercadopagolarge.png"/ width="400" class="img-fluid"></a>
    		<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>
			<hr>
		</div>
	</div>
</div>