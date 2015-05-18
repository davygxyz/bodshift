<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BodShift | <?php echo $title ?> </title>
    <link rel="stylesheet" type="text/stylesheet" href="<?php echo base_url();?>assets/css/foundation.min.css"/>
    <link rel="stylesheet" type="text/stylesheet" href="<?php echo base_url();?>assets/css/stylesheet.css"/>
    <link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/fastclick.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/foundation.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js"></script>
  </head>
  <body>

  	<div class="fixed">
	  <nav class="top-bar" data-topbar role="navigation">
	     <ul class="title-area">
		    <li class="name">
		      <h1><a href='".base_url()."index.php/home'>
		      	Bodshift
		      </a></h1>
		    </li>
		     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>

		  </ul>
		  <section class="top-bar-section">
		    <!-- Right Nav Section -->
		    <ul class="right">
				<?php if(isset($logged_in)){
						if($logged_in == TRUE){
							echo "
								<li><a href='".base_url()."index.php/logout'>Log Out</a></li>
							";
						}
					}else{
						echo "
							<li class='divider'></li>
					     	<li><a href='".base_url()."home'>Home</a></li>
					     	<li class='divider'></li>
					     	<li><a href='".base_url()."contact-us'>Contact Us</a></li>
					     	<li class='divider'></li>
							<li><a href='".base_url()."signup'>Sign Up</a></li>
							<li class='divider'></li>
							<li><a href='".base_url()."login'>Login</a></li>
						";
						}?>
		    </ul>
		  </section>
	  </nav>
	</div>
	
	<div class="row margin-btm-20" id='welcome-banner'>
		<div class="small-12 columns">
			<img src="<?php echo base_url();?>/assets/img/banners/welcome-banner.png" />
	</div>
	</div>
	<div class="row" id='page-wrapper'>
		<div class='row '>
					<!--Left Column-->
				<?php if($title == 'Welcome' || $title == 'Signup' || $title == 'Login'){
					echo "<div class='small-12 columns'>";
				}else{
					echo "<div class='small-12 large-9 columns'>";
				}?>
	