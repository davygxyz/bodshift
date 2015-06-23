@extends('master')



@section('content')
	<!--IF USER IS LOGGED IN-->
	@if (Auth::check())
	<div class='row'>
		<div class='col-xs-12'>
			<!--USER CONTROL PANEL-->
			<div class="panel panel-default">
				<!--SHOW WELCOME MESSAGE-->
				<div class="panel-heading">Welcome {{ Auth::user()->name ?: '' }}</div>
				<!--****SHOW WELCOME MESSAGE END****-->
				<div class="panel-body">
					<div class='row'>
						<div class='col-xs-12'>
							<div class='row'>
								<!--LEFT SIDE-->
								<div class='col-xs-12 col-md-2 content'>
									<!--USER AVATAR-->
									<div class='row'>
										<div class='col-xs-12'>
											@if(isset(Auth::user()->avatar))
											<img src="{{ URL::asset('uploads/user/profile_pic').'/'.Auth::user()->avatar }}" alt='profile-picture' class="img-responsive">	
											@else
											<img src="{{ URL::asset('img/default-pic.png')}}" alt='profile-picture' class="img-responsive">
											@endif
										</div>
									</div>
									<!--****USER AVATAR****-->
									<!--USER NAVIGATION BAR ==LEFT SIDE-->
									<ul class="nav nav-pills nav-stacked">
										<li><a href="{{url('/profile')}}/user_id={{Auth::user()->id }}">Profile</a></li>
									    <li><a href="{{url('/gallery')}}/user_id={{Auth::user()->id }}">Photo Gallery</a></li>
									    <hr/>
									    <li><a href="{{url('/journal')}}/user_id={{Auth::user()->id }}">Journal</a></li>
									</ul>
									<!--****USER NAVIGATION BAR END****-->
								</div>
								<!--****LEFT SIDE END****-->
								<!--****RIGHT SIDE-->
								<div class='col-xs-12 col-md-10 content'>
									<!--SECTION TITLE-->
									<div class='row'>
										<div class='col-xs-12'>
											<h3 class='text-center'> Body Progress <small> Push Yourself! </small></h3>
											<hr />
										</div>
									</div>
									<!--****SECTION TITLE END****-->
									<div class='row'>
										<div class='col-xs-12'>
											<!--BEFORE AND AFTER HEADINGS-->
											<div class='row bottom-margin'>
												<div class='col-xs-12'>
													<div class='row'>
														<div class="col-md-4 text-center">Before</div>
															<div class="col-md-4 col-md-offset-4 text-center">After</div>
													</div>
												</div>
											</div>
											<!--****BEFORE AND AFTER HEADINGS END****-->
											<!--PROGRESS BANNER-->
											<div class='row bottom-margin'>
												<div class='col-xs-12' id='progress-banner'>
													<div class='col-xs-12 col-md-4 content'>
														<!--IF USER HAS BEFORE PIC-->
														@if(isset($before))
														<!--BEFORE IMAGE-->
														<div class='row bottom-margin'>
															<img src="{{URL::asset('uploads/user/progress').'/'.$before->file}}" alt='before-picture' class="img-responsive">
														</div>
														<!--****BEFORE IMAGE END****-->
														<!--UPDATE BUTTON DROPDOWN WITH FORM-->
														<div class='row bottom-margin'>
															<div class="dropdown">
																<button class="btn btn-primary btn-block dropdown-toggle" id="updateBefore" type='button' data-toggle="dropdown" aria-haspopup="true">Update Before Picture</button>
																<ul class='dropdown-menu content' role='menu' aria-labelledby='updateBefore'>
																	<hr/>
																	<!--Error Display-->
																	@if (count($errors) > 0)
																	<div class="alert alert-danger">
																		<strong>Whoops!</strong> There were some problems with your input.<br><br>
																		<ul>
																			@foreach ($errors->all() as $error)
																				<li>{{ $error }}</li>
																			@endforeach
																		</ul>
																	</div>
																	@endif
																	<!--Error Display End-->
																	<form id='before-form' method="POST" enctype="multipart/form-data" action="{{ url('before/update') }}">	
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<div class="form-group">
																			<label>Before Picture</label>
																			<div>
																				<input type="file" class="form-control" name="file" value="{{ old('file') }}">
																			</div>
																		</div>
																		<div class="form-group">
																		    <label for="weight">Weight</label>
																		    <input type="number" class="form-control" id="weight" name='weight' placeholder="Enter Weight">
																		</div>
																	    <button type="submit" class="btn btn-primary">Add</button>
																	</form>
																</ul>
															</div>
														</div>
														<!--****UPDATE BUTTON DROPDOWN WITH FORM END****-->
														<!--IF USER HAS BEFORE PIC END-->
														@else
														<!--IF USER DOES NOT HAVE BEFORE PIC-->
														<!--UPLOAD BUTTON DROPDOWN WITH FORM-->
														<div class='row bottom-margin'>
															<div class="dropdown">
																<button class="btn btn-primary btn-block dropdown-toggle" id="upBefore" type='button' data-toggle="dropdown" aria-haspopup="true">Upload Before Picture</button>
																<ul class='dropdown-menu content' role='menu' aria-labelledby='upBefore'>
																	<hr/>
																	<!--Error Display-->
																	@if (count($errors) > 0)
																	<div class="alert alert-danger">
																		<strong>Whoops!</strong> There were some problems with your input.<br><br>
																		<ul>
																			@foreach ($errors->all() as $error)
																				<li>{{ $error }}</li>
																			@endforeach
																		</ul>
																	</div>
																	@endif
																	<!--Error Display End-->
																	<form id='before-form' method="POST" enctype="multipart/form-data" action="{{ url('before/uploads') }}">	
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<div class="form-group">
																			<label>Before Picture</label>
																			<div>
																				<input type="file" class="form-control" name="file" value="{{ old('file') }}">
																			</div>
																		</div>
																		<div class="form-group">
																		    <label for="weight">Weight</label>
																		    <input type="number" class="form-control" id="weight" name='weight' placeholder="Enter Weight">
																		</div>
																	    <button type="submit" class="btn btn-primary">Add</button>
																	</form>
																</ul>
															</div>
														</div>
														<!--****UPLOAD BUTTON DROPDOWN WITH FORM END****-->
														@endif
													</div>
														<!--IF USER DOES NOT HAVE BEFORE PIC END--> 
													<div class='col-xs-12 col-md-4 content'>
														<img src="{{URL::asset('img/logo.png')}}" alt='logo-picture' class="img-responsive">
													</div>
													<div class='col-xs-12 col-md-4 content'>
														<!--IF USER HAS PROGRESS PIC-->
														@if(isset($progress))
														<img src="{{URL::asset('uploads/user/progress').'/'.$progress->file}}" alt='ba-picture' class="img-responsive">
														@endif
														<!--IF USER HAS PROGRESS PIC END-->
														
														<!--IF USER DOES NOT HAVE PROGRESS PIC-->
														<div class='row bottom-margin'>
															<div class="dropdown">
																<button class="btn btn-primary btn-block dropdown-toggle" id="upBefore" type='button' data-toggle="dropdown" aria-haspopup="true">Add Progress Picture</button>
																<!--Hide/Show Form for before picture-->
																<ul class='dropdown-menu content' role='menu' aria-labelledby='upBefore'>
																	<hr/>
																	<!--Error Display-->
																	@if (count($errors) > 0)
																	<div class="alert alert-danger">
																		<strong>Whoops!</strong> There were some problems with your input.<br><br>
																		<ul>
																			@foreach ($errors->all() as $error)
																				<li>{{ $error }}</li>
																			@endforeach
																		</ul>
																	</div>
																	@endif
																	<!--Error Display End-->
																	<form id='progress-form' method="POST" enctype="multipart/form-data" action="{{ url('progress/uploads') }}">	
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<div class="form-group">
																			<label>Progress Picture</label>
																			<div>
																				<input type="file" class="form-control" name="file" value="{{ old('file') }}">
																			</div>
																		</div>
																		<div class="form-group">
																		    <label for="weight">Weight</label>
																		    <input type="number" class="form-control" id="weight" name='weight' placeholder="Enter Weight">
																		</div>
																	    <button type="submit" class="btn btn-primary">Add</button>
																	</form>
																</ul>
															<!--IF USER DOES NOT HAVE PROGRESS PIC END--> 
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--VIEW USER PROGRESS LINK-->
											<div class='row bottom-margin'>
												<div class='col-xs-12 text-center'>
													<a href="{{url('/progress')}}">View Your Progress</a>
												</div>
											</div>
											<!--****VIEW USER PROGRESS LINK END****-->
										</div>
									</div>
								</div>
								<!--****RIGHT SIDE END****-->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--****IF USER IS LOGGED IN END*****-->


	<!--CAROUSEL-->
	<div class='row bottom-margin hidden-sm hidden-xs' id="home-carousel">
		<div class='col-sm-12'>
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
				       	<!--Caption Empty-->
				    	</div>
				    </div>
				    <div class="item">
					    <a href="{{URL::to('/auth/register')}}"><img src="{{ URL::asset('img/banners/signupforfree.png') }}" alt='carousel-banner'></a>
					    <div class="carousel-caption">
					    <!--Caption Empty--> 
					    </div>
				    </div>
				   <div class="item">
				      	<a href="{{URL::to('/auth/register')}}"><img src="{{ URL::asset('img/focus-banner.png') }}" alt='carousel-banner'></a>
				      	<div class="carousel-caption">
				       	<!--Caption Empty-->
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
	<!--CAROUSEL END-->
	<!--MOTIVATIONAL BANNER-->
	<div class='row bottom-margin' id='motiv-banner'>
		<div class='col-sm-12' id='home-middle-message'>
			<div class='col-sm-12'><h1 id='motiv-title'>strength</h1></div>
		</div>
	</div>
	<!--MOTIVATIONAL BANNER END-->
	<!--NEW USER PANEL-->
	<div class='row bottom-margin' id='new-usr'>
	  	<div class='col-xs-12'>
	  		<div class='row'>
	  			<div class='col-xs-12'>
	  				<div class='row'>
	  					<div class='col-xs-12 content hidden-sm hidden-xs' id='sec-title'>
	  						<h3>New Users</h3>
	  						<hr />
	  					</div>
	  				</div>
	  				<div class='row hidden-sm hidden-xs'>
	  					<?php $c=0; ?>
	  					@foreach($allUsers as $user)
	  					<?php $c++; ?>
	  					<div class='col-xs-2 home-pics'>
	  						<h4 class = 'text-center'>{{$user->username}}</h4>
	  						@if(isset($user->avatar))
							<img src="{{ URL::asset('uploads/user/profile_pic').'/'.$user->avatar }}" alt='profile-picture' class="img-responsive">	
							@else
							<img src="{{ URL::asset('img/default-pic.png')}}" alt='profile-picture' class="img-responsive">
							@endif
	  						<div class='nu-link'><a href="{{url('/profile')}}/user_id={{$user->id }}">View Profile</a></div>
	  					</div>
	  					@if($c % 6 == 0 )
						<div class="clearfix visible-lg-block visible-md-block"></div>
						@endif

	  					@endforeach
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	</div>
	<!--NEW USER PANEL END-->
	<!--TRANSFORMATIONS-->
	<div class='row' id='transformations'>
	  	<div class='col-sm-12'>
	  		<div class='row'>
	  			<div class='col-sm-12'>
  					<h3 class='h3-title'>Transformations</h3>
  					<hr />
  				</div>
	  		</div>
	  		<div class='row'>
			  	<div class='col-sm-6'>
			  		<div class='row'>
			  			<div class='col-sm-12'><h4 class='text-center'>Male</h4></div>
			  		</div>
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
			  		<div class='row'>
			  			<div class='col-sm-12'><h4 class='text-center'>Female</h4></div>
			  		</div>
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
	<!--TRANSFORMATIONS END-->
@stop