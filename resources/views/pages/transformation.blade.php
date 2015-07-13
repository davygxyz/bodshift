@extends('master')
@section('content')
<div class='row'>
	<div class='col-xs-12 content'>
		<a href="{{url('/')}}"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Back Home</a>
	</div>
</div>
<div class='row'>
	<div class='col-xs-12 content text-center' style='color:#006588'>
		<p>Have fun viewing all of the awesome transformations we have here at bodshift.com</p>
		<p>Click on <strong>View Transformations</strong> to see a quick view of the users progress.</p>
		<p>Click on the users <strong>Profile Picture</strong> to go to their profile page.</p>
	</div>
</div>
<div class='row'>
	<div class='col-xs-12'>
		<div class='row'>
			<?php $c =0 ?>
			@foreach ($transCards as $card)
			<?php $c ++?>
			<div class='col-xs-12 col-sm-4 content bottom-margin'>
				<div class='trans-card-wrp'>
					<div class = 'row bottom-margin'>
						<div class='col-xs-4'>
							<div class = 'row'>
								<div class='col-xs-12 text-center'>{{strtoupper($card->username)}}</div>
							</div>
							<a href="{{url('/profile')}}/user_id={{$card->id }}">
							@if(isset($card->avatar))
							<img src="{{ URL::asset('uploads/user/profile_pic').'/'.$card->avatar }}" alt='profile-picture' class="img-responsive">	
							@else
							<img src="{{ URL::asset('img/default-pic.png')}}" alt='profile-picture' class="img-responsive">
							@endif	
						</a>
						</div>
						<div class='col-xs-8'>
							<ul class='trans-card-info'>
								<li>Age: {{{$card->age or 'N/A'}}}</li>
								<li>Height: {{$card->ft}}' {{{$card->inch or 'N/A'}}} </li>
								<li>Weight: {{{$card->weight or 'N/A'}}}</li>
								<li>Sex: {{{$card->sex or N/A}}}</li>
							</ul>
							

						</div>
					</div>
					<div class='row'>
						<div class='col-xs-12' style='background-color:white; text-align:center; border-radius:4px;'>
							<a  style='color:#006588;'href='#' type='button' data-toggle="modal" data-target="#trans-card-modal{{$c}}">View Transformation</a>
							<div class="modal fade trans-modal" id="trans-card-modal{{$c}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Body Transformation</h4>
							      </div>
							      <div class="modal-body">
							      	<div class='col-xs-12 bottom-margin'>
							      		<div class='row'>
							      			<div class='col-xs-6'>
							      				<div class="row">
													<div class="col-xs-12"><h3 class="text-center">Before</h3></div>
												</div>
									      		@foreach($before as $bf)
													@foreach($bf as $beforePic)
													@if($beforePic->user_id == $card->id)
														<img src="{{URL::asset('uploads/user/progress')."/".$beforePic->file}}" alt='journey Phots' class="img-responsive">
													@endif
													@endforeach
									      		@endforeach
								      			</div>
								      			<div class='col-xs-6'>
								      				<div class="row">
														<div class="col-xs-12"><h3 class="text-center">After</h3></div>
													</div>
									      		@foreach($progress as $pg)
													@foreach($pg as $progressPic)
													@if($progressPic->user_id == $card->id)
														<img src="{{URL::asset('uploads/user/progress')."/".$progressPic->file}}" alt='journey Phots' class="img-responsive">
													@endif
													@endforeach
									      		@endforeach
							      			</div>
							      		</div>
							      	</div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							      </div>
							    </div>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@if($c % 3 == 0 )
					<div class="clearfix visible-lg-block visible-md-block"></div>
					@endif
			@endforeach
		</div>
	</div>
</div>
@stop