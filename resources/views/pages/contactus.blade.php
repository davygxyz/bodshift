@extends('master')
@section('content')
<div class='row'>
  <div class='col-sm-12 col-md-6 col-md-offset-3'>
    <h2>Contact Us</h2>
  </div>
</div>
<div class='row'>
  <div class='col-sm-12 col-md-6 col-md-offset-3'>
    <form>
      <div class="form-group">
        <label for="ct-firstname">First Name:</label>
        <input type="text" class="form-control" id="ct-firsname" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label for="ct-lastname">Last Name:</label>
        <input type="text" class="form-control" id="ct-lastname" placeholder="Enter Last Name">
      </div>
      <div class="form-group">
        <label for="ct-email">Your Email:</label>
        <input type="email" class="form-control" id="ct-email" placeholder="Enter Email Address">
      </div>
      <div class="form-group">
        <label for="ct-message">Message:</label>
        <textarea class="form-control" id="ct-message" rows="3"></textarea>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox"> Are you a user?
        </label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>

  </div>
</div>
@stop
