@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>



          <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->

          <!-- start dessa 2018-08-27 -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> Reports</h3>

              <p>Customized</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/admin/reportform" class="small-box-footer">Click to Cutomize Reports <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <!-- end dessa 2018-08-27 -->

        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              @foreach($AccountRevenue as $revenue)
                @if($revenue->months == now()->month)
                  <h3 title="{{$revenue->TotalRevenue}}">{{$revenue->TotalRevenue}}<sup style="font-size: 20px"></sup></h3>
                    @php
                     $monthnum =$revenue->months;
                     $dateObj = DateTime::createFromFormat('!m',$monthnum);
                     $monthname = $dateObj->format('F');
                     @endphp
                  <p>{{$monthname}} Collection</p>
                @endif
              @endforeach

            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/admin/detailedrevenue" class="small-box-footer">See Table <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            @if($AccountRegistration != NULL)
                  @if($AccountRegistration->months = now()->month)
                  <h3>{{$AccountRegistration->Users}}</h3>
                     @php
                     $monthnum =$AccountRegistration->months;
                     $dateObj = DateTime::createFromFormat('!m',$monthnum);
                     $monthname = $dateObj->format('F');
                     @endphp
                  <p>{{$monthname}} User Registrations</p>
                  @endif
              @else
              <h3>0</h3>
                 @php
                 $monthnum = now()->month;
                 $dateObj = DateTime::createFromFormat('!m',$monthnum);
                 $monthname = $dateObj->format('F');
                 @endphp
              <p>{{$monthname}} User Registrations</p>
              @endif

            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/admin/detailedregistrations" class="small-box-footer">See Table <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              @foreach($ReservationsCount as $reservations)
                @if($reservations->months == now()->month)
                  <h3>{{$reservations->NumberOfReservation}}</h3>
                     @php
                     $monthnum =$reservations->months;
                     $dateObj = DateTime::createFromFormat('!m',$monthnum);
                     $monthname = $dateObj->format('F');
                     @endphp
                  <p>{{$monthname}} User Reservations</p>
                @endif
              @endforeach
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/admin/detailedreservations" class="small-box-footer">See Table <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

<hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">



          <h2 class="sub-header" style = "color:#3ce1e0;">Monthly Collection
            <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#mcollection">
            </button>
          </h2>
            <!-- <div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button> -->

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

          <h2 class="sub-header" style = "color:#3ce1e0;">Monthly User Registrations
            <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#mregistrations">
            </button>
          </h2>
            <!-- <div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button> -->

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

          <h2 class="sub-header" style = "color:#3ce1e0;">Monthly Stall Reservations
            <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#mreservations">
            </button>
          </h2>
          <!-- <div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button> -->

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

<hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">



<script src="/js/chart.min.js"></script>

<!-- Chart: Monthly Collection -->

          <h2 class="sub-header" style = "color:#3ce1e0;">Chart: Monthly Collection
            <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#ccollection">
            </button>
          </h2>

          <div id="ccollection" class="collapse in">
          <canvas id="myChartCollection"></canvas>
          <br><br>
          </div>

          <hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">

<!-- Chart: Monthly User Registrations -->

          <h2 class="sub-header" style = "color:#3ce1e0;">Chart: Monthly User Registrations
            <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#cregistrations">
            </button>
          </h2>

          <div id="cregistrations" class="collapse in">
          <canvas id="myChartRegistration"></canvas>
          <br><br>
          </div>

          <hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">

<!-- Chart: Monthly Stall Reservations -->

          <h2 class="sub-header" style = "color:#3ce1e0;">Chart: Monthly Stall Reservations
            <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#creservations">
            </button>
          </h2>

          <div id="creservations" class="collapse in">
          <canvas id="myChartReservation"></canvas>
          <br><br>
          </div>

          <hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">
          <br>

<script>
var ctxRegistration = document.getElementById('myChartRegistration').getContext('2d');
var chartRegistration = new Chart(ctxRegistration, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset

    data: {
        labels: [
            @php
            foreach($chartRegistration as $Registration){
                 $monthnum =$Registration->months;
                 $dateObj = DateTime::createFromFormat('!m',$monthnum);
                 $monthname = $dateObj->format('F');
                 echo   '"'.$monthname.'"'.',';
            }

            @endphp
                ],
                  datasets: [{
                      label: "Registration Report",
                      backgroundColor: 'rgb(255, 99, 132)',
                      borderColor: 'rgb(255, 99, 132)',
                      data: [
                      @php
                      foreach($chartRegistration as $Registration){
                          echo   "$Registration->count_row".",";
                      }

                      @endphp
                      ],
                  }]
    },

    // Configuration options go here
    options: {}
});

var ctxReservation = document.getElementById('myChartReservation').getContext('2d');
var chartReservation = new Chart(ctxReservation, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [
            @php
            foreach($chartReservation as $Reservation){
                 $monthnum =$Reservation->months;
                 $dateObj = DateTime::createFromFormat('!m',$monthnum);
                 $monthname = $dateObj->format('F');
                 echo   '"'.$monthname.'"'.',';
            }
            @endphp
        ],
                  datasets: [{
                      label: "Reservation Report",
                      backgroundColor: 'rgb(16, 228, 14)',
                      borderColor: 'rgb(255, 99, 132)',
                      data: [
                      @php
                      foreach($chartReservation as $Reservation){
                          echo   "$Reservation->count_row".",";
                      }

                      @endphp
                      ],
                  }]
  },

      // Configuration options go here
    options: {}
    });

var ctxCollection = document.getElementById('myChartCollection').getContext('2d');
var chartCollection = new Chart(ctxCollection, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [
            @php
            foreach($chartCollection as $Collection){
                 $monthnum =$Collection->months;
                 $dateObj = DateTime::createFromFormat('!m',$monthnum);
                 $monthname = $dateObj->format('F');
                 echo   '"'.$monthname.'"'.',';
            }
            @endphp
        ],
                  datasets: [{
                      label: "Collection Report",
                      backgroundColor: 'rgb(236, 229, 19)',
                      borderColor: 'rgb(255, 99, 132)',
                      data: [
                      @php
                      foreach($chartCollection as $Collection){
                          echo   "$Collection->total".",";
                      }

                      @endphp
                      ],
                  }]
  },

      // Configuration options go here
    options: {}
    });



      $(".btn[data-target='#mcollection']").text('Collapse');

      $(".btn[data-target='#mcollection']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#mcollection']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });

    $(".btn[data-target='#mregistrations']").text('Collapse');

  $(".btn[data-target='#mregistrations']").click(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });
  $(".btn[data-target='#mregistrations']").dblclick(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });

    $(".btn[data-target='#mreservations']").text('Collapse');

  $(".btn[data-target='#mreservations']").click(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });
  $(".btn[data-target='#mreservations']").dblclick(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });

    $(".btn[data-target='#creservations']").text('Collapse');

  $(".btn[data-target='#creservations']").click(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });
  $(".btn[data-target='#creservations']").dblclick(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });


    $(".btn[data-target='#cregistrations']").text('Collapse');

  $(".btn[data-target='#cregistrations']").click(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });
  $(".btn[data-target='#cregistrations']").dblclick(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });


    $(".btn[data-target='#ccollection']").text('Collapse');

  $(".btn[data-target='#ccollection']").click(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });
  $(".btn[data-target='#ccollection']").dblclick(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });


</script>

<button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/admin/generalreport/print" target="_blank" >Print</a></button>
    </div>
        </div>
      </div>

@endsection
