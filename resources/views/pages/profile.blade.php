@extends('master')

@section('content')
<div class='row'>
	<div class='col-xs-12 col-md-3'>
		<div class='row'>
			<div class='col-xs-12 bottom-margin'>
				<a href="{{URL::to('/')}}" class=' btn btn-block'>Back to Home</a>
			</div>
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
			<div class='col-xs-12'>
				<ul class="nav nav-pills nav-stacked">

				    <li>Name: {{$info->name}} </li>
				    <li>Email: {{$info->email}} </li>
				    <li>Age:<span id='age-js'> {{$info->birthday}}</span></li>
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
				<h3 class='text-center'> Body Journey <small> Push Yourself! </small></h3>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12' id='trans-scroll'>
				<div class='slider'>
				    <div id='left1' class='left'>&lt;</div>
				    <div id='right1' class='right'>&gt;</div>
				    <div class='track' id='track1'>
				    	@foreach($progress_pic as $progress)
				        <div class='progress-pic' style='margin-top:24px'>
				        	<img src="{{URL::asset('uploads/user/progress').'/'.$progress->file}}" alt='journey Phots' class="img-responsive">
							<div class='small-12 columns text-centered'>Weight: {{$progress->weight}}</div>
				        </div>
				        @endforeach
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<h3 class='text-center'> Gallery</h3>
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
	</div>
</div>


@stop