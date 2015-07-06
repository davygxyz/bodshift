@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12 content'>
		<a href="{{url('/')}}"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Back Home</a>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Information</div>
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

				<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/edit/info') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<label class="col-md-4 control-label">Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="{{ $user_query->name }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">E-Mail Address</label>
						<div class="col-md-6">
							<input type="email" class="form-control" name="email" value="{{ $user_query->email }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Confirm E-Mail</label>
						<div class="col-md-6">
							<input type="email" class="form-control" name="email_confirmation" value="{{ $user_query->email }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Username</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="username" value="{{ $user_query->username }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">New Password</label>
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
						<label class="col-md-4 control-label">Sex</label>
						<div class="col-md-6">
							<select class="form-control" name='sex'>
							@if ($user_query->sex == 'M')
							  <option selected>M</option>
							  <option>F</option>
							@elseif($user_query->sex == 'F')
							  <option selected>F</option>
							  <option>M</option>
							 @endif
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Profile Picture</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="file">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Birthday</label>
						<div class="col-md-6">
							<input type="date" class="form-control" name="birthday" value="{{ $user_query->birthday }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Weight</label>
						<div class="col-md-6">
							<input type="number" class="form-control" name="weight" value="{{ $user_query->weight }}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label">Height</label>
						<div class="col-md-6">
						<div class="col-xs-3 form-group">
							<label class="col-md-4 control-label">ft</label>
							<select class="form-control" name='ft'>
							<option selected>{{$user_query->ft}}</option>
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
								<option selected>{{$user_query->inch}}</option>
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
						<textarea name='about' style="width: 100%; height: 150px; resize: vertical;">{{ $user_query->about }}</textarea>
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

@stop