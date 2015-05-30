@extends('master')

@section('content')
<div class='row'>
	<div class='col-xs-12 col-md-3'>
		<div class='row'>
			<div class='col-xs-12'>
				<img src="http://placehold.it/600x600" alt='profile-picture' class="img-responsive">	
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12'>
				<ul class="nav nav-pills nav-stacked">

				    <li>Name: {{ $user_info->name}}</li>
				    <li>Email: {{ $user_info->email}}</li>
				    <li>Age:</li>
				    <li>Height:</li>
				    <li>Weight:</li>
				    <li>Member Since: {{ date("m/d/Y",strtotime($user_info->created_at)) }} </li>
				    <li><a href="#">Photo Gallery</a></li>
				</ul>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12'>
				<div class='row'>
					<div class="panel panel-default">
						<div class="panel-heading text-center">About Me</div>
						<div class="panel-body">
							<p>
							Pellentcitur a vitae orci. Pellentesque euismod porttitor tortor i in urna et, vehicula blandit ante. Praesent est libero, tempor nec interdum eget, accumsan id metus. Curabitur varius quam sit amet mauris tempus, ut elementum purus luctus.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12'>
				<div class='row'>
					<div class="panel panel-default">
						<div class="panel-heading text-center">Goals</div>
						<div class="panel-body">
							<p>
							Pellentcitur a vitae orci. Pellentesque euismod porttitor tortor i in urna et, vehicula blandit ante. Praesent est libero, tempor nec interdum eget, accumsan id metus. Curabitur varius quam sit amet mauris tempus, ut elementum purus luctus.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='col-xs-12 col-md-9'>
		<div class='row'>
			<div class='col-xs-12'>
				<a href='#' class=' btn btn-block'>Back to Home</a>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12' id='trans-scroll'>
				<div class='slider'>
				    <div id='left1' class='left'>&lt;</div>
				    <div id='right1' class='right'>&gt;</div>
				    <div class='track' id='track1'>
				        <div class='progress-pic' style='margin-top:24px'>
				        	<img src="http://placehold.it/600x600" alt='journey Phots' class="img-responsive">
							<div class='small-12 columns text-centered'>Wghjgjkgh</div>
							<div class='small-12 columns text-centered'>gjdffggjf</div>
				        </div>
				        <div class='progress-pic' style='margin-top:24px'>
				        	<img src="http://placehold.it/600x600" alt='journey Phots' class="img-responsive">
							<div class='small-12 columns text-centered'>Wghjgjkgh</div>
							<div class='small-12 columns text-centered'>gjdffggjf</div>
				        </div>
				        <div class='progress-pic' style='margin-top:24px'>
				        	<img src="http://placehold.it/600x600" alt='journey Phots' class="img-responsive">
							<div class='small-12 columns text-centered'>Wghjgjkgh</div>
							<div class='small-12 columns text-centered'>gjdffggjf</div>
				        </div>
				        <div class='progress-pic' style='margin-top:24px'>
				        	<img src="http://placehold.it/600x600" alt='journey Phots' class="img-responsive">
							<div class='small-12 columns text-centered'>Wghjgjkgh</div>
							<div class='small-12 columns text-centered'>gjdffggjf</div>
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@stop