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
	<link href="<?php echo RUTA_URL ?>/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />

	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL ?>/css/checkout.css">
	<link href="<?php echo RUTA_URL ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="<?php echo RUTA_URL ?>/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
		<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Pa<span>go</span></h3>
				<!--/tabs-->
				<div class="responsive_tabs">
					<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Datos de Compra</li>
							<li>Datos de Producto</li>
						</ul>
						<div class="resp-tabs-container">
							<!--/tab_one-->
							
							<!--//tab_one-->
							<div class="tab2">
								<div class="pay_info">
									<form action="/webmaster/compras/realizarCompra" method="post" class="creditly-card-form agileinfo_form">
										<section class="creditly-wrapper wthree, w3_agileits_wrapper">
											<div class="credit-card-wrapper">
												<div class="first-row form-group">
													<div class="controls">
														<label class="control-label">Nombre</label>
														<input class="billing-address-name form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
													</div>
													<div class="w3_agileits_card_number_grids">
														<div class="w3_agileits_card_number_grid_left">
															<div class="controls">
																<label class="control-label">Apellido</label>
																<input class="number credit-card-number form-control" type="text" name="apellido" id="apellido" placeholder = "Ingrese su apellido" >
															</div>
														</div>
														<div class="w3_agileits_card_number_grid_right">
															<div class="controls">
																<label class="control-label">DNI</label>
																<input class="security-code form-control" Â· inputmode="numeric" type="text" name="dni" id="dni" placeholder="Tu identificacion">
															</div>
														</div>
														<div class="clear"> </div>
													</div>
													<div class="controls">
														<label class="control-label">Correo</label>
														<input class="expiration-month-and-year form-control" type="email" name="email" id="email" placeholder="Correo">
													</div>
													<div class="controls">
														<label class="control-label">Confima el Correo</label>
														<input class="expiration-month-and-year form-control" type="email" name="email-confirma" id="email-confirma" placeholder="Confirma Correo">
													</div>
													<div class="controls">
														<label class="control-label">Nombre de la compañia</label>
														<input class="number credit-card-number form-control" type="text" name="company" id="company" placeholder = "Ingrese su apellido" >
													</div>
													<input type="hidden" name="producto_id" value = "<?php echo $datos["producto"]->id ?>" />
												</div>
												<button class="btn btn-primary submit"><span>Realizar Pago</span></button>
											</div>
										</section>
									</form>

								</div>
							</div>
							
							<div class="tab3">
								<div class="pay_info">
									<div class="col-md-6 tab-grid">
										<h1><?php echo $datos["producto"]->nombre ?></h1>
										<h3>Precio: $<?php echo $datos["producto"]->precio ?></h3>
									</div>
									<div class="col-md-6">
										<img class="img-responsive" src = "<?php echo $datos["producto"]->imagen?>"/>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--//tabs-->
			</div>

		</div>
		<!-- //payment -->