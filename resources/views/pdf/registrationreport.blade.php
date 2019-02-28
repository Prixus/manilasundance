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
  <br>


  <div class="container-fluid">
      <h2>Monthly Registration</h2>
    <div class="table-responsive">
  <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

      <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
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
        @if($AnnualRegistrations != NULL)

        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Registration</td>
        <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
        <td style="color:black;font-size: 1.3em">{{$AnnualRegistrations->Users}}</td>
        </tr>
          @else
            <tr>
          <td>Annual Registration</td>
          <td>{{now()->year}}</td>
          <td>0</td>
        </tr>
          @endif
      </tbody>
    </table>
  </div>
  </div>

  <div class="container-fluid">
      <h2>Semi-Annual Registrations</h2>
    <div class="table-responsive">
  <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

      <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
  <th>Month</th>
  <th>Year</th>
  <th>Total Accounts</th>
        </tr>
      </thead>
      <tbody>
      </thead>
      <tbody>
        @if($FirstHalfAnnualRegistrations != NULL)

          <tr>
          <td>First Semi-Annual </td>
          <td>{{now()->year}}</td>
          <td>{{$FirstHalfAnnualRegistrations->Users}}</td>
          </tr>
          @else
            <tr>
          <td>First Semi-Annual</td>
          <td>{{now()->year}}</td>
          <td>0</td>
          </tr>
          @endif

          @if($SecondHalfAnnualRegistrations != NULL)

          <tr>
          <td>Second Semi-Annual</td>
          <td>{{now()->year}}</td>
          <td>{{$SecondHalfAnnualRegistrations->Users}}</td>
          </tr>
            @else
              <tr>
            <td>Second Semi-Annual</td>
            <td>{{now()->year}}</td>
            <td>0</td>
          </tr>
            @endif
        @if($AnnualRegistrations != NULL)

        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Registration</td>
        <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
        <td style="color:black;font-size: 1.3em">{{$AnnualRegistrations->Users}}</td>
        </tr>
          @else
            <tr>
          <td>Annual Registration</td>
          <td>{{now()->year}}</td>
          <td>0</td>
        </tr>
          @endif
      </tbody>
    </table>
  </div>
  </div>

  <div class="container-fluid">
      <h2>Quarterly Registration</h2>
    <div class="table-responsive">
  <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

      <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
  <th>Quarter</th>
  <th>Year</th>
  <th>Total Accounts</th>
        </tr>
      </thead>
      <tbody>
      @if($FirstQuarterRegistrations != NULL)

        <tr>
        <td>First Quarter</td>
        <td>{{now()->year}}</td>
        <td>{{$FirstQuarterRegistrations->Users}}</td>
        </tr>
        @else
          <tr>
        <td>First Quarter</td>
        <td>{{now()->year}}</td>
        <td>0</td>
        </tr>
        @endif

        @if($SecondQuarterRegistrations != NULL)

        <tr>
        <td>Second Quarter</td>
        <td>{{now()->year}}</td>
        <td>{{$SecondQuarterRegistrations->Users}}</td>
        </tr>
          @else
            <tr>
          <td>Second Quarter</td>
          <td>{{now()->year}}</td>
          <td>0</td>
        </tr>
          @endif

          @if($ThirdQuarterRegistrations != NULL)

          <tr>
          <td>Third Quarter</td>
          <td>{{now()->year}}</td>
          <td>{{$ThirdQuarterRegistrations->Users}}</td>
          </tr>
            @else
            <tr>
            <td>Third Quarter</td>
            <td>{{now()->year}}</td>
            <td>0</td>
          </tr>
            @endif

            @if($FourthQuarterRegistrations != NULL)

            <tr>
            <td>Fourth Quarter</td>
            <td>{{now()->year}}</td>
            <td>{{$FourthQuarterRegistrations->Users}}</td>
            </tr>
              @else
                <tr>
              <td>Fourth Quarter</td>
              <td>{{now()->year}}</td>
              <td>0</td>
            </tr>
              @endif

              @if($AnnualRegistrations != NULL)

              <tr>
              <td style="color:blue;font-size: 1.3em">Annual Registration</td>
              <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
              <td style="color:black;font-size: 1.3em">{{$AnnualRegistrations->Users}}</td>
              </tr>
                @else
                  <tr>
                <td>Annual Registration</td>
                <td>{{now()->year}}</td>
                <td>0</td>
              </tr>
                @endif
      </tbody>
    </table>
  </div>
  </div>


</body>
</html>
