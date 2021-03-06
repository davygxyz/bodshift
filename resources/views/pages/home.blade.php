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
				<div class="panel-body" id='home-usr-panel'>
					<div class='row'>
						<div class='col-xs-12'>
							<div class='row'>
								<!--LEFT SIDE-->
								<div class='col-xs-4 col-md-2 content'>
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
										<li><a href="{{url('/profile/edit')}}/user_id={{Auth::user()->id }}">Edit Info</a></li>
									    <li><a href="{{url('/gallery')}}/user_id={{Auth::user()->id }}">Photo Gallery</a></li>
									    <hr/>
									    <li><a href="{{url('/journal')}}/user_id={{Auth::user()->id }}">Journal</a></li>
									</ul>
									<!--****USER NAVIGATION BAR END****-->
								</div>
								<!--****LEFT SIDE END****-->
								<!--****RIGHT SIDE-->
								<div class='col-xs-8 col-md-10 content'>
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
											<!--PROGRESS BANNER-->
											<div class='row bottom-margin'>
												<div class='col-xs-12' id='progress-banner'>
													<div class='col-xs-12 col-md-4 content'>
														<div class='row'>
															<div class='col-xs-12'><h3 class='text-center'>Before</h3></div>
														</div>
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
																		    <input type="number" class="form-control" name='weight' placeholder="Enter Weight">
																		</div>
																		<div class="form-group">
																		    <label for="weight">Date</label>
																		    <input type="date" class="form-control" name='fdate'>
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
																		<div class="form-group">
																		    <label for="weight">Date</label>
																		    <input type="date" class="form-control" id="fdate" name='fdate'>
																		</div>
																	    <button type="submit" data-loading-text="Adding..." class="btn btn-primary">Add</button>
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
														<div class='row'>
															<div class='col-xs-12'><h3 class='text-center'>After</h3></div>
														</div>
														<!--IF USER HAS PROGRESS PIC-->
														@if(isset($progress))
														<div class='row bottom-margin'>
														<img src="{{URL::asset('uploads/user/progress').'/'.$progress->file}}" alt='ba-picture' class="img-responsive">
														</div>
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
																		<div class="form-group">
																		    <label for="weight">Date</label>
																		    <input type="date" class="form-control" id="fdate" name='fdate'>
																		</div>
																	    <button type="submit" class="btn btn-primary loading-btn" data-loading-text="Adding...">Add</button>
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
						<img  class='carousel-img' src="{{ URL::asset('img/welcome-carousel.png') }}" alt='Welcome to bodshift.com carousel image'>
				    	<div class="carousel-caption">
				       	<!--Caption Empty-->
				    	</div>
				    </div>
				    <div class="item">
					    <a href="{{URL::to('/auth/register')}}"><img class='carousel-img' src="{{ URL::asset('img/banners/signupforfree.png') }}" alt='sign up for bodshift carousel image'></a>
					    <div class="carousel-caption">
					    <!--Caption Empty--> 
					    </div>
				    </div>
				   <div class="item">
				      	<a href="{{URL::to('/forum')}}"><img class='carousel-img' src="{{ URL::asset('img/forum-carousel.png') }}" alt='Go to forums carousel image'></a>
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
	<!--WEBSITE INFORMATION-->
	<div class='row bottom-margin'>
		<div class='col-xs-12'>
			<div class='row'>
				<div class='col-sm-5 content'>
					<h3>Welcome to bodshift.com</h3>
					<p>We offer transformations, motivational media, community forum, personal profiles and more. If any of those topics interest you, feel free to look around and enjoy our content.</p>
					<p>Stay in touch with your body by using our progress progression tool to help keep track of your body progress. Show others your body journey and help motivate them to start their own. Everyone starts somewhere and we plan to help you along the way.  </p>
					<p>If you have any questions concerning your body, food plans, what kind of food should you eat, how to gain or lose weight or just a random question.  Use our forum to interact with other members.  </p>
					<a href='{{url("/about")}}'>More About Us</a>
				</div>
				<div class='col-sm-7 content hidden-xs'>
					<img src="{{ URL::asset('img/user-pro-pic.jpg') }}" alt='Picture of a users profile' class="img-responsive">
				</div>
			</div>
		</div>
	</div>
	<!--WEBSITE INFORMATION END-->

	<!--FEATURED TRANSFORMATION-->
	<div class='row bottom-margin'>
		<div class='col-xs-12'>
			<div class='row'>
				<div class="col-xs-12 col-md-9">
					<div class='row'>
						<div class='col-xs-12 bottom-margin'>
							<img src="{{ URL::asset('img/featured-body-trans.jpg') }}" alt='Picture of a users profile' class="img-responsive">
						</div>
						<div class='col-xs-12'>
							<img src="{{ URL::asset('img/featured-transformation-temp.jpg') }}" alt='Picture of a users profile' class="img-responsive">
							<div class='col-xs-4 col-xs-offset-4' style='margin-top:20px;'>
								<button class="btn btn-primary center-block" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Read Story</button>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class="collapse" id="collapseExample">
							  <div class="well">
							    <h3>When did you start exercising?</h3>
							    	<p>{{$featured->q1}}</p>
								<h3>What is your goal?</h3>
									<p>{{$featured->q2}}</p>
								<h3>Why did you get into exercising?</h3>
									<p>{{$featured->q3}}</p>
								<h3>Have you every played any sports?</h3>
									<p>{{$featured->q4}}</p>
								<h3>Share the person that inspires you.</h3>
									<p>{{$featured->q5}}</p>
								<h3>Do you take any supplements?</h3>
									<p>{{$featured->q6}}</p>
								<h3>What help would you like to share with others?</h3>
									<p>{{$featured->q7}}</p>
								<h3>How many days of the week, do you workout?</h3>
									<p>{{$featured->q8}}</p>
								<h3>Social media links.</h3>
								<p>{{$featured->q9}}</p>
							  </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 content">
				  	<h2 class='text-center'>Get Your Transformation Featured</h2>
				  	<p class='text-center'>Do you have a story to tell? Share your tranformation with others.</p>
				    <img src="{{ URL::asset('img/featured-photo.jpg') }}" alt='Picture of a users profile' class="img-responsive">
				    <a class="btn btn-primary center-block" href="{{url('/featured')}}">Get Featured</a>
			    </div>
		    </div>
		</div>
	</div>

	<!--FEATURED TRANSFORMATION END-->
	<!--TRANSFORMATIONS-->
	<div class='row' id='transformations'>
	  	<div class='col-sm-12'>
	  		<div class='row home-text-content'>
	  			<div class='col-sm-12 home-title content'>
  					<h1 class='home-text-head'>Transformations</h1>
  					<p>Do you need motivation to kick yourself in to high gear? <br /> See these transformations from other users.</p>
  				</div>
	  		</div>
	  		<div class='row'>
			  	<div class='col-sm-6'>
			  		<div class='row'>
			  			<div class='col-sm-12'><h4 class='text-center'>Male</h4></div>
			  		</div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<img src="{{ URL::asset('img/male-weight.jpg') }}" alt='Man lifting weight bar' class="img-responsive home-trans-photo">
			  			</div>
			  		</div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<div class="list-group">
							  <a href="{{url('/user/transformations/M/19 and below')}}" class="list-group-item">Male Teens ( 19 and below )</a>
							  <a href="{{url('/user/transformations/M/20 - 30')}}" class="list-group-item">Male ( 20 - 30 )</a>
							  <a href="{{url('/user/transformations/M/30 - 40')}}" class="list-group-item">Male ( 30 - 40 )</a>
							  <a href="{{url('/user/transformations/M/40 +')}}" class="list-group-item">Male ( 40 + )</a>
							  <a href="{{url('/user/transformations/M/all')}}" class="list-group-item">All Male</a>
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
			  				<img src="{{ URL::asset('img/female-weight.jpg') }}" alt='Woman deadlifting weights' class="img-responsive home-trans-photo">
			  			</div>
			  		</div>
			  		<div class='row'>
			  			<div class='col-sm-12'>
			  				<div class="list-group">
							  <a href="{{url('/user/transformations/F/19 and below')}}" class="list-group-item">Female Teens ( 19 and below )</a>
							  <a href="{{url('/user/transformations/F/20 - 30')}}" class="list-group-item">Female ( 20 - 30 )</a>
							  <a href="{{url('/user/transformations/F/30 - 40')}}" class="list-group-item">Female ( 30 - 40 )</a>
							  <a href="{{url('/user/transformations/F/40 +')}}" class="list-group-item">Female ( 40 + )</a>
							  <a href="{{url('/user/transformations/F/all')}}" class="list-group-item">All Females</a>
							</div>
			  			</div>
			  		</div>
			  	</div>
			</div>
	  	</div>
	</div>
	<!--TRANSFORMATIONS END-->
	<!--MOTIVATIONAL BANNER-->
	<div class='row bottom-margin' id='motiv-banner'>
		<div class='col-sm-12' id='home-middle-message'>
			<div class='col-sm-12'><h1 id='motiv-title'>strength</h1></div>
		</div>
	</div>
	<!--MOTIVATIONAL BANNER END-->
	<!--NEW USER PANEL-->
	<div class='row bottom-margin'>
	  	<div class='col-xs-12'>
	  		<div class='row hidden-sm hidden-xs home-text-content'>
	  			<div class='col-sm-12 home-title content'>
  					<h1 class='home-text-head'>New Users</h1>
  					<p>Welcome our new guests to our community!<br /> View their profile by clicking on their profile picture.</p>
  				</div>
	  		</div>
	  		<div class='row'>
	  			<div class='col-xs-12' id='home-new-usr'>
	  				<div class='row hidden-sm hidden-xs'>
	  					<?php $c=0; ?>
	  					@foreach($allUsers as $user)
	  					<?php $c++; ?>
	  					<div class='col-xs-1 home-pics'>
	  						<h4 class = 'text-center' style='word-wrap: break-word; min-height:50px; font-size:12px'>{{$user->username}}</h4>
	  						@if(isset($user->avatar))
							<a href="{{url('/profile')}}/user_id={{$user->id }}"><img src="{{ URL::asset('uploads/user/profile_pic').'/'.$user->avatar }}" alt='profile-picture' class="img-responsive"></a>	
							@else
							<a href="{{url('/profile')}}/user_id={{$user->id }}"><img src="{{ URL::asset('img/default-pic.png')}}" alt='profile-picture' class="img-responsive"></a>
							@endif
	  					</div>
	  					@if($c % 12 == 0 )
						<div class="clearfix visible-lg-block visible-md-block"></div>
						@endif

	  					@endforeach
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	</div>
	<!--NEW USER PANEL END-->
@stop