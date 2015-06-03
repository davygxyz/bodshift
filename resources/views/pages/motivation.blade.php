@extends('master')
@section('content')
<div class='row'>
	<div class='col-sm-12'>
		<h2>Motivation</h2>
	</div>
</div>
<div class='row'>
	<div class='col-xs-12'>
		<div class='row'>
			<div class='col-sm-12'>
				<h4>Videos</h4>
				<hr />
			</div>
		</div>
		<div class='row'>
			@foreach ($video_query as $video)
			<div class='col-sm-12 col-md-4'>
				<div class="embed-responsive embed-responsive-4by3">
				  <iframe class="embed-responsive-item" src="{{ $video->source }}" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			@endforeach
		</div>
		<div class='row'>
			<div class='col-sm-12 col-md-offset-5'>
				{!! $video_query->render() !!}
			</div>
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-xs-12'>
		<div class='row'>
			<div class='col-sm-12'>
				<h4>Quotes</h4>
				<hr />
			</div>
		</div>
		<div class='row'>
			@foreach ($quote_query as $quote)
			<div class='col-sm-12 col-md-4'>
				<img src="{{ URL::asset('img/uploads/admin/img').'/'.$quote->source }}" alt='qoute-img' class="img-responsive">
			</div>
			@endforeach
		</div>
		<div class='row'>
			<div class='col-sm-12 col-md-offset-5'>
				{!! $quote_query->render() !!}
			</div>
		</div>
	</div>
</div>
@stop