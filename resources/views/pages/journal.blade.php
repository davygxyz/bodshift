@extends('master')
@section('content')
<div class='row'>
	<div class='col-sx-12'>
		<!--Redirecting Links-->
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
		<!--Redirecting Links END-->
		<div class='row'>
			<!--User authentification, below does not show unless it is the right users journal-->
			@if(Auth::user()->id == $user_id)
			<div class='col-xs-12 col-md-4'>
				<div class='row'>
					<div class='col-xs-12 bottom-margin padding-5'>
						<!--Form Title-->
						<h4 class='text-center'>Journal Entry</h4>
						<!--Form Title End-->
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
				
						<!--Form Start-->
						<form class="journal-form" method="POST" id="journal-form" action="{{ url('journal/uploads') }}">	
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
						    	<label for="name">Entry Name</label>
						    	<input type="text" class="form-control" name="name" placeholder="Enter Entry Name">
						  	</div>
						  	<div class="form-group">
						    	<label for="context">Entry Description</label>
						    	<textarea name="content"  style="width: 100%; min-height: 300px; resize: vertical;">Type Here</textarea>
						  	</div>
						  	<div class="checkbox">
							    <label>
							      <input type="checkbox" name='private' value='0'> Do you want this journal private?
							    </label>
							  </div>
						    <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>
						<!--Form End-->
					</div>
				</div>
			</div>
			<!--Divs change length due to user Authentification-->
			<div class='col-xs-12 col-md-8 content'>
			@endif
			<div class='col-xs-12 col-md-12 content'>
			<!--Divs change length due to user Authentification END-->	
				<div class='row'>
					<h3 class='text-center'>Entries    <span class="glyphicon glyphicon-book" aria-hidden="true"></span></h3>
				</div>
				<div class='row'>
					<?php $c=0; ?>
					@foreach ($journal as $journal)
					<div class='col-sm-12 bottom-margin padding-5'>
						<?php $c++; ?>
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title" style='word-wrap: break-word; padding-right:15px;'>{{$journal->name}}</h3>
						    	@if($journal->user_id == Auth::user()->id)
									<a href="{{ URL::to('/journal/delete/journal_id='.$journal->id)}} " style='position:absolute; top:15px; right:20px;'><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
								@endif
						  </div>
						  <div class="panel-body">
						  	<p>{{$journal->created_at}}</p>
						    <p>{{$journal->content}}</p>
						  </div>
						</div>
					</div>
					@if($c % 12 == 0 )
					<div class="clearfix visible-lg-block"></div>
					@endif
					@endforeach
				</div>
				<div class='row'>
					<div class='col-xs-12 col-xs-offset-5'>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop