@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12 col-sm-6 col-sm-offset-3 content'>
		<div class="panel panel-default">
			<div class="panel-heading">Featured Questionnaire</div>
			<div class="panel-body">
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
				<form id='before-form' method="POST" enctype="multipart/form-data" action="{{ url('featured/post') }}">	
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="user_id" value="{{ $user_query->id }}">
					<input type="hidden" name="username" value="{{ $user_query->username }}">
					<span id="helpBlock" class="help-block">Before you submit, make sure your body progress is set up.</span>
					<span id="helpBlock" class="help-block">Depending on how many people submit, we will try and have a new featured person every two weeks.</span>
					<div class="form-group">
						<label>When did you start exercising? </label>
						<div>
							<textarea class="form-control" name="q1" rows="2">{{ old('q1') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label>What is your goal? </label>
						<div>
							<textarea class="form-control" name="q2" rows="2">{{ old('q2') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label>Why did you get into exercising? </label>
						<div>
							<textarea class="form-control" name="q3" rows="2">{{ old('q3') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label>Have you every played any sports? </label>
						<div>
							<textarea class="form-control" name="q4" rows="2">{{ old('q4') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label>Share the person that inspires you. </label>
						<div>
							<textarea class="form-control" name="q5" rows="2">{{ old('q5') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label>Do you take any supplements? </label>
						<div>
							<textarea class="form-control" name="q6" rows="2">{{ old('q6') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label>What help would you like to share with others? </label>
						<div>
							<textarea class="form-control" name="q7" rows="2">{{ old('q7') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label>How many days of the week, do you workout? </label>
						<div>
							<textarea class="form-control" name="q8" rows="2">{{ old('q8') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label>Social media links. </label>
						<div>
							<textarea class="form-control" name="q9" rows="2">{{ old('q9') }}</textarea>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

@stop