@extends('master')
@section('content')
<div class='row'>
	<div class='col-sm-12 content'>
		<h2>Donations</h2>
	</div>
</div>
<div class='row'>
	<div class='col-sm-12 col-lg-6 content'>
		<p>
			Pellentcitur a vitae orci. Pellentesque euismod porttitor tortor i in urna et, vehicula blandit ante. Praesent est libero, tempor nec interdum eget, accumsan id metus. Curabitur varius quam sit amet mauris tempus, ut elementum purus luctus.
		</p>
	</div>
	<div class='col-sm-12 col-lg-6 content'>
		<div class='row bottom-margin'>
			<div class='col-sm-12'>
				<img src="http://placehold.it/600x100" alt='donate-image' class="img-responsive">
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style='text-align:center;'>
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="K7HDHKKBTXC5N">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
		</div>

	</div>
</div>
@stop