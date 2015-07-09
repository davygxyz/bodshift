@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12 content'>
		<a href="{{url('/forum')}}"><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span> Back to Forum</a>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4 content'>
		<h4>Forum Topic</h4>
	</div>
</div>
<div class='row'>
	<div class='col-xs-12 col-sm-9'>
		<div class='row'>
			<div class='col-sm-12 content'>
				<h1>{{$forum_query->topic}}</h1>
				<hr/>
			</div>
		</div>
		<div class='row bottom-margin'>
			<div class='col-xs-12 content'>
				<p>{{$forum_query->detail}}</p>
				
			</div>
		</div>
		<div class='row bottom-margin content'>
			<div class='col-xs-12 content' id='answers-col'>
				@foreach($answer_query as $answer)
				<div class='bottom-margin awr-wpr'>
					<div class='row' >
						<div class='col-xs-10 content'>
							<p>{{$answer->a_answer}}</p>
						</div>
						<div class='col-xs-2 content text-center'>
							{{$answer->created_at}}
							{{$answer->username}}
							<a href="{{url('/profile')}}/user_id={{$answer->a_user_id }}">
							@if(isset($answer->avatar))
							<img src="{{ URL::asset('uploads/user/profile_pic').'/'.$answer->avatar }}" alt='profile-picture' class="img-responsive">	
							@else
							<img src="{{ URL::asset('img/default-pic.png')}}" alt='profile-picture' class="img-responsive">
							@endif	
							</a>
						</div>
					</div>
				</div>
				<hr/>
				@endforeach
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 content'>
				<form method="POST" action="{{ url('forum/answer') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<input type="hidden" name="question_id" value="{{ $forum_query->forum_id }}">
				  <div class="form-group">
				    <textarea name="answer" style="width: 100%; height: 150px; resize: none;" id="answer"></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary">Reply</button>
				</form>
			</div>
		</div>
	</div>
	<div class='col-xs-12 col-sm-3'>
		<div class='row'>
			<div class='col-xs-12 content'>
				<ul>
					<li>Views: {{$forum_query->view}} </li>
					<li>Posted by: <a href="{{url('/profile')}}/user_id={{$forum_query->user_id }}">{{$forum_query->username}}</a></li>
					<li>Replies: {{$forum_query->reply}} </li>
				</ul>
				
			</div>
		</div>
		
	</div>
</div>
<div class='row'>
	<div class='col-xs-12'>
		{!! $answer_query->render() !!}
	</div>
</div>



@stop