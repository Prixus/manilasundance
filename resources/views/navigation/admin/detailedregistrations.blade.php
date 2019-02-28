@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>
 <div><h2 class="sub-header">Monthly User Registrations<div style = "float:right;font-size:14px;"></div>
<button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print/monthly" target = "_blank">Print</a></button>
<button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyRegistrations"></button>

          <div class="collapse out" id ="MonthlyRegistrations">
          <table class="table table-striped">
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
        </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <div><h2 class="sub-header">Semi-Annual Registrations<div style = "float:right;font-size:14px;"></div>
        <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print/annually" target = "_blank">Print</a></button>
        <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#SemiAnnual"></button>

                  <div class="collapse out" id ="SemiAnnual">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                  <th>Month</th>
                  <th>Year</th>
                  <th>Total Accounts</th>
                        </tr>
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
                </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <div><h2 class="sub-header">Quarterly Registrations<div style = "float:right;font-size:14px;"></div>
                      <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print/quarterly" target = "_blank">Print</a></button>
          <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#QuarterlyRegistrations"></button>

          <div class="collapse out" id ="QuarterlyRegistrations">
                  <table class="table table-striped">


                      <thead>
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
            <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>
            <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print" target = "_blank">Print All</a></button>
                </div>

      </div>
    </div>

    <script type="text/javascript">
    $(".btn[data-target='#QuarterlyRegistrations']").text('Expand');
    $(".btn[data-target='#QuarterlyRegistrations']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#QuarterlyRegistrations']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });

    $(".btn[data-target='#MonthlyRegistrations']").text('Expand');
    $(".btn[data-target='#MonthlyRegistrations']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#MonthlyRegistrations']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });

    $(".btn[data-target='#SemiAnnual']").text('Expand');
    $(".btn[data-target='#SemiAnnual']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#SemiAnnual']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });

    </script>

@endsection
