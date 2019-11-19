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
	<link href="<?php echo RUTA_URL; ?>//css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo RUTA_URL; ?>//css/about.css" type="text/css" media="screen" property="" />
	<link rel="stylesheet" href="<?php echo RUTA_URL; ?>//css/shop.css" type="text/css" media="screen" property="" />
	<link href="<?php echo RUTA_URL; ?>//css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo RUTA_URL; ?>//css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="<?php echo RUTA_URL; ?>//css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<?php 
	session_start();
?>

<div class="banner_top" id="home">
		<div class="wrapper_top_w3layouts">

			<div class="header_agileits">
				<div class="logo">
					<h1><a class="navbar-brand" href="<?php echo RUTA_URL; ?>/paginas/index "><span>Nova</span> <i>Studio</i></a></h1>
				</div>
				<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

					<nav>
						<ul>
							<li><a href="<?php echo RUTA_URL; ?>/paginas/index " class="active">Inicio</a></li>
							<li><a href="<?php echo RUTA_URL; ?>/paginas/about ">¿Quienes Somos?</a></li>
							<li><a href="<?php echo RUTA_URL; ?>/productos ">Tienda</a></li>
							<li><a href="<?php echo RUTA_URL; ?>/paginas/contact ">Contactanos</a></li>
						</ul>
					</nav>
				</div>
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i style="padding-top:7px" class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				
				<!-- //cart details -->
				

				<div class="clearfix"></div>
				<?php if(isset($_SESSION['error'])): ?>
				<div class="alert alert-danger alert-dismissible error" role="alert">
					<strong>Error!</strong> <?php echo $_SESSION['error'];  unset($_SESSION['error']);?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif;
				?>
				
			</div>
			<!-- /slider -->
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides callbacks callbacks1" id="slider4">

						<li>
							<div class="banner-top2">
								<div class="banner-info-wthree">
									<h3>Diseño</h3>
									<p>Los mejores templates del mercado.</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top3">
								<div class="banner-info-wthree">
									<h3>Aplicaciones</h3>
									<p>Optimiza todos tus procesos.</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top">
								<div class="banner-info-wthree">
									<h3>Calidad</h3>
									<p>Entrega de proyectos en tiempo record.</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top1">
								<div class="banner-info-wthree">
									<h3>Unete</h3>
									<p>Demustra tu talento y unetenos.</p>

								</div>

							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //slider -->
			<ul class="top_icons">
				<li><a href="https://es-la.facebook.com/"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
				<li><a href="https://twitter.com/iniciarsesion?lang=es"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
				<li><a href="https://ve.linkedin.com/"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
				<li><a href="https://plus.google.com/?hl=es"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>

			</ul>
		</div>
	</div>


	<script type="text/javascript" src="<?php echo RUTA_URL;?>/public/js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- /nav -->
	<script src="<?php echo RUTA_URL;?>/public/js/modernizr-2.6.2.min.js"></script>
	<script src="<?php echo RUTA_URL;?>/public/js/classie.js"></script>
	<script src="<?php echo RUTA_URL;?>/public/js/demo1.js"></script>
	<!-- //nav -->
	<!-- cart-js -->
	<script src="<?php echo RUTA_URL;?>/public/js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!--search-bar-->
	<script src="<?php echo RUTA_URL;?>/public/js/search.js"></script>
	<!--//search-bar-->
	<script src="<?php echo RUTA_URL;?>/public/js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- js for portfolio lightbox -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="<?php echo RUTA_URL;?>/public/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL;?>/public/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->

	<script type="text/javascript" src="<?php echo RUTA_URL;?>/public/js/bootstrap-3.1.1.min.js"></script>