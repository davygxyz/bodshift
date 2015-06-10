@extends('master')
@section('content')
<div class='row'>
	<div class='col-sx-12'>
		<div class='row'>
			<div class='col-xs-12 col-md-4'>
				<div class='row'>
					<div class='col-xs-12 bottom-margin padding-5'>
						<a href="{{URL::to('/')}}" class=' btn btn-block'>Back to Home</a>
					</div>
				</div>
				@if($data['id'] == Auth::user()->id)
				<div class='row'>
					<div class='col-xs-12 bottom-margin padding-5'>
						<h4 class='text-center'>Journal Entry</h4>

						<form class="journal-form" method="POST" id="journal-form" action="{{ url('journal/uploads') }}">	
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="date" value="{{ Carbon\Carbon::today()->format('Y-m-d') }}">
							<div class="form-group">
						    	<label for="name">Entry Name</label>
						    	<input type="text" class="form-control" name="name" placeholder="Enter Entry Name">
						  	</div>
						  	<div class="form-group">
						    	<label for="context">Entry Description</label>
						    	<textarea name="context"  style="width: 100%; min-height: 300px; resize: vertical;">Type Here</textarea>
						  	</div>
						    <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
					</div>
					<div class='col-xs-12'>
						<img src="http://placehold.it/300x700" alt='profile-picture' class="img-responsive">
					</div>
				</div>
				@endif
			</div>
			
			<div class='col-xs-12 col-md-8 content'>
				<div class='row'>
					<h3 class='text-center'>Entries <span class="glyphicon glyphicon-book" aria-hidden="true"></span></h3>
				</div>
			</div>
		</div>
	</div>
</div>
@stop