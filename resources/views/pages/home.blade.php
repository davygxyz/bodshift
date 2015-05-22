@extends('master')



@section('content')
	Home Page

	<h2>{{$name}}</h2>

	@foreach($lessons as $lesson)
		<h2>{{$lesson}}</h2>
	@endforeach
@stop