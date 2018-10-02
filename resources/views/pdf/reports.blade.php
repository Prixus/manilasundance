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

  <div class="container-fluid">
      <div class="row">

          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



        <center>
        <img src = "img/mslogo/logo.png" style="height:129;width:500px;">
        </center>
        <center><h2 style = "width:100%; border-top:2px; border-bottom:2px; border-top-style: dashed; border-bottom-style: dashed; #000">MONTHLY REPORTS<h2></center>

          <br>
          <h4>For the Month of: </h4> 
          <br>
          
          <h2 class="sub-header" style = "color:#3ce1e0;">Monthly Collection</h2>

      <div id="mcollection" class="collapse in">
          <div class="table-responsive">

          <table class="table table-striped">
              <thead>
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

          <h2 class="sub-header" style = "color:#3ce1e0;">Monthly User Registrations</h2>

      <div id="mregistrations" class="collapse in">
          <div class="table-responsive">

            <table class="table table-striped">
              <thead>
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

          <h2 class="sub-header" style = "color:#3ce1e0;">Monthly Stall Reservations</h2>

      <div id="mreservations" class="collapse in">
          <div class="table-responsive">

            <table class="table table-striped">
              <thead>
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
</div>


      </div>
  </div>

</body>
</html>
