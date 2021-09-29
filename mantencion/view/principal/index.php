<?php
	$item = null;
	$value = null;
	$empresas = EmpresasController::ctrMostrarNombreLocal($item, $value);
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="/img/fav.png">
	<meta name="author" content="Daniel Cortés">
	<meta name="description" content="Sistema de cartas y vitrina digital para promocionar sus productos">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<meta name="subject" content="ShowCase, vitrina y carta digital">
	<meta name="copyright" content="NEKORP GROUP">
	<meta name="language" content="ES">
	<meta name="author" content="Daniel Cortés, domcc.88@icloud.com">
	<meta name="designer" content="Daniel Cortés">
	<meta name="owner" content="NEKORP GROUP">
	<meta name="url" content="https://showcase.myddns.me">
	<meta name="identifier-URL" content="http://showcase.myddns.me">
	<meta name="category" content="Digital, Menu, Marketing">
	<meta name="revisit-after" content="7 days">
	<meta name="subtitle" content="Vitirna y carta digital">
	<meta name="target" content="all">
	<meta name="date" content="Aug. 8, 2020">
	<meta property="og:image:width" content="630">
  <meta property="og:image:height" content="480">
  <meta property="og:image" content="/img/fav.png">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="imagetoolbar" content="no">
	<meta http-equiv="x-dns-prefetch-control" content="off">






	<!-- Site Title -->
	<title>ShowCase</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="/view/principal/css/linearicons.css">
		<link rel="stylesheet" href="/view/principal/css/owl.carousel.css">
		<link rel="stylesheet" href="/view/principal/css/font-awesome.min.css">
		<link rel="stylesheet" href="/view/principal/css/animate.css">
		<link rel="stylesheet" href="/view/principal/css/bootstrap.css">
		<link rel="stylesheet" href="/view/principal/css/main.css">
		<script src="https://www.google.com/recaptcha/api.js?render=6Lcvs7QbAAAAAJs5Irwyqbd6zRj-B6r7ju_O8yXL"></script>
		<script>
			grecaptcha.ready(function() {
				grecaptcha.execute('6Lcvs7QbAAAAAJs5Irwyqbd6zRj-B6r7ju_O8yXL', {action: 'submit'}).then(function(token) {
					if (token) {
						document.getElementById('recaptcha').value = token;
						//console.log("token", token);
					}
				});
			});
		</script>
	</head>
	<body>
		<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
	        var js, fjs = d.getElementsByTagName(s)[0];
	        if (d.getElementById(id)) return;
	        js = d.createElement(s); js.id = id;
	        js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
	        fjs.parentNode.insertBefore(js, fjs);
      	}(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1175745969193812"
		theme_color="#5d64c0"
		logged_in_greeting="¡Hola! ¿Como te podemos ayudar con showCase?"
		logged_out_greeting="¡Hola! ¿Como te podemos ayudar con showCase?">
      </div>
		<div id="top"></div>
		<!-- Start Header Area -->
		<header class="default-header">
			<div class="sticky-header">
				<div class="container">
					<div class="header-content d-flex justify-content-between align-items-center">
						<div class="logo">
							<a href="#top" class="smooth"><img src="img/logos/showCaseLogo.png" alt=""></a>
						</div>
						<div class="right-bar d-flex align-items-center">
							<nav class="d-flex align-items-center">
								<ul class="main-menu">
									<li><a href="#top">Home</a></li>
									<li><a href="#aboutUs">Quienes somos</a></li>
									<li><a href="#services">Servicios</a></li>
									<li><a href="#protfolio">Nuestros clientes</a></li>
									<li><a href="#team">Nuestro equipo</a></li>

									<li><a href="#contact">Contacto</a></li>

								</ul>
								<a href="#" class="mobile-btn"><span class="lnr lnr-menu"></span></a>
							</nav>

							<div class="header-social d-flex align-items-center">
								<a target="_blank" href="https://www.facebook.com/Nekorp-Group-1175745969193812/"><i class="fa fa-facebook"></i></a>
								<a href="https://wa.me/56953414450?text=Me%20interesa%20cotizar%20con%20ustedes%20servicios%20digitales"><i class="fa fa-whatsapp"></i></a>
								<a href="https://www.linkedin.com/in/daniel-cortés-692515119" target="_blank"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header Area -->
		<!-- Start Banner Area -->
		<section class="banner-area relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-lg-8">
						<div class="banner-content text-center">
							<h1 class="text-uppercase text-white">ShowCase</h1>
							<p class="text-uppercase text-white">sistema de vitrina digital para tu negocio</p>
							<a href="/ingreso" class="primary-btn banner-btn">Iniciar sesión</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Area -->
		<!-- Start About Area -->
		<section class="section-full gray-bg" id="aboutUs">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="section-title text-center">
							<h3 class="text-uppercase">Nacimos de una PYME y crecemos para ellas...</h3>
							<br>
							<p>Esta idea nació de la empresa <b>NEKORP Group</b>, la cual tiene su base en Puerto Natales y tiene por objetivo poder entregar soluciones informáticas al alcance de todo, de manera rápida, segura y efectiva.</p>
							<hr>
							<p><b>ShowCase</b> nace originalmente como una opción de carta de restaurant digital, pero no nos detuvimos ahí, sino que lo ampliamos a diferentes sectores donde puedas promocionar tus productos de manera segura en esta época de COVID-19.</p>
						</div>
					</div>
				</div>
				<!--<div class="row">
					<div class="col-md-4">
						<figure class="signle-service">
							<img src="img/s1.jpg" class="img-fluid" alt="">
							<figcaption class="text-center">
								<h5 class="text-uppercase">Addiction Whit Gambling</h5>
								<p>It is a good idea to think of your PC as an office. It stores files, programs, pictures. This can be compared to an actual office’s files</p>
							</figcaption>
						</figure>
					</div>
					<div class="col-md-4">
						<figure class="signle-service">
							<img src="img/s2.jpg" class="img-fluid" alt="">
							<figcaption class="text-center">
								<h5 class="text-uppercase">Headset No Longer Wired</h5>
								<p>If you are in the market for a computer, there are a number of factors to consider. Will it be used for your home, your office or perhaps </p>
							</figcaption>
						</figure>
					</div>
					<div class="col-md-4">
						<figure class="signle-service">
							<img src="img/s3.jpg" class="img-fluid" alt="">
							<figcaption class="text-center">
								<h5 class="text-uppercase">Life Advice Looking At Window</h5>
								<p>Having a baby can be a nerve wrackingexp erience for new parents – not the nine months of pregnancy, I’m talking</p>
							</figcaption>
						</figure>
					</div>-->
				</div>
			</div>
		</section>
		<!-- End About Area -->
		<!-- Start Product Area -->
		<section id="services" class="title-bg section-full">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="product-area-title text-center">
							<p class="text-white text-uppercase">¿Por qué nos prefieren?</p>
							<h2 class="text-white h1">Nuestra comunidad va creciendo dia a día y hoy contamos con  <br>xx</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="single-product">
							<div class="icon">
								<span class="lnr lnr-star"></span>
							</div>
							<div class="desc">
								<h4>Diseños adaptables</h4>
								<p>Nuestros diseños los adaptamos a tu empresa y manuales de marca</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-product">
							<div class="icon">
								<span class="lnr lnr-magic-wand"></span>
							</div>
							<div class="desc">
								<h4>Interfaz simple</h4>
								<p>¡No pierdas tiempo tratando de entender complejos sistemas de administración, el nuestro es súper sencillo!</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-product">
							<div class="icon">
								<span class="lnr lnr-sun"></span>
							</div>
							<div class="desc">
								<h4>Anti-Covid</h4>
								<p>ShowCase nació como opción para reemplazar las antiguas cartas de papel y hoy nos adaptamos a todos los mercados como una gran vitrina virtual</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-product">
							<div class="icon">
								<span class="lnr lnr-layers"></span>
							</div>
							<div class="desc">
								<h4>Multi lenguajes</h4>
								<p>¿Inglés?¿Español?¿Alemán? si tienes tus productos en varios idiomas, ¡nuestra plataforma permite mostrarlo en el idioma que necesites! </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Product Area -->
		<!-- Start shuffle Area -->
		<section id="protfolio" class="section-full">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="product-area-title text-center">
							<h2 class="h1">Nuestros clientes <br> comparten sus vitrinas</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="controls d-flex flex-wrap justify-content-center">
					<a class="filter active" data-filter="all" style="color: black;">Vitrinas activas</a>
					<!--<a class="filter" data-filter=".category-1">Categories</a>
					<a class="filter" data-filter=".category-2">Branding</a>
					<a class="filter" data-filter=".category-3">Image Manipulation</a>
					<a class="filter" data-filter=".category-4">Creative Work</a>
					<a class="filter" data-filter=".category-5">Web Design</a>
					<a class="filter" data-filter=".category-6">Print Material</a>-->
				</div>
			</div>
			<div id="filter-content" class="row no-gutters mt-70">
				<?php foreach ($empresas as $empresa): ?>
					<div
						class="mix category-1 col-lg-3 col-md-4 col-sm-6 single-filter-content content-1"
						data-myorder="1"
						style=
							"background: url(<?php echo $empresa['urlLogoEmpresa']?>) no-repeat center center/cover; width: 60%;">
						<div class="overlay overlay-bg-content d-flex align-items-center justify-content-center flex-column">
							<p class="text-white"><a href="<?php echo $empresa['url'];?>" style="color: white;" target="_blank">Visita su vitrina</a></p>
							<div class="line"></div>
							<h5 class="text-white text-uppercase"><?php echo $empresa['nombre_fantasia'];?></h5>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</section>
		<!-- End shuffle Area -->
		<!-- Start Team member Area -->
		<section id="team" class="pb-150">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="product-area-title text-center">
							<p class="text-uppercase">Gente creativa</p>
							<h2 class="h1">Nuestro equipo valora tus ideas <br> y las pone en práctica</h2>
						</div>
					</div>
				</div>
				<!--<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="single-member">
							<div class="thumb relative" style="background: url(https://scontent.fpuq3-1.fna.fbcdn.net/v/t1.0-9/22046084_10155093244178230_4943131834435417068_n.jpg?_nc_cat=104&_nc_sid=110474&_nc_ohc=SXYfeyIhiHQAX8y0bCW&_nc_ht=scontent.fpuq3-1.fna&oh=a92069e80504e130fcf792086b3f162b&oe=5F512340);">
								<div class="overlay overlay-member d-flex flex-column justify-content-end align-items-center">
									<p class="text-white">Analista informático de Puerto Natales</p>
									<div class="line"></div>
									<div class="social d-flex align-items-center justify-content-center">
										<a href="mailto:daniel@nekorp.com"><i class="fa fa-envelope"></i></a>
									</div>
								</div>
							</div>
							<div class="desc text-center">
								<h5 class="text-uppercase"><a href="#">Daniel Cortés</a></h5>
								<p>Programador a cargo de ShowCase</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-member">
							<div class="thumb relative" style="background: url(img/t2.jpg);">
								<div class="overlay overlay-member d-flex flex-column justify-content-end align-items-center">
									<p class="text-white">This article is floated online with an aim to help you find the best dvd printing solution. Dvd</p>
									<div class="line"></div>
									<div class="social d-flex align-items-center justify-content-center">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
							</div>
							<div class="desc text-center">
								<h5 class="text-uppercase"><a href="#">Rodney Cooper</a></h5>
								<p>Creative Art Director</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-member">
							<div class="thumb relative" style="background: url(img/t3.jpg);">
								<div class="overlay overlay-member d-flex flex-column justify-content-end align-items-center">
									<p class="text-white">This article is floated online with an aim to help you find the best dvd printing solution. Dvd</p>
									<div class="line"></div>
									<div class="social d-flex align-items-center justify-content-center">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
							</div>
							<div class="desc text-center">
								<h5 class="text-uppercase"><a href="#">Dora Walker</a></h5>
								<p>Senior Core Developer</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-member">
							<div class="thumb relative" style="background: url(img/t4.jpg);">
								<div class="overlay overlay-member d-flex flex-column justify-content-end align-items-center">
									<p class="text-white">This article is floated online with an aim to help you find the best dvd printing solution. Dvd</p>
									<div class="line"></div>
									<div class="social d-flex align-items-center justify-content-center">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
							</div>
							<div class="desc text-center">
								<h5 class="text-uppercase"><a href="#">Lena Keller</a></h5>
								<p>Creative Content Developer</p>
							</div>
						</div>
					</div>
				</div>-->
			</div>
		</section>
		<!-- End Team member Area -->

		<!-- Start Digital Studio -->
		<section class="section-full studio-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="studio-content">
							<p class="text-uppercase text-white">Creamos aplicaciones a tu medida</p>
							<h2 class="h1 text-white text-uppercase mb-20">Si necesitas otra solución informatica <br> podemos ayudarte</h2>
							<p class="text-white mb-30">ShowCase es un proyecto creado bajo la empresa <a href="" style="color: white; font-style: bold;">NEKORP Group</a>, quienes desarrollan paginas web y sistemas a la medida. <br>
							¿Quieres conocerlos? Puedes hacer click en el siguiente botón para conocerlos</p>
							<a href="#" class="primary-btn text-white d-inline-flex align-items-center">Visita Nekorp<span class="lnr lnr-arrow-right"></span></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Digital Studio -->
		<!-- Start Pricing Area -->
		<section class="section-full">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="product-area-title text-center">
							<h2 class="h1">Nuestros planes <br> e implementación en ShowCase</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="single-pricing-table">
							<div class="top">
								<div class="head text-center">
									<span class="lnr lnr-shirt"></span><br>
									<h5 class="text-white text-uppercase">Standard</h5>
									<small style="color: white;">01 local comercial</small>
								</div>
								<div class="package text-center">
									<div class="price">$12.000 + IVA</div>
									<span class="text-white">al mes</span>
								</div>
							</div>

							<div class="bottom text-center">
								<ul class="feature text-center">
									<li>Sistema base inglés / español</li>
									<li>Personalizable a los colores de marca</li>
									<li>2 Usuarios</li>
									<li>Productos y categorías ilimitadas</li>
									<li>Redes Sociales incorporadas</li>
									<li><small>* Costos de implementación no incluidos</small></li>
								</ul>
								<!--<a href="#" class="primary-btn text-uppercase d-inline-flex align-items-center">Purchase<span class="lnr lnr-arrow-right"></span></a>-->
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="single-pricing-table">
							<div class="top">
								<div class="head text-center">
									<span class="lnr lnr-shirt"></span><br>
									<h5 class="text-white text-uppercase">Superior</h5>
									<small style="color: white;">hasta 3 locales comerciales</small>
								</div>
								<div class="package text-center">
									<div class="price">$ 23.000 + IVA</div>
									<span class="text-white">Por mes</span>
								</div>
							</div>

							<div class="bottom text-center">
								<ul class="feature text-center">
									<li>Sistema base inglés / español</li>
									<li>Personalizable a los colores de marca</li>
									<li>Hasta 5 usuarios separados por sucursales</li>
									<li>Productos y categorías ilimitadas</li>
									<li>Redes Sociales incorporadas</li>
									<li><small>* Costos de implementación no incluidos</small></li>
								</ul>
								<!--<a href="#" class="primary-btn text-uppercase d-inline-flex align-items-center">Purchase<span class="lnr lnr-arrow-right"></span></a>-->
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="single-pricing-table">
							<div class="top">
								<div class="head text-center">
									<span class="lnr lnr-apartment"></span>
									<h5 class="text-white text-uppercase">Premium</h5>
								</div>
								<div class="package text-center">
									<div class="price">$ 12.000 por local + IVA</div>
									<span class="text-white">Per month</span>
								</div>
							</div>

							<div class="bottom text-center">
								<ul class="feature text-center">
									<li>Diseño completamente personalizado</li>
									<li>Incorpora chat en vivo con tus principales redes sociales</li>
									<li>4 Usuarios con diferentes niveles de acceso</li>
									<li><small>* Costos de implementación no incluidos</small></li>
								</ul>
								<!--<a href="#" class="primary-btn text-uppercase d-inline-flex align-items-center">Purchase<span class="lnr lnr-arrow-right"></span></a>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Pricing Area -->
		<!-- Start Testimonial Area -->
		<!--<section class="section-full gray-bg">
			<div class="container">
				<div class="active-testimonial-carousel">
					<div class="single-testimonial">
						<img src="img/ts1.png" class="img-circle" alt="">
						<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory </p>
						<div class="author text-center">
							<h6 class="text-uppercase"><a href="#">Mark Alviro Wiens</a></h6>
							<span>CEO at Google</span>
						</div>
					</div>
					<div class="single-testimonial">
						<img src="img/ts2.png" class="img-circle" alt="">
						<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory </p>
						<div class="author text-center">
							<h6 class="text-uppercase"><a href="#">Mark Alviro Wiens</a></h6>
							<span>CEO at Google</span>
						</div>
					</div>
					<div class="single-testimonial">
						<img src="img/ts3.png" class="img-circle" alt="">
						<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory </p>
						<div class="author text-center">
							<h6 class="text-uppercase"><a href="#">Mark Alviro Wiens</a></h6>
							<span>CEO at Google</span>
						</div>
					</div>
					<div class="single-testimonial">
						<img src="img/ts3.png" class="img-circle" alt="">
						<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory </p>
						<div class="author text-center">
							<h6 class="text-uppercase"><a href="#">Mark Alviro Wiens</a></h6>
							<span>CEO at Google</span>
						</div>
					</div>
					<div class="single-testimonial">
						<img src="img/ts3.png" class="img-circle" alt="">
						<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory </p>
						<div class="author text-center">
							<h6 class="text-uppercase"><a href="#">Mark Alviro Wiens</a></h6>
							<span>CEO at Google</span>
						</div>
					</div>
				</div>
			</div>
		</section>-->
		<!-- End Testimonial Area -->
		<!-- Start Publish Area -->

		<!-- Start Contact Area -->
		<section id="contact" class="section-full gray-bg">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="product-area-title text-center">
							<p class="text-uppercase">Contácto</p>
							<h2 class="h1">Contáctanos a través <br> de los siguientes medios</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 mt-30">
						<p>Puedes contactarnos desde el ícono de Facebook disponible o también a través de los siguientes enlaces habilitados para llamarnos o escribirnos directamente:</p>
						<div class="row">
							<div class="col-sm-6">
								<div class="address mt-20">
									<h6 class="text-uppercase mb-15">Dirección Física</h6>
									<p>Estamos ubicados<br> en Puerto Natales <br> Región de Magallanes y Antártica Chilena</p>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="address mt-20">
									<h6 class="text-uppercase mb-15">Contacto web</h6>
									<ul>
										<li><a href="tel:+56953414450">¡Llámanos!</a></li>
										<li><a href="https://wa.me/56953414450?text=Me%20interesa%20cotizar%20con%20ustedes%20servicios%20digitales">¡Escríbenos por whatsapp!</a></li>
										<li><a href="mailto:daniel@nekorp.com">Envíanos un mail</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mt-30">
						<form id="myForm" method="post" class="contact-form">
							<div class="single-input color-2 mb-10">
								<input type="text" name="fname" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required>
							</div>
							<div class="single-input color-2 mb-10">
								<input type="email" name="email" placeholder="Email Address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required>
							</div>
							<div class="single-input color-2 mb-10">
								<input type="text" name="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" required>
							</div>

							<div class="single-input color-2 mb-10">
								<textarea name="message" placeholder="Type your message here..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type your message here...'" required></textarea>
							</div>
							<div class="d-flex justify-content-end"><button type="submit" class="mt-10 primary-btn d-inline-flex text-uppercase align-items-center">Contáctanos<span class="lnr lnr-arrow-right"></span></button></div>
							<input type="hidden" name="recaptcha" id="recaptcha">
							<div class="alert"></div>
							<?php
								$contacto = new ContactoController();
								$contacto->ctrEnviarMailContacto();
							?>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact Area -->

		<footer class="section-full">
			<div class="container">
				<!--<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="single-footer-widget">
							<h6 class="text-white text-uppercase mb-20">About Agency</h6>
							<p>The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point </p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-footer-widget">
							<h6 class="text-white text-uppercase mb-20">Navigation Links</h6>
							<div class="d-flex">
								<ul class="footer-nav">
									<li><a href="#">Home</a></li>
									<li><a href="#">Features</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Portfolio</a></li>
								</ul>
								<ul class="ml-30 footer-nav">
									<li><a href="#">Team</a></li>
									<li><a href="#">Pricing</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-footer-widget">
							<h6 class="text-white text-uppercase mb-20">Newsletter</h6>
							<p>For business professionals caught between high OEM price and mediocre print and graphic output,</p>
							<div id="mc_embed_signup">
								<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01" method="get" class="subscription relative d-flex justify-content-center">
									<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required>
									<div style="position: absolute; left: -5000px;">
										<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
									</div>
									<button type="submit" class="newsletter-btn" name="subscribe"><span class="lnr lnr-location"></span></button>
									<div class="info"></div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-footer-widget">
							<h6 class="text-white text-uppercase mb-20">Instafeed</h6>
							<ul class="instafeed d-flex flex-wrap">
								<li><img src="img/i1.jpg" alt=""></li>
								<li><img src="img/i2.jpg" alt=""></li>
								<li><img src="img/i3.jpg" alt=""></li>
								<li><img src="img/i4.jpg" alt=""></li>
								<li><img src="img/i5.jpg" alt=""></li>
								<li><img src="img/i6.jpg" alt=""></li>
								<li><img src="img/i7.jpg" alt=""></li>
								<li><img src="img/i8.jpg" alt=""></li>
							</ul>
						</div>
					</div>
				</div>-->
				<div class="footer-bottom d-flex justify-content-between align-items-center">
					<p class="footer-text m-0">Copyright &copy; 2017  |  Derechos reservados a <a href="#">Nekorp Group</a>.</p>
					<div class="footer-social d-flex align-items-center">
						<a target="_blank" href="https://www.facebook.com/Nekorp-Group-1175745969193812/"><i class="fa fa-facebook"></i></a>
						<a href="https://wa.me/56953414450?text=Me%20interesa%20cotizar%20con%20ustedes%20servicios%20digitales"><i class="fa fa-whatsapp"></i></a>
						<a href="https://www.linkedin.com/in/daniel-cortés-692515119" target="_blank"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
		</footer>

		<script src="/view/principal/js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="/view/principal/js/vendor/bootstrap.min.js"></script>
		<script src="/view/principal/js/jquery.ajaxchimp.min.js"></script>
		<script src="/view/principal/js/jquery.sticky.js"></script>
		<script src="/view/principal/js/owl.carousel.min.js"></script>
		<script src="/view/principal/js/mixitup.min.js"></script>
		<script src="/view/principal/js/main.js"></script>
	</body>
</html>
