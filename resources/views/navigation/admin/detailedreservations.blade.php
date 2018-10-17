@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>





          <table class="table table-striped">
          <h2 class="sub-header">Monthly Reservations<div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
              <thead>
                <tr>
          <th>Month</th>
          <th>Year</th>
	    <th>Total Reservations</th>
                </tr>
              </thead>
              <tbody>
              @foreach($reservationsCount as $reservation)
                @php
                     $monthnum =$reservation->months;
                     $dateObj = DateTime::createFromFormat('!m',$monthnum);
                     $monthname = $dateObj->format('F');
                     @endphp
                <tr>
                <td>{{$monthname}}</td>
                <td>{{now()->year}}</td>
                <td>{{$reservation->TotalReservation}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <table class="table table-striped">
              <thead>
                <tr>
               <th>Month</th>
               <th>Year</th>
               <th>Void Reservations</th>
                </tr>
              </thead>
              <tbody>
              @foreach($reservationsVoid as $Voidreservation)
                  @php
                   $monthnum =$Voidreservation->months;
                   $dateObj = DateTime::createFromFormat('!m',$monthnum);
                   $monthname = $dateObj->format('F');
                   @endphp
              <tr>
                <td>{{$monthname}}</td>
                <td>{{now()->year}}</td>
                <td>{{$Voidreservation->VoidReservations}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <table class="table table-striped">
            <h2 class="sub-header">Monthly Reservations per Bazaar<div style = "float:right;font-size:14px;">
                <thead>
                  <tr>
            <th>Month</th>
            <th>Year</th>
            <th>Bazaar Name</th>
            <th>Total Reservations</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($reservationsCountPerBazaar as $reservation)
                  @php
                       $monthnum =$reservation->months;
                       $dateObj = DateTime::createFromFormat('!m',$monthnum);
                       $monthname = $dateObj->format('F');
                       @endphp
                  <tr>
                  <td>{{$monthname}}</td>
                  <td>{{now()->year}}</td>
                  <td>{{$reservation->BazaarName}}</td>
                  <td>{{$reservation->TotalReservation}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              <table class="table table-striped">
                  <thead>
                    <tr>
              <th>Month</th>
              <th>Year</th>
              <th>Bazaar Name</th>
              <th>Total Void Reservations</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($reservationsVoidPerBazaar as $reservation)
                    @php
                         $monthnum =$reservation->months;
                         $dateObj = DateTime::createFromFormat('!m',$monthnum);
                         $monthname = $dateObj->format('F');
                         @endphp
                    <tr>
                    <td>{{$monthname}}</td>
                    <td>{{now()->year}}</td>
                    <td>{{$reservation->BazaarName}}</td>
                    <td>{{$reservation->VoidReservations}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>



            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Month</th>
                  <th>Year</th>
                  <th>Bazaar Count</th>
                </tr>
              </thead>
              <tbody>
              @foreach($bazaarCount as $bazaar)
                @php
                     $monthnum =$bazaar->months;
                     $dateObj = DateTime::createFromFormat('!m',$monthnum);
                     $monthname = $dateObj->format('F');
                     @endphp
                <tr>
                <td>{{$monthname}}</td>
                <td>{{now()->year}}</td>
                <td>{{$bazaar->bazaarCount}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>



            <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print" target="_blank">Print</a></button>
          <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>

		</div>
        </div>
      </div>

@endsection
