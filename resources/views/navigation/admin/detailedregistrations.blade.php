@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>





          <table class="table table-striped">
          <h2 class="sub-header">Monthly User Registrations<div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button>
              <thead>
                <tr>
          <th>Month</th>
          <th>Year</th>
          <th>Total Accounts</th>
                </tr>
              </thead>
              <tbody>
              @foreach($accountRegistration as $registration)
                @php
                     $monthnum =$registration->months;
                     $dateObj = DateTime::createFromFormat('!m',$monthnum);
                     $monthname = $dateObj->format('F');
                     @endphp
                <tr>
                <td>{{$monthname}}</td>
                <td>{{now()->year}}</td>
                <td>{{$registration->Users}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

          <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print" target = "_blank">Print</a></button>
          <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>

    </div>
        </div>
      </div>

@endsection
