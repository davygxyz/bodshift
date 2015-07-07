@extends('master')
@section('content')

<div class='row'>
  <div class='col-sm-12 col-md-6 col-md-offset-3 content'>
    <h2>Contact Us</h2>
  </div>
</div>
<div class='row'>
  <div class='col-sm-12 col-md-6 col-md-offset-3 content'>
    
    <form method="POST" action="{{ url('contact/email') }}">
      <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="user_id" value="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
        <label for="ct-firstname">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label for="ct-email">Your Email:</label>
        <input type="email" class="form-control" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" placeholder="Enter Email Address">
      </div>
      <div class="form-group">
        <label for="ct-message">Message:</label>
        <textarea class="form-control" name="msg" rows="3"></textarea>
      </div>
      <div class="checkbox">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>
</div>
@stop
