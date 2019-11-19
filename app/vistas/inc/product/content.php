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
	<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/flexslider.css" type="text/css" media="screen" />
	<link href="<?php echo RUTA_URL; ?>/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="<?php echo RUTA_URL; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="<?php echo RUTA_URL; ?>/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">


<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">

						<ul style="list-style: none;">
							<li data-thumb="images/s1.jpg">
								<div class="thumb-image"> <img src="<?php echo $datos["producto"]->imagen ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
				<h3><?php echo $datos["producto"]->nombre ?></h3>
				<p><span class="item_price">$<?php echo $datos["producto"]->precio ?></span>
					
				</p>
				<?php $id = $datos["producto"]->id ?>
				<a href="/webmaster/compras/producto/<?php echo  $id?>"
				style = "padding: 10px 20px;
	color: #fff;
	font-size: 1em;
	background: #212121;
	text-decoration: none;
	margin-bottom: 50px;"
				>Comprar</a>
				
				<ul class="social-nav model-3d-0 footer-social social single_page" style = "margin-top: 20px">
					<li class="share">Compartir : </li>
					<li>
						<a href="https://es-la.facebook.com/" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/iniciarsesion?lang=es" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/?hl=es-la" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					
				</ul>

			</div>
			<div class="clearfix"> </div>
			<!--/tabs-->
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Descripcion</li>
					</ul>
					<div class="resp-tabs-container">
						<!--/tab_one-->
						<div class="tab1">

							<div class="single_page">
								<h6>Descripcion</h6>
								<p><?php echo $datos["producto"]->descripcion ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--//tabs-->
			<!-- /new_arrivals -->
			
			<!--//new_arrivals-->


		</div>
	</div>

