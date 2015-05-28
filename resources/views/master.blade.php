<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bodshift | {{ $title }}</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Main Admin Css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body> 
	<div class="container" id='page-wrapper'>
	<div class='row'>
		<div class='row' id='header-banner'>
			<div class='col-sm-12'>
				<img src="{{ URL::asset('img/header-banner.png') }}" alt='header-banner' class="img-responsive"/>
			</div>
		</div>
		<div class='row' id='nav'>
			<div class='col-sm-12'>
				<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
				  	<div class="navbar-header">
				  		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
				    	<a class="navbar-brand" href="/">
				        	<img alt="Brand" src="{{ URL::asset('img/logo.png') }}" width="100px class="img-responsive"">
				      	</a>
				     </div>
				      	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      						<ul class="nav navbar-left navbar-nav">
      							<li><a href="about">About</a></li>
      							<li><a href="donate">Donate</a></li>
      							<li><a href="contact">Contact Us</a></li>
      							<li><a href="motivation">Motivation</a></li>
      						</ul>
      						<ul class="nav navbar-right navbar-nav">
      							<li><a href="#">Log In</a></li>
      							<li><a href="#">Sign Up</a></li>
      						</ul>
      					</div>
				  </div>
				</nav>
			</div>
		</div>
		<div class='row bottom-margin' id="ad-space-top">
			<div class='col-sm-12'>
				<img src="http://placehold.it/960x100" alt='ad-space-top' class="img-responsive">
			</div>
		</div>
		<div class='row bottom-margin' id='main-content'>
			<div class='col-sm-12'>
			@yield('content')
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12' id='footer'>
				
			</div>
		</div>


	</div>
</div>
	@yield('footer')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>