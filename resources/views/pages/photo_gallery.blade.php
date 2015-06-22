@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12'>
		<div class='row'>
			<div class='col-xs-12 content'>
				<a href="{{url('/')}}"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Back Home</a>
			</div>
			@if(Auth::user()->id != $user_id)
			<div class='col-xs-12 content'>
				<a href="{{url('/profile/user_id=').$user_info->id}}"><span class='glyphicon glyphicon-user' aria-hidden='true'></span> {{$user_info->username}}'s Profile</a>
			</div>
			@endif
		</div>
		<div class='row'>
			@if($user_id == Auth::user()->id)
			<div class='col-xs-12 col-md-3'>
				<div class='row'>
					<div class='col-xs-12 bottom-margin'>
						<h4 class='text-center'>Upload Photo</h4>

						<form class="dropzone" enctype="multipart/form-data" method="POST" id="my-awesome-dropzone" action="{{ url('gallery/uploads') }}">	
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="fallback">
						    <input name="file" type="file" multiple />
						  	</div>		
						</form>
					</div>
				</div>
			</div>
			<div class='col-xs-12 col-md-9 content'>
			@else
			<div class='col-xs-12'>
			@endif
				
				<div class='row'>
					<?php $c=0; ?>
					@foreach ($query as $gallery)
					<div class='col-sm-12 col-md-3 bottom-margin padding-5'>
						<?php $c++; ?>
						@if($user_id == Auth::user()->id)
						<a href="{{ URL::to('/gallery/delete/image_id='.$gallery->id)}} "><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						@endif

						<a href="{{ URL::asset('uploads/user/photo_gallery').'/'.$gallery->file }}" data-lightbox="user-gallery"><img src="{{ URL::asset('uploads/user/photo_gallery').'/'.$gallery->file }}"alt='user-gallery-image' class="img-responsive"></a>
					</div>
					@if($c % 4 == 0 )
					<div class="clearfix visible-lg-block visible-md-block"></div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@stop