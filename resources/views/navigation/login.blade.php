@extends('layouts.app')

@section('content')

<section id = "LogBG">
<form class = "form" style = "width:50%;text-align:center;display: block;margin: auto;position:absolute;top:35%;left:35%;" action = "/brand/login" method = "POST">
	  {{ csrf_field() }}
	<input type="text" placeholder="Enter Username" name="txtUserName"/> <br/>
  <input type="password" placeholder="Enter Password" name = "txtUserPassword"/> <br/>

<input type= "submit" value="LOGIN" style = "background-color:#ffffe0;">

</form>
</section>
<!--<img src = "Pictures\bookIcon.png" alt = "Manila Sundance Logo" style = "position:absolute; TOP:10%; LEFT:32%; WIDTH:60px; HEIGHT:60px">-->
<p style = "display:inline;font-family:Verdana;font-size:50;font-style:Bold;position:absolute; LEFT:43%; top: 18%;color:#3ce1e0;"> LOGIN <p/>

@endsection
