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

<div class="footer_agileinfo_w3">
		<div class="footer_inner_info_w3ls_agileits">
			<div class="col-md-3 footer-left">
				<a href="<?php echo RUTA_URL; ?>/paginas/index "><img src="images/logo.png"></a>
				<p>Siguenos en nuestras sociales, nos ayudaria mucho.</p>
				<ul class="social-nav model-3d-0 footer-social social two">
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
			<div class="col-md-9 footer-right">
				<div class="sign-grds">
					<div class="col-md-4 sign-gd">
						<h4>Nuestra <span>Informacion</span> </h4>
						<ul>
							<li><a href="<?php echo RUTA_URL; ?>/paginas/index ">Inicio</a></li>
							<li><a href="<?php echo RUTA_URL; ?>/paginas/about ">Quienes Somos</a></li>
							<li><a href="<?php echo RUTA_URL; ?>/productos ">Tienda</a></li>
							<li><a href="<?php echo RUTA_URL; ?>/paginas/contact ">Contactanos</a></li>
						</ul>
					</div>

					<div class="col-md-5 sign-gd-two">
						<h4>Informacion <span>de la tienda</span></h4>
						<div class="address">
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Telefonos</h6>
									<p>+58 0261-5556666</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Correo Electronico</h6>
									<p>Email :<a href="mailto:example@email.com"> novastudio@novastudio.com</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Location</h6>
									<p>Venezuela - Edo. Zulia, Maracaibo.

									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>

			
		</div>
	</div>
	</div>


	<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	
	<!-- //js -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
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
	<!-- /nav -->
	<script src="<?php echo RUTA_URL ?>/public/js/modernizr-2.6.2.min.js"></script>
	<script src="<?php echo RUTA_URL ?>/public/js/classie.js"></script>
	<script src="<?php echo RUTA_URL ?>/public/js/demo1.js"></script>
	<!-- //nav -->
	<!-- script for responsive tabs -->
	<script src="<?php echo RUTA_URL ?>/public/js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>


	<!--search-bar-->
	<script src="<?php echo RUTA_URL ?>/public/js/search.js"></script>
	<!--//search-bar-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="<?php echo RUTA_URL ?>/public/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL ?>/public/js/easing.js"></script>
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
	<script type="text/javascript" src="<?php echo RUTA_URL ?>/public/js/bootstrap-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL ?>/public/js/main.js"></script>