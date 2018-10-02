@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>

	<form method="POST">
      <h3 class="sub-header subsett">Customize your report.</h3>
      <br>


        <h5 class="perrow"><div class="lbl">Report:</div>
			<select class="txtbox">
				<option>Revenue</option>
				<option>User Registration</option>
				<option>Stall Reservations</option>
				<option>All</option>
			</select>
			</h5>
        <h5 class="perrow"><div class="lbl">Starting From:</div>    <input class="txtbox" type="date"></h5>
        <h5 class="perrow"><div class="lbl">Until:</div>    <input class="txtbox" type="date"> <div class="lbl" id="message"></div></h5>
      <br><br>
      		<button style = "background-color:red;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>
		  <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary"><a href="/admin/viewreport">View Report</a></button>
		  <br><br>
    </form>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br>


		</div>
        </div>
      </div>

@endsection
