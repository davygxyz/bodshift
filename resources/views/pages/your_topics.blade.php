@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12 content'>
		<a href="{{url('/forum')}}"><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span> Back to Forum</a>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4 content'>
		<h4>Your Topics</h4>
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

			@foreach($forum_question_querry as $forum)
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
		{!! $forum_question_querry->render() !!}
	</div>
</div>


@stop