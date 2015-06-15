<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bodshift | {{ $title or 'You are in control of your own body!' }}
	</title>
	<!-- Google Font -->
	<link href='http://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet' type='text/css'>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Main Admin Css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/dropzone.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/lightbox.css') }}">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body> 
	<!--Page Wrapper Starts-->
	<div class="container">
		<div class='row'>
			<div class='col-xs-12' id='site-wrapper'>
				<!--Site Banner Header Start-->
				<div class='row'>
					<div class='col-xs-12' id='header-banner'>
						
					</div>
				</div>
				<!--Site Banner Headerr End-->
				<!--Site Navigation Start-->
				<div class='row' id='nav'>
					<div class='col-sm-12 0-margin'>
						<nav class="navbar navbar-inverse">
						  <div class="container-fluid">
						  	<div class="navbar-header">
						  		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							      </button>
						    	<a class="navbar-brand" href="{{URL::to('/')}}">
						        	<img alt="Brand" src="{{ URL::asset('img/logo.png') }}" width="100px class="img-responsive"">
						      	</a>
						     </div>
						      	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      						<ul class="nav navbar-left navbar-nav">
		      							<li><a href="{{URL::to('/about')}}">About</a></li>
		      							<li><a href="{{URL::to('/donate')}}">Donate</a></li>
		      							<li><a href="{{URL::to('/contact')}}">Contact Us</a></li>
		      							<li><a href="{{URL::to('/motivation')}}">Motivation</a></li>
		      						</ul>
		      						<ul class="nav navbar-right navbar-nav">
		      							@if (Auth::guest())
		      							<li><a href="{{URL::to('/auth/login')}}">Log In</a></li>
		      							<li><a href="{{URL::to('/auth/register')}}">Sign Up</a></li>
		      							@else
		      							<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
		      							@endif
		      						</ul>
		      					</div>
						  </div>
						</nav>
					</div>
				</div>
				<!--Site Navigation End-->
				<!--Top Ad Start
				<div class='row bottom-margin'  id="ad-space-top">
					<div class='col-sm-12'>
						<img src="http://placehold.it/960x100" alt='ad-space-top' class="img-responsive">
					</div>
				</div>
				-->
				<!--Top Ad End-->
				<!--Site Content Start-->
				<div class='row bottom-margin'   id='main-content'>
					<div class='col-sm-12'>
					@yield('content')
					</div>
				</div>
				<!--Site Content End-->
				<!--Site Footer Start-->
				<div class='row'>
					<div class='col-sm-12' id='footer'>
						
					</div>
				</div>
				<!--Site Footer End-->
			</div>
		</div>
	</div>
	@yield('footer')
	<script src="{{ URL::asset('js/dropzone.js') }}"></script>
	<script src="{{ URL::asset('js/lightbox.min.js') }}"></script>
	<script src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>