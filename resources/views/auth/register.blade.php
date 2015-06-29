@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
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

					<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Profile Picture</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="file" value="{{ old('file') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Birthday</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Weight</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="weight" value="{{ old('weight') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Height</label>
							<div class="col-md-6">
							<div class="col-xs-3 form-group">
								<label class="col-md-4 control-label">ft</label>
								<select class="form-control" name='ft'>
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								  <option>5</option>
								  <option>6</option>
								  <option>7</option>
								  <option>8</option>
								</select>
							</div>
							<div class="col-xs-3 form-group">
								<label class="col-md-4 control-label">inch</label>
								<select class="form-control" name='inch'>
									<option>0</option>
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								  <option>5</option>
								  <option>6</option>
								  <option>7</option>
								  <option>8</option>
								  <option>9</option>
								  <option>10</option>
								  <option>11</option>
								</select>
							</div>
							</div>
						</div>
						<div class='clearfix'></div>
						<div class="form-group">
							<label class="col-md-4 control-label">About Me</label>
							<div class="col-md-6">
							<textarea name='about' style="width: 100%; height: 150px; resize: vertical;">{{ old('about-me') }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
