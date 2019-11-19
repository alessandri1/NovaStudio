<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Shop, bootstrap, Responsive, Web Template, Html, Css, Animations, javascript" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="<?php echo RUTA_URL ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/shop.css" type="text/css" media="screen" property="" />
	<link href="<?php echo RUTA_URL ?>/css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL ?>/css/checkout.css">
	<link href="<?php echo RUTA_URL ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="<?php echo RUTA_URL ?>/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<div class="checkout-right">
					<h3>Detalles de tu compra: </h3>
					<h4>Detalles del Cliente:</h4>
					<hr/>
					<h5>Nombre: <?php echo $datos["compra"]->nombre; ?></h5>
					<h5>Apellido: <?php echo $datos["compra"]->apellido; ?></h5>
					<h5>Email: <?php echo $datos["compra"]->email; ?></h5>
					<h5>Compañia: <?php echo $datos["compra"]->compania; ?></h5>
					<hr/>
					<h4>Detalles del Producto: </h4>
					<hr />
					<h5>Nombre: <?php echo $datos["producto"]->nombre; ?></h5>
					<h5>Descripcion: <?php echo $datos["producto"]->descripcion; ?></h5>
					<h5>Precio: $<?php echo $datos["producto"]->precio; ?></h5>
				</div>
				<div class="checkout-left">
					
					
						
						<div class="checkout-right-basket">
							<?php $id = $datos["compra"]->id; ?>
							<a href="<?php echo RUTA_URL; ?>/compras/imprimir/<?php echo $id; ?>" target="_blank">Imprimir</a>
						</div>
					

					<div class="clearfix"> </div>


					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- //top products -->