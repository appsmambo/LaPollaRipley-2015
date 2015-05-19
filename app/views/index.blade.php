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
						<div class="col-sm-2">
							<img src="{{url()}}/img/logo-ripley.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-sm-8">

						</div>
						<div class="col-sm-2">

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
									<img src="{{url()}}/img/inicio.png" alt="" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="slide" id="slide2">
					<p>
						#2 You can even click on the navigation and jump directly to another section.
					</p>
				</div>
				<div class="slide" id="slide3">
					<p>
						#3 You can even click on the navigation and jump directly to another section.
					</p>
				</div>
				<div class="slide" id="slide4">
					<p>
						#4 You can even click on the navigation and jump directly to another section.
					</p>
				</div>
			</div>
		</div>
		<section class="footer container-fluid">
			<header>
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<img src="{{url()}}/img/logo-ripley.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-sm-8">

						</div>
						<div class="col-sm-2">

						</div>
					</div>
				</div>
			</header>
		</section>

		<script src="{{url()}}/js/jquery.min.js"></script>
		<script src="{{url()}}/js/bootstrap.min.js"></script>
		<script src="{{url()}}/js/jquery.fullPage.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#fullpage').fullpage({
					slidesNavigation:false,
					keyboardScrolling:false,
					controlArrows:false,
					fixedElements:'.header, .footer',
					loopHorizontal:false
				});
				$('.participa').click(function() {
					$.fn.fullpage.moveSlideRight();
				});
			});
		</script>
	</body>
</html>