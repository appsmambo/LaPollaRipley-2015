<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap 101 Template</title>
		<link href="{{url()}}/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{url()}}/css/jquery.fullPage.css" rel="stylesheet">
		<link href="{{url()}}/css/estilos.css" rel="stylesheet">
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<section class="header container-fluid">
			<header>
				<div class="container">
					<div class="row">
						<div class="col-xs-3">
							<a href="http://www.ripley.com.pe/" target="_blank">
								<img src="{{url()}}/img/logo-ripley.jpg" alt="" class="img-responsive logo">
							</a>
						</div>
						<div class="col-xs-6">
							<p class="text-center terminos">
								<a href="#">
									TÉRMINOS Y CONDICIONES
								</a>
							</p>
						</div>
						<div class="col-xs-3">
							<p class="sociales text-right">
								<span class="hidden-xs">SIGUENOS EN:&nbsp;&nbsp;</span>
								<a href="https://www.facebook.com/RipleyPeru" target="_blank">
									<img src="{{url()}}/img/social-facebook.jpg" alt="">
								</a>
								<a href="https://twitter.com/ripleyenperu" target="_blank">
									<img src="{{url()}}/img/social-twitter.jpg" alt="">
								</a>
							</p>
						</div>
					</div>
				</div>
			</header>
		</section>
		<div id="fullpage">
			<div class="section">
				<div class="slide" id="slide1">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<a href="#" class="participa center-block">
									<h1 class="hidden">Participa en la Polla Ripley y ¡Podrás llevarte tu TV Gratis! <small>exclusivo con tarjeta ripley</small></h1>
									<img src="{{url()}}/img/inicio.png" alt="" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="slide" id="slide2">
					<div class="container">
						<h2>
							registra tus datos
						</h2>
						<img src="{{url()}}/img/balon.png" class="balon hidden-md" alt="">
						<img src="{{url()}}/img/btn-siguiente.png" alt="" class="siguiente">
						<div class="contenido">
							<h3 class="center-block">
								Para <span>registrar tu pronóstico</span> primero debes de ingresar tus datos personales y los datos de la compra que realizaste.
							</h3>
							<form class="form-horizontal">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-sm-8 col-md-7">
												<div class="formulario">
													<div class="form-group">
														<label for="nro_ticket" class="col-sm-5 control-label">Nº de ticket de venta:</label>
														<div class="col-sm-7">
															<input type="number" class="form-control inputbox" id="nro_ticket" name="nro_ticket" maxlength="8">
														</div>
													</div>
													<div class="form-group">
														<label for="nro_tarjeta" class="col-sm-5 control-label">Nº de Tarjeta Ripley:</label>
														<div class="col-sm-7">
															<input type="number" class="form-control inputbox" id="nro_tarjeta" name="nro_tarjeta" maxlength="16">
														</div>
													</div>
													<div class="form-group">
														<label for="nombres" class="col-sm-5 control-label">NombreS:</label>
														<div class="col-sm-7">
															<input type="text" class="form-control inputbox" id="nombres" name="nombres" maxlength="50">
														</div>
													</div>
													<div class="form-group">
														<label for="apellidos" class="col-sm-5 control-label">APELLIDOS:</label>
														<div class="col-sm-7">
															<input type="text" class="form-control inputbox" id="apellidos" name="apellidos" maxlength="50">
														</div>
													</div>
													<div class="form-group">
														<label for="direccion" class="col-sm-5 control-label">dirección:</label>
														<div class="col-sm-7">
															<input type="text" class="form-control inputbox" id="direccion" name="direccion" maxlength="100">
														</div>
													</div>
													<div class="form-group">
														<label for="telefono" class="col-sm-5 control-label">Teléfono:</label>
														<div class="col-sm-7">
															<input type="tel" class="form-control inputbox" id="telefono" name="telefono" maxlength="20">
														</div>
													</div>
													<div class="form-group">
														<label for="dni" class="col-sm-5 control-label">Nº de DNI:</label>
														<div class="col-sm-7">
															<input type="number" class="form-control inputbox" id="dni" name="dni" maxlength="8">
														</div>
													</div>
													<div class="form-group">
														<label for="email" class="col-sm-5 control-label">Correo electrónico:</label>
														<div class="col-sm-7">
															<input type="email" class="form-control inputbox" id="email" name="email" maxlength="100">
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-4 col-md-5">
												<p>
													<span class="hidden-sm hidden-xs"><br></span>
													<img src="{{url()}}/img/ticket.png" alt="" class="center-block img-responsive pull-left">
												</p>
												<div class="clearfix"></div>
												<p>
													<span class="hidden-xs"><br><br></span>
													<input type="checkbox" name="terminos" id="terminos" class="checkbox-custom">
													<label for="terminos">Acepto los términos y condiciones.</label>
													<input type="checkbox" name="newsletter" id="newsletter" class="checkbox-custom">
													<label for="newsletter">Deseo recibir información de Ripley</label>
												</p>
											</div>
										</div>
										<p>
											<span class="hidden-xs"><br></span>
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="slide" id="slide3">
					<div class="container">
						<h2>
							Ingresa tu pronóstico DE LA COPA AMÉRICA
							<small>
								Arrastra las selecciones hacia los<br>
								<span>4 primeros puestos</span> según tu <span>pronóstico.</span>
							</small>
						</h2>
						<img src="{{url()}}/img/balon.png" class="balon hidden-md" alt="">
						<input type="image" src="{{url()}}/img/btn-registro.png" class="registrar">
						<div class="contenido">
							<div class="container">
								<div class="row">
									<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
										<div class="row tabla con-borde no-gutter">
											<div class="paises col-sm-4">
												<h4>
													Grupo A
												</h4>
												<div class="item">
													<img src="{{url()}}/img/bandera/chile.jpg" alt="" class="pull-right">
													chile
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/mexico.jpg" alt="" class="pull-right">
													méxico
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/ecuador.jpg" alt="" class="pull-right">
													ecuador
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/bolivia.jpg" alt="" class="pull-right">
													bolivia
												</div>
											</div>
											<div class="paises col-sm-4">
												<h4>
													Grupo B
												</h4>
												<div class="item">
													<img src="{{url()}}/img/bandera/argentina.jpg" alt="" class="pull-right">
													argentina
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/uruguay.jpg" alt="" class="pull-right">
													uruguay
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/paraguay.jpg" alt="" class="pull-right">
													paraguay
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/jamaica.jpg" alt="" class="pull-right">
													jamaica
												</div>
											</div>
											<div class="paises col-sm-4">
												<h4>
													Grupo C
												</h4>
												<div class="item">
													<img src="{{url()}}/img/bandera/brasil.jpg" alt="" class="pull-right">
													brasil
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/colombia.jpg" alt="" class="pull-right">
													colombia
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/peru.jpg" alt="" class="pull-right">
													perú
												</div>
												<div class="item">
													<img src="{{url()}}/img/bandera/venezuela.jpg" alt="" class="pull-right">
													venezuela
												</div>
											</div>
										</div><!-- fin tabla -->
										<p class="hidden-xs">
											<br>
											<img src="{{url()}}/img/copa.png" alt="" class="center-block img-responsive">
										</p>
										<div class="row tabla con-borde no-gutter">
											<div class="pais col-sm-3">
												<p>
													&nbsp;
												</p>
											</div>
											<div class="pais col-sm-3">
												<p>
													&nbsp;
												</p>
											</div>
											<div class="pais col-sm-3">
												<p>
													&nbsp;
												</p>
											</div>
											<div class="pais col-sm-3">
												<p>
													&nbsp;
												</p>
											</div>
										</div><!-- fin tabla -->
										<div class="row no-gutter">
											<div class="col-sm-3">
												<h5>
													campeón
												</h5>
											</div>
											<div class="col-sm-3">
												<h5>
													subcampeón
												</h5>
											</div>
											<div class="col-sm-3">
												<h5>
													tercer puesto
												</h5>
											</div>
											<div class="col-sm-3">
												<h5>
													cuarto puesto
												</h5>
											</div>
										</div>
										<p>
											<span class="hidden-xs"><br></span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slide" id="slide4">
					<p>
						#4 You can even click on the navigation and jump directly to another section.
					</p>
				</div>
			</div>
		</div>
		<section class="footer container-fluid">
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-xs-3 col-sm-2">
							<img src="{{url()}}/img/tarjeta-ripley.png" alt="" class="img-responsive tarjeta">
						</div>
						<div class="col-xs-5 col-sm-8">
							<p class="hidden-xs">
								<img src="{{url()}}/img/marcas.png" alt="" class="img-responsive center-block marcas">
							</p>
						</div>
						<div class="col-xs-4 col-sm-2">
							<img src="{{url()}}/img/logo-ripley-footer.jpg" alt="" class="img-responsive pull-right ripley">
						</div>
					</div>
				</div>
			</footer>
		</section>

		<script src="{{url()}}/js/jquery.min.js"></script>
		<script src="{{url()}}/js/jquery-ui.min.js"></script>
		<script src="{{url()}}/js/bootstrap.min.js"></script>
		<script src="{{url()}}/js/jquery.fullPage.min.js"></script>
		<script src="{{url()}}/js/jquery.customInput.js"></script>
		<script>
			$(document).ready(function() {
				$('#fullpage').fullpage({
					slidesNavigation:false,
					/*keyboardScrolling:false,*/
					controlArrows:false,
					fixedElements:'.header, .footer',
					loopHorizontal:false,
					touchSensitivity:1800
				});
				$('.participa, .siguiente').click(function() {
					$.fn.fullpage.moveSlideRight();
				});
				$('.checkbox-custom').customInput();
				$('.item').draggable({
					revert:true,
					cursor:'pointer'
				});
				$('.pais').droppable({
					accept:'.item',
					drop: function( event, ui ) {
						var html = ui.draggable.html();
						$(this).find("p").html(html);
					}
				});
			});
		</script>
	</body>
</html>