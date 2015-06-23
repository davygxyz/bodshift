@extends('master')

@section('content')
<div class='row'>
	<div class='col-xs-12 col-md-3'>
		<div class='col-xs-12 content'>
			<a href="{{url('/')}}"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Back Home</a>
		</div>
		<div class='row'>
			<div class='col-xs-12'>
				@if(isset($info->avatar))
				<img src="{{ URL::asset('uploads/user/profile_pic').'/'.$info->avatar }}" alt='profile-picture' class="img-responsive">	
				@else
				<img src="{{ URL::asset('img/default-pic.png')}}" alt='profile-picture' class="img-responsive">
				@endif	
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 content'>
				<ul class="nav nav-pills nav-stacked">

				    <li>Name: {{$info->name}} </li>
				    <li>Email: {{$info->email}} </li>

				    <?php 
				    	$dob = $info->birthday;
				    	$dob = explode('-', $dob);
				    	$y = $dob[0];
				    	$m = $dob[1];
				    	$d = $dob[2];
				    ?>
				    <li>Age: {{Carbon\Carbon::createFromDate($y,$m,$d)->age}}</span></li>
				    <li>Height: {{$info->height}}</li>
				    <li>Weight: {{$info->weight}}</li>
				    <li>Member Since: {{ date("m/d/Y",strtotime($info->created_at)) }}</li>
				</ul>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12'>
				<div class='row'>
					<div class="panel panel-default">
						<div class="panel-heading text-center">About Me</div>
						<div class="panel-body">
							<p>
							{{$info->about}}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12'>
				<div class='row'>
					<div class="panel panel-default">
						<div class="panel-heading text-center">Goals</div>
						<div class="panel-body">
							<p>
							Pellentcitur a vitae orci. Pellentesque euismod porttitor tortor i in urna et, vehicula blandit ante. Praesent est libero, tempor nec interdum eget, accumsan id metus. Curabitur varius quam sit amet mauris tempus, ut elementum purus luctus.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='col-xs-12 col-md-9'>
		<div class='row'>
			<div class='col-xs-12'>
				<h3 class='text-center'> Body Progress <small> Push Yourself! </small></h3>
			</div>
		</div>
		@if (count($progress_pic) != 0 || count($before_pic) != 0)
		<div class='row'>
			<div class='col-xs-12' id='trans-scroll'>
				<div class='slider'>
				    <div id='left1' class='left'>&lt;</div>
				    <div id='right1' class='right'>&gt;</div>
				    <div class='track' id='track1'>
				    	@if(isset($before_pic))
				    	<div class='progress-pic' style='margin-top:24px'>
				        	<img src="{{URL::asset('uploads/user/progress').'/'.$before_pic->file}}" alt='journey Phots' class="img-responsive">
							<div class='small-12 columns text-centered'>Weight: {{$before_pic->weight}}</div>
							<div class='small-12 columns text-centered'>Date: {{ date("m/d/Y",strtotime($before_pic->created_at)) }}</div>
				        </div>
		        		@endif
				    	@foreach($progress_pic as $progress)
				        <div class='progress-pic' style='margin-top:24px'>
				        	<img src="{{URL::asset('uploads/user/progress').'/'.$progress->file}}" alt='journey Phots' class="img-responsive">
							<div class='small-12 columns text-centered'>Weight: {{$progress->weight}}</div>
							<div class='small-12 columns text-centered'>Date: {{ date("m/d/Y",strtotime($progress->created_at)) }}</div>
				        </div>
				        @endforeach
					</div>
				</div>
			</div>
		</div>
		@else
		<div class='row'>
			<div class='col-xs-12 content'>
				<div class="alert alert-info" role="alert"><h4 class='text-center'> <span class='color'>{{$info->username}}</span> has not set up their Body Progress.</h4></div>
			</div>
		</div>
		@endif
		<div class='row'>
			<div class='col-xs-12'>
				<h3 class='text-center'>Gallery</h3>
			</div>
		</div>
		@if (count($user_gallery) != 0)
		<div class='row'>
			<?php $c=0; ?>
			@foreach ($user_gallery as $gallery)
			<div class='col-xs-3 col-md-2 bottom-margin'>
				<?php $c++; ?>
				<a href="{{ URL::asset('uploads/user/photo_gallery').'/'.$gallery->file }}" data-lightbox="user-gallery"><img src="{{ URL::asset('uploads/user/photo_gallery').'/'.$gallery->file }}"alt='user-gallery-image' class="img-responsive"></a>
			</div>
				@if($c % 6 == 0 )
					<div class="clearfix visible-lg-block"></div>
				@endif
			@endforeach
		</div>
		<div class='row'>
			<div class='col-xs-12 content'>
				<a href="{{url('/gallery')}}/user_id={{$info->id }}"><span class='glyphicon glyphicon-picture' aria-hidden='true'></span> View More Photos</a>
			</div>
		</div>
		@else
		<div class='row'>
			<div class='col-xs-12 content'>
				<div class="alert alert-info" role="alert"><h4 class='text-center'> <span class='color'>No Gallery available</h4></div>
			</div>
		</div>
		@endif

		<div class='row'>
			<div class='col-xs-12'>
				<h3 class='text-center'>Journal Entry</h3>
			</div>
		</div>
		@if (count($journals) != 0)
		<div class='row'>
			<div class='col-xs-12 content'>
				<div class="panel panel-default">
				 	<div class="panel-heading">
				 		<h3 class="panel-title" style='word-wrap: break-word; padding-right:15px;'>{{$journals->name}}</h3>
					</div>
				  	<div class="panel-body">
					  	<p>{{$journals->created_at}}</p>
					    <p>{{$journals->content}}</p>
				  	</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 content'>
				<a href="{{url('/journal')}}/user_id={{$info->id }}"><span class='glyphicon glyphicon-book' aria-hidden='true'></span> View More Journals</a>
			</div>
		</div>
		@else
		<div class='row'>
			<div class='col-xs-12 content'>
				<div class="alert alert-info" role="alert"><h4 class='text-center'> <span class='color'>No Journals availabe</h4></div>
			</div>
		</div>
		@endif
	</div>
</div>


@stop