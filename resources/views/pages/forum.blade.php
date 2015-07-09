@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12 content'>
		<a href="{{url('/')}}"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Back Home</a>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4 content'>
		<h4>Forum</h4>
	</div>
	<div class='col-sm-8 content'>
		<ul class="nav nav-pills">
		  <li>
		  	<div class="dropdown" style='padding: 10px 15px;'>
		  	<a href='#' id="new-topic-drop" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create Topic</a>
		  	<!--DROPDOWN MENU-->
		  	<div class='row dropdown-menu' id='nt-dropdown' aria-labelledby="new-topic-drop">
				<div class='col-xs-12 content'>
					<div class="panel panel-default">
					  <div class="panel-heading">Create New Topic</div>
					  <div class="panel-body">
						<form method="POST" action="{{ url('forum/create') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						  <div class="form-group">
						    <label for="topic">Topic</label>
						    <input name="topic" class="form-control" type="text" id="topic" value="{{ old('topic') }}"/>
						  </div>
						  <div class="form-group">
						    <label for="detail">Detail</label>
						    <textarea name="detail" style="width: 100%; height: 150px; resize: none;" id="detail"></textarea>
						  </div>
						  <button type="submit" class="btn btn-primary">Create</button>
						</form>
					  </div>
					</div>
				</div>
			</div>
			</div>
			<!--DROPDOWN MENU END-->
		  </li>
		  <li><a href="{{url('form/your_topics/user_id='.Auth::user()->id)}}">Your Topics</a></li>
		  <li><a href="{{url('form/your_replies/user_id='.Auth::user()->id)}}">Your Replies</a></li>
		</ul>
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
	</div>
</div>
<div class='row'>
	<div class='col-xs-12'>
		<table class="table table-bordered">
			<tr>
				<td width="50%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
				<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
				<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
				<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
			</tr>

			@foreach($forum_query as $forum)
			<tr>
				<td><a href="{{ url('forum/topic_id').'='.$forum->id }}"><strong>{{$forum->topic}}</strong></a></td>
				<td><strong>{{$forum->view}}</strong></td>
				<td><strong>{{$forum->reply}}</strong></td>
				<td><strong>{{$forum->created_at}}</strong></td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
<div class='row'>
	<div class='col-xs-12'>
		{!! $forum_query->render() !!}
	</div>
</div>


@stop