@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12'>
		<div class='row'>
			<div class='col-xs-12 col-md-3'>
				<div class='row'>
					<div class='col-xs-12 bottom-margin'>
						<a href="{{URL::to('/')}}" class=' btn btn-block'>Back to Home</a>
					</div>
				</div>
				@if($data['id'] == Auth::user()->id)
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
					<div class='col-xs-12'>
						<img src="http://placehold.it/300x700" alt='profile-picture' class="img-responsive">
					</div>
				</div>
				@endif
			</div>
			
			<div class='col-xs-12 col-md-9 content'>
				<div class='row'>
					<?php $c=0; ?>
					@foreach ($data['query'] as $gallery)
					<div class='col-sm-12 col-md-3 bottom-margin padding-5'>
						<?php $c++; ?>
						@if($data['id'] == Auth::user()->id)
						<a href="{{ URL::to('/gallery/delete/image_id='.$gallery->id)}} "><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						@endif

						<a href="{{ URL::asset('uploads/user/photo_gallery').'/'.$gallery->file }}" data-lightbox="user-gallery"><img src="{{ URL::asset('uploads/user/photo_gallery').'/'.$gallery->file }}"alt='user-gallery-image' class="img-responsive"></a>
					</div>
					@if($c % 4 == 0 )
					<div class="clearfix visible-lg-block"></div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@stop