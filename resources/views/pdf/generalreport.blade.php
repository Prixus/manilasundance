<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Manila Sundance</title>
<link rel="icon" href="/img/MSLogo.png">
<!-- This link calls the css file from the public folder -->
<link href="/css/sign.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/carousel.css" rel="stylesheet">

<style>
  body {
    font-family: 'Times New Roman';
    color: black;
  }
  h5, p, label {
    display: inline-block;
    margin: 6px;
  }
  h5{
    color: #F79391;
    font-size: 16px;
    font-weight: bold;
  }
  p, label {
    color: black;
    font-weight: normal;
  }
  .lbl {
    width:150px;
  }
</style>


</head>
<body>
  <center>
  <img src = "img/mslogo/logo.png" style="height:129;width:500px;">
  <h1>Manila Sundance</h1>
  <h4>Fashion Events</h4>
  </center>

  <br>
    <h5 class="lbl">Address:   </h5><p>Cityland Tower 1, Mandaluyong City</p><br>
    <h5 class="lbl">Tin Number:   </h5><p>894563286787</p><br>
    <h5 class="lbl">Telephone Number :   </h5><p>252-89-91</p><br>
    <h5 class="lbl">Fax:    </h5><p>252-89-91</p><br>
    <h5 class="lbl">Website:    </h5><p>ManilaSundance.com</p>
  <br><br>


    <!-- <div style = "float:right;font-size:14px;">
  <input type = "text" placeholder = "Search...">
  <button class = "btnSearch">GO</button> -->
  <h2 class="sub-header" style = "color:#3ce1e0;">Monthly Collection
    <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#mcollection">
    </button>
  </h2>
<div id="mcollection" class="collapse in">
  <div class="table-responsive">

  <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">
      <thead style="width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
  <th>Month</th>
  <th>Year</th>
  <th>Total Revenue</th>
        </tr>
      </thead>
      <tbody>
        @foreach($yearlyRevenue as $revenue)
        @php
             $monthnum =$revenue->months;
             $dateObj = DateTime::createFromFormat('!m',$monthnum);
             $monthname = $dateObj->format('F');
             @endphp
        <tr>
        <td>{{$monthname}}</td>
        <td>{{now()->year}}</td>
        <td>{{$revenue->TotalRevenue}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <br><br>

  </div>
</div>

<hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">


<!-- User Registrations -->

  <h2 class="sub-header" style = "color:#3ce1e0;">Monthly User Registrations
    <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#mregistrations">
    </button>
  </h2>
    <!-- <div style = "float:right;font-size:14px;">
  <input type = "text" placeholder = "Search...">
  <button class = "btnSearch">GO</button> -->

<div id="mregistrations" class="collapse in">
  <div class="table-responsive">

    <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">
      <thead style="width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
  <th>Month</th>
  <th>Year</th>
  <th>User Registrations</th>
        </tr>
      </thead>
      <tbody>
      @foreach($yearlyRegistration as $registration)
        @php
             $monthnum =$registration->months;
             $dateObj = DateTime::createFromFormat('!m',$monthnum);
             $monthname = $dateObj->format('F');
             @endphp
        <tr>
        <td>{{$monthname}}</td>
        <td>{{now()->year}}</td>
        <td>{{$registration->TotalUsers}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

<br><br>

</div>
</div>

<hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">


<!-- Stall Reservations -->

  <h2 class="sub-header" style = "color:#3ce1e0;">Monthly Stall Reservations
    <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#mreservations">
    </button>
  </h2>
  <!-- <div style = "float:right;font-size:14px;">
  <input type = "text" placeholder = "Search...">
  <button class = "btnSearch">GO</button> -->

<div id="mreservations" class="collapse in">
  <div class="table-responsive">

    <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">
      <thead style="width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
  <th>Month</th>
  <th>Year</th>
  <th>User Reservations</th>
        </tr>
      </thead>
      <tbody>
      @foreach($yearlyReservation as $reservation)
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

<br><br>
</div>

</body>
</html>
