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
	<link href="<?php echo RUTA_URL ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="<?php echo RUTA_URL ?>/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">



<!-- Seccion del home -->
<div class="grids_bottom">
		<div class="style-grids">
			<div class="col-md-6 style-grid style-grid-1">
				<img src="<?php echo RUTA_URL; ?>/images/b1.jpg" alt="shoe">
			</div>
		</div>
		<div class="col-md-6 style-grid style-grid-2">
			<div class="style-image-1_info">
				<div class="style-grid-2-text_info">
					<h3>Conoce todos nuestros productos</h3>
					<p>Entra a nuestra tienda virtual para mirar todo nuestro inventario-portafolio de proyectos y adquiere alguno si son de tu interes, tambien te invitamos a seguirnos para estar al tanto de nuestro avances! .</p>
					<div class="shop-button">
						<a href="<?php echo RUTA_URL; ?>/productos ">Ir a la tienda</a>
					</div>
				</div>
			</div>
			<div class="style-image-2">
				<img src="<?php echo RUTA_URL; ?>/images/b2.jpg" alt="shoe">
				<div class="style-grid-2-text">
					<h3>S.C.R.U.M</h3>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
<!-- Seccion del home -->





	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/public/js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- /nav -->
	<script src="<?php echo RUTA_URL; ?>/public/js/modernizr-2.6.2.min.js"></script>
	<script src="<?php echo RUTA_URL; ?>/public/js/classie.js"></script>
	<script src="<?php echo RUTA_URL; ?>/public/js/demo1.js"></script>
	<!-- //nav -->
	<!-- cart-js -->
	<script src="<?php echo RUTA_URL; ?>/public/js/minicart.js"></script>
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
	<script src="<?php echo RUTA_URL; ?>/public/js/search.js"></script>
	<!--//search-bar-->
	<script src="<?php echo RUTA_URL; ?>/public/js/responsiveslides.min.js"></script>
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
	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/public/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/public/js/easing.js"></script>
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

	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/public/js/bootstrap-3.1.1.min.js"></script>