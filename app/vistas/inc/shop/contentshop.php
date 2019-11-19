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
	<link href="<?php echo RUTA_URL; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/shop.css" type="text/css" media="screen" property="" />
	<link href="<?php echo RUTA_URL; ?>/css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/jquery-ui1.css">
	<link href="<?php echo RUTA_URL; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="<?php echo RUTA_URL; ?>/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">


    <div class="left-ads-display col-md-9 ">
				<div class="wrapper_top_shop">
					<div class="col-md-6 shop_left">
						<img src="<?php echo RUTA_URL ?>/images/banner3.jpg" alt="">
						<h6>Nuevo</h6>
					</div>
					<div class="col-md-6 shop_right">
						<img src="<?php echo RUTA_URL ?>/images/banner2.jpg" alt="">
						<h6>Contenido</h6>
					</div>
					<div class="clearfix"></div>
					<div class="product-sec1">
						<?php foreach ($datos["productos"] as  $value): ?>
							<div class="col-md-4 product-men">
								<div class="product-shoe-info shoe">
									<div class="men-pro-item">
										<div class="men-thumb-item">
											<img src="<?php echo $value->imagen ?>" alt="" class = "img-responsive" style ="width: 300px; height: 300px">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="/webmaster/productos/especifico/<?php echo $value->id?> " class="link-product-add-cart">Ver Producto</a>
												</div>
											</div>
										</div>
										<div class="item-info-product">
											<h4>
												<a href="/webmaster/productos/especifico/<?php echo $value->id?> "><?php echo $value->nombre ?> </a>
											</h4>
											<div class="info-product-price">
												<div class="grid_meta">
													<div class="product_price">
														<div class="grid-price ">
															<span class="money ">$<?php echo $value->precio ?></span>
														</div>
													</div>
													<ul class="stars">
														<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
														<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
														<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
														<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
														<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						<div class="clearfix"></div>

					</div>
					<div class="col-md-6 shop_left shp">
						<img src="<?php echo RUTA_URL ?>/images/banner4.jpg" alt="">
						<h6>Mejores precios</h6>
					</div>
					<div class="col-md-6 shop_right shp">
						<img src="<?php echo RUTA_URL ?>/images/banner1.jpg" alt="">
						<h6>Atencion inmediata</h6>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>



	
	