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
									<div class='col-xs-12 col-md-3'>
										<div class='row'>
											<div class='col-xs-12'>
												<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">	
											</div>
										</div>
										<ul class="nav nav-pills nav-stacked">
											<li><a href="#">View Profile</a></li>
										    <li><a href="#">Edit Profile</a></li>
										    <li><a href="#">Photo Gallery</a></li>
										</ul>
									</div>
									<div class='col-xs-12 col-md-8'>
										<div class='row'>
											<div class='col-xs-12'>
												<h4>Your Transformation</h4>
												<hr />
											</div>
										</div>
										<div class='row'>
											<div class='col-xs-12'>
												<div class='row'>
													<div class='col-xs-12'>
														<div class='row'>
															<div class="col-md-4">Before</div>
  															<div class="col-md-4 col-md-offset-4">After</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col-xs-4'>
														<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">
													</div>
													<div class='col-xs-4'>
														<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">
													</div>
													<div class='col-xs-4'>
														<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">
													</div>
												</div>
												<div class='row'>
													<div class='col-xs-12'>
														<a href='#'>View Your Progress</a>
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
			      <img src="http://placehold.it/1200x500" alt='carousel-content'>
			      <div class="carousel-caption">
			        Test One
			      </div>
			    </div>
			    <div class="item">
			      <img src="http://placehold.it/1200x500" alt='carousel-content'>
			      <div class="carousel-caption">
			       Test Two
			      </div>
			    </div>
			   <div class="item">
			      <img src="http://placehold.it/1200x500" alt='carousel-content'>
			      <div class="carousel-caption">
			       Test Three
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
		<div class='col-sm-12'>
			<img src="http://placehold.it/960x500" alt='motiv-banner' class="img-responsive">
		</div>
	</div>
	<div class='row bottom-margin' id='usrs-info'>
	  	<div class='col-sm-12'>
	  		<div class='row'>
	  			<div class='col-sm-7'>
	  				<div class='row'>
	  					<div class='col-sm-12' id='sec-title'><h4>New Users</h4></div>
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
	  				<div class='col-sm-12'><h4>Transformations</h4></div>
			  	<div class='col-sm-6'>
			  		<div class='col-sm-12'><h5>Male</h5></div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<img src="http://placehold.it/600x300" alt='ad-space-right' class="img-responsive">
			  			</div>
			  		</div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<div class="list-group">
							  <a href="#" class="list-group-item"> Teens (19 and below)</a>
							  <a href="#" class="list-group-item">Adults (20 - 30)</a>
							  <a href="#" class="list-group-item">Adults (30 - 40)</a>
							  <a href="#" class="list-group-item">Adults (40 +)</a>
							</div>
			  			</div>
			  		</div>
			  	</div>
			  	<div class='col-sm-6'>
			  		<div class='col-sm-12'><h5>Female</h5></div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<img src="http://placehold.it/600x300" alt='ad-space-right' class="img-responsive">
			  			</div>
			  		</div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<div class="list-group">
							  <a href="#" class="list-group-item"> Teens (19 and below)</a>
							  <a href="#" class="list-group-item">Adults (20 - 30)</a>
							  <a href="#" class="list-group-item">Adults (30 - 40)</a>
							  <a href="#" class="list-group-item">Adults (40 +)</a>
							</div>
			  			</div>
			  		</div>
			  	</div>
			</div>
	  	</div>
	  </div>
@stop