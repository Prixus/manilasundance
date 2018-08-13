@extends('layouts.app')

@section('content')

  <!-- multistep form -->
<form id="msform" action="/brand/login" method="POST">
  <!-- progressbar
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Brand Profile</li>
    <li>Personal Details</li>
  </ul> -->
    {{ csrf_field()}}
  <div class = "login">
  <!-- fieldsets -->
  <fieldset>
    <br>
    <br>
    <h2 class="fs-title">Login Here</h2>
    <br>
    <P>Username:</P>
    <input type="text" name="txtUserName" placeholder="Enter Username" >
    <P>Password:</P>
    <input type="password" name="txtUserPassword" placeholder="Enter Password" >
    <input type="submit" name="login" class="submit action-button" value="Log in" /><br>
    <a href = "#">Forgot password?</a><br>
    <a href = "#">Don't have an account? Sign up now!</a><br>
</fieldset>

<img src = "img/sign/pink-icon.png" class = "avatar">
</div>
</form>

@endsection
