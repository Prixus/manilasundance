@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


      <h3 class="sub-header subsett">Stall Reservations Report
          <div style=float:right;font-size:14px;>
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button>
          </div></h3>
      <h5>{{$StartDate}} to {{$EndDate}}</h5>
      @if($TypeOfReport == "Revenue")

      @elseif($TypeOfReport == "User Registrations")

      @else

      @endif


      <br><br>
      <button style = "background-color:red;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/reportform">Back</a></button>
      <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary">Download PDF</button>
		  <br><br>



		</div>
        </div>
      </div>

@endsection
