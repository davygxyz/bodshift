@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12 content'>
		<a href="{{url('/')}}"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Back Home</a>
	</div>
</div>
<div class='row'>
	<div class='col-xs-12 content'>
		<h3 class='text-center'>Your body Progress</h3>
	</div>
</div>
@if(count($progress_pic) == 0 AND count($before_pic) == 0)
<div class='row'>
	<div class='col-xs-12'>
		<h4 class='text-center'>-No Body Progress Available-</h4>
	</div>
</div>
@else
<div class='row'>
	<div class='col-xs-12' id='trans-scroll'>
		<div class='slider'>
		    <div id='left1' class='left'>&lt;</div>
		    <div id='right1' class='right'>&gt;</div>
		    <div class='track' id='track1'>
		    	<!--BEFORE PICTURE-->
		    	@if(isset($before_pic))
		    	<div class='progress-pic' style='margin-top:24px'>
		        	<a href="{{ URL::asset('uploads/user/progress').'/'.$before_pic->file }}" data-lightbox="scroll"><img src="{{URL::asset('uploads/user/progress').'/'.$before_pic->file}}" alt='journey Phots' class="img-responsive"></a>
					<div class='small-12 columns text-centered'>Weight: {{$before_pic->weight}}</div>
					<div class='small-12 columns text-centered'><a href='{{url("before/delete/id=").$before_pic->id}}' class='delete-alert'>Delete</a></div>
		        </div>
		        @endif
		    	<!--BEFORE PICTURE END-->
		    	<!--PROGRESS-->
		    	@foreach($progress_pic as $progress)
		        <div class='progress-pic' style='margin-top:24px'>
		        	<a href="{{ URL::asset('uploads/user/progress').'/'.$progress->file }}" data-lightbox="scroll"><img src="{{URL::asset('uploads/user/progress').'/'.$progress->file}}" alt='journey Phots' class="img-responsive"></a>
					<div class='small-12 columns text-centered'>Weight: {{$progress->weight}}</div>
					<div class='small-12 columns text-centered'><a href='{{url("progress/delete/id=").$progress->id}}' class='delete-alert'>Delete</a></div>
		        </div>
		        @endforeach
		        <!--PROGRESS END-->
			</div>
		</div>
	</div>
</div>
@endif
@stop