@extends('master')



@section('content')
	@if (Auth::check())
	<div class='row'>
		<div class='col-xs-12'>
			<div class="panel panel-default">
				<div class="panel-heading">Welcome {{ Auth::user()->name ?: '' }}</div>
					<div class="panel-body">
						<div class='row'>
							<div class='col-xs-12'>
								<div class='row'>
									<div class='col-xs-12 col-md-2'>
										<div class='row'>
											<div class='col-xs-12'>
												<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">	
											</div>
										</div>
										<ul class="nav nav-pills nav-stacked">
											<li><a href="{{URL::to('/profile')}}/user_id={{Auth::user()->id }}">Profile</a></li>
										    <li><a href="{{URL::to('/gallery')}}/user_id={{Auth::user()->id }}">Photo Gallery</a></li>
										    <hr/>
										    <li><a href="#">Journal</a></li>
										    <li><a href="#">Body Goals</a></li>
										    <li><a href="#">Body Journey</a></li>
										    <li><a href="#">Workout Plan</a></li>
										</ul>
									</div>
									<div class='col-xs-12 col-md-10'>
										<div class='row'>
											<div class='col-xs-12'>
												<h3 class='text-center'> Body Journey <small> Push Yourself! </small></h3>
												<hr />
											</div>
										</div>
										<div class='row'>
											<div class='col-xs-12'>
												<div class='row'>
													<div class='col-xs-12'>
														<div class='row'>
															<div class="col-md-4 text-center">Before</div>
  															<div class="col-md-4 col-md-offset-4 text-center">After</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col-xs-12'>
													<div class='col-xs-4 pad-none'>
														<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">
													</div>
													<div class='col-xs-4 pad-none'>
														<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">
													</div>
													<div class='col-xs-4 pad-none'>
														<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">
													</div>
												</div>
												</div>
												<div class='row'>
													<div class='col-xs-12 text-center'>
														<a href='#'>View Your Journey</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	@endif
	<div class='row bottom-margin' id="home-carousel">
		<div class='col-sm-12 hidden-sm hidden-xs'>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <a href="{{URL::to('/auth/register')}}"><img src="{{ URL::asset('img/welcome.png') }}" alt='carousel-banner'></a>
			      <div class="carousel-caption">
			       
			      </div>
			    </div>
			    <div class="item">
			      <a href="{{URL::to('/auth/register')}}"><img src="{{ URL::asset('img/banners/signupforfree.png') }}" alt='carousel-banner'></a>
			      <div class="carousel-caption">
			       
			      </div>
			    </div>
			   <div class="item">
			      <a href="{{URL::to('/auth/register')}}"><img src="{{ URL::asset('img/focus-banner.png') }}" alt='carousel-banner'></a>
			      <div class="carousel-caption">
			       
			      </div>
			    </div>
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
	<div class='row bottom-margin' id='motiv-banner'>
		<div class='col-sm-12' id='home-middle-message'>
			<div id='motiv-title'>strength</div>
		</div>
	</div>
	<div class='row bottom-margin' id='new-usr'>
	  	<div class='col-sm-12'>
	  		<div class='row'>
	  			<div class='col-sm-7'>
	  				<div class='row'>
	  					<div class='col-sm-12' id='sec-title'>
	  						<h3>New Users</h3>
	  						<hr />
	  					</div>
	  				</div>
	  				<div class='row'>
	  					<div class='col-sm-12 col-lg-3'>
	  						<img src="http://placehold.it/960x600" alt='new-usr-photo' class="img-responsive">
	  						<div class='nu-link'><a href='#'>View Profile</a></div>
	  					</div>
	  					<div class='col-sm-12 col-lg-3'>
	  						<img src="http://placehold.it/960x600" alt='new-usr-photo' class="img-responsive">
	  						<div class='nu-link'><a href='#'>View Profile</a></div>
	  					</div>
	  					<div class='col-sm-12 col-lg-3'>
	  						<img src="http://placehold.it/960x600" alt='new-usr-photo' class="img-responsive">
	  						<div class='nu-link'><a href='#'>View Profile</a></div>
	  					</div>
	  					<div class='col-sm-12 col-lg-3'>
	  						<img src="http://placehold.it/960x600" alt='new-usr-photo' class="img-responsive">
	  						<div class='nu-link'><a href='#'>View Profile</a></div>
	  					</div>
	  				</div>
	  			</div>
	  			<div class='col-sm-5'>
	  				<div class='row'>
	  					<div class='col-sm-12'>
	  						<img src="http://placehold.it/600x200" alt='ad-space-right' class="img-responsive">
	  					</div>
	  				</div>	
	  			</div>
	  		</div>
	  	</div>
	  </div>
	  <div class='row' id='transformations'>
	  	<div class='col-sm-12'>
	  		<div class='row'>
	  			<div class='col-sm-12'>
  					<h3>Transformations</h3>
  					<hr />
  				</div>
	  		</div>
	  		<div class='row'>
			  	<div class='col-sm-6'>
			  		<div class='col-sm-12'><h4 class='text-center'>Male</h4></div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<img src="{{ URL::asset('img/male-weight.jpg') }}" alt='home-trans-photo' class="img-responsive">
			  			</div>
			  		</div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<div class="list-group">
							  <a href="#" class="list-group-item">Male Teens ( 19 and below )</a>
							  <a href="#" class="list-group-item">Male ( 20 - 30 )</a>
							  <a href="#" class="list-group-item">Male ( 30 - 40 )</a>
							  <a href="#" class="list-group-item">Male ( 40 + )</a>
							  <a href="#" class="list-group-item">All Male</a>
							</div>
			  			</div>
			  		</div>
			  	</div>
			  	<div class='col-sm-6'>
			  		<div class='col-sm-12'><h4 class='text-center'>Female</h4></div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<img src="{{ URL::asset('img/female-weight.jpg') }}" alt='home-trans-photo' class="img-responsive">
			  			</div>
			  		</div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<div class="list-group">
							  <a href="#" class="list-group-item">Female Teens ( 19 and below )</a>
							  <a href="#" class="list-group-item">Female ( 20 - 30 )</a>
							  <a href="#" class="list-group-item">Female ( 30 - 40 )</a>
							  <a href="#" class="list-group-item">Female ( 40 + )</a>
							  <a href="#" class="list-group-item">All Female</a>
							</div>
			  			</div>
			  		</div>
			  	</div>
			</div>
	  	</div>
	  </div>
@stop