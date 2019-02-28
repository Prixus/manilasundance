@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>
 <div><h2 class="sub-header">Monthly Revenue<div style = "float:right;font-size:14px;"></div>
<button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print/monthly" target="_blank">Print</a></button>
<button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyRevenue"></button>

          <div class="collapse out" id ="MonthlyRevenue">
          <table class="table table-striped">
              <thead>
                <tr>
          <th>Month</th>
          <th>Year</th>
          <th>Amount To Collect</th>
          <th>Amount Collected</th>
          <th>Total Revenue</th>
                </tr>
              </thead>
              <tbody>
              @foreach($accountRevenue as $revenue)
                @php
                     $monthnum =$revenue->months;
                     $dateObj = DateTime::createFromFormat('!m',$monthnum);
                     $monthname = $dateObj->format('F');
                     @endphp
                <tr>
                <td>{{$monthname}}</td>
                <td>{{now()->year}}</td>
                <td style = "color:red">{{$revenue->TotalAmountToBePaid}}</td>
                <td style = "color:green">{{$revenue->TotalAmountPaid}}</td>
                <td>{{$revenue->TotalRevenue}}</td>
                </tr>
                @endforeach
                @if($accountAnnualRevenue->TotalAmountToBePaid != NULL)
                <tr>
                <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
                <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                <td style="color:red;font-size: 1.3em">{{$accountAnnualRevenue->TotalAmountToBePaid}}</td>
                <td style="color:green;font-size: 1.3em">{{$accountAnnualRevenue->TotalAmountPaid}}</td>
                <td style="color:black;font-size: 1.3em">{{$accountAnnualRevenue->TotalRevenue}}</td>
                </tr>
                @else
                <tr>
                <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
                <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                <td style="color:red;font-size: 1.3em">0.00</td>
                <td style="color:green;font-size: 1.3em" >0.00</td>
                <td>0.00</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
		</div>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <div><h2 class="sub-header">Monthly Revenue per Bazaar<div style = "float:right;font-size:14px;"></div>
         <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print/monthlyperbazaar" target="_blank">Print</a></button>
         <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyRevenueperBazaaar"></button>

          <div class="collapse out" id ="MonthlyRevenueperBazaaar">
         <table class="table table-striped">


             <thead>
               <tr>
         <th>Month</th>
         <th>Year</th>
         <th>Bazaar Name</th>
         <th>Amount To Collect</th>
         <th>Amount Collected</th>
         <th>Total Revenue</th>
               </tr>
             </thead>

             @foreach($accountRevenuePerBazaar as $revenue)
             @php
                  $monthnum =$revenue->months;
                  $dateObj = DateTime::createFromFormat('!m',$monthnum);
                  $monthname = $dateObj->format('F');
                  @endphp
                 <tr>
                 <td>{{$monthname}}</td>
                 <td>{{now()->year}}</td>
                 <td>{{$revenue->BazaarName}}</td>
                 <td style = "color:red">{{$revenue->TotalAmountToBePaid}}</td>
                 <td style = "color:green">{{$revenue->TotalAmountPaid}}</td>
                 <td>{{$revenue->TotalRevenue}}</td>
                 </tr>
               @endforeach
               @if($accountAnnualRevenue->TotalAmountToBePaid != NULL)
               <tr>
               <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
               <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
               <td></td>
               <td style="color:red;font-size: 1.3em">{{$accountAnnualRevenue->TotalAmountToBePaid}}</td>
               <td style="color:green;font-size: 1.3em">{{$accountAnnualRevenue->TotalAmountPaid}}</td>
               <td style="color:black;font-size: 1.3em">{{$accountAnnualRevenue->TotalRevenue}}</td>
               </tr>
               @else
               <tr>
               <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
               <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
               <td></td>
               <td style="color:red;font-size: 1.3em">0.00</td>
               <td style="color:green;font-size: 1.3em">0.00</td>
               <td style="color:black;font-size: 1.3em">0.00</td>
               </tr>
               @endif
             </tbody>
           </table>
         </div>
        		</div>
                </div>


      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div><h2 class="sub-header">Quarterly Revenue<div style = "float:right;font-size:14px;"></div>
       <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print/quarterly" target="_blank">Print</a></button>
       <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#QuarterlyRevenue"></button>

        <div class="collapse out" id ="QuarterlyRevenue">
        <table class="table table-striped">
                    <thead>
                      <tr>
                <th>Quarter</th>
                <th>Year</th>
                <th>Amount To Collect</th>
                <th>Amount Collected</th>
                <th>Total Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($accountFirstQuarterRevenue->TotalAmountToBePaid != NULL)
                      <tr>
                      <td>First Quarter</td>
                      <td>{{now()->year}}</td>
                      <td style = "color:red">{{$accountFirstQuarterRevenue->TotalAmountToBePaid}}</td>
                      <td style = "color:green">{{$accountFirstQuarterRevenue->TotalAmountPaid}}</td>
                      <td>{{$accountFirstQuarterRevenue->TotalRevenue}}</td>
                      </tr>
                      @else
                      <tr>
                      <td>First Quarter</td>
                      <td>{{now()->year}}</td>
                      <td style = "color:red">0.00</td>
                      <td style = "color:green">0.00</td>
                      <td>0.00</td>
                      </tr>
                      @endif

                      @if($accountSecondQuarterRevenue->TotalAmountToBePaid != NULL)
                      <tr>
                      <td>Second Quarter</td>
                      <td>{{now()->year}}</td>
                      <td style = "color:red">{{$accountSecondQuarterRevenue->TotalAmountToBePaid}}</td>
                      <td style = "color:green">{{$accountSecondQuarterRevenue->TotalAmountPaid}}</td>
                      <td>{{$accountSecondQuarterRevenue->TotalRevenue}}</td>
                      </tr>
                      @else
                      <tr>
                      <td>Second Quarter</td>
                      <td>{{now()->year}}</td>
                      <td style = "color:red">0.00</td>
                      <td style = "color:green">0.00</td>
                      <td>0.00</td>
                      </tr>
                      @endif

                      @if($accountThirdQuarterRevenue->TotalAmountToBePaid != NULL)
                      <tr>
                      <td>Third Quarter</td>
                      <td>{{now()->year}}</td>
                      <td style = "color:red">{{$accountThirdQuarterRevenue->TotalAmountToBePaid}}</td>
                      <td style = "color:green">{{$accountThirdQuarterRevenue->TotalAmountPaid}}</td>
                      <td>{{$accountThirdQuarterRevenue->TotalRevenue}}</td>
                      </tr>
                      @else
                      <tr>
                      <td>Third Quarter</td>
                      <td>{{now()->year}}</td>
                      <td style = "color:red">0.00</td>
                      <td style = "color:green">0.00</td>
                      <td>0.00</td>
                      </tr>
                      @endif

                      @if($accountFourthQuarterRevenue->TotalAmountToBePaid != NULL)
                      <tr>
                      <td>Fourth Quarter</td>
                      <td>{{now()->year}}</td>
                      <td style = "color:red">{{$accountFourthQuarterRevenue->TotalAmountToBePaid}}</td>
                      <td style = "color:green">{{$accountFourthQuarterRevenue->TotalAmountPaid}}</td>
                      <td>{{$accountFourthQuarterRevenue->TotalRevenue}}</td>
                      </tr>
                      @else
                      <tr>
                      <td>Fourth Quarter</td>
                      <td>{{now()->year}}</td>
                      <td style = "color:red">0.00</td>
                      <td style = "color:green">0.00</td>
                      <td>0.00</td>
                      </tr>
                      @endif

                      @if($accountAnnualRevenue->TotalAmountToBePaid != NULL)
                      <tr>
                      <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
                      <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                      <td style="color:red;font-size: 1.3em">{{$accountAnnualRevenue->TotalAmountToBePaid}}</td>
                      <td style="color:green;font-size: 1.3em">{{$accountAnnualRevenue->TotalAmountPaid}}</td>
                      <td style="color:black;font-size: 1.3em">{{$accountAnnualRevenue->TotalRevenue}}</td>
                      </tr>
                      @else
                      <tr>
                      <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
                      <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                      <td style="color:red;font-size: 1.3em">0.00</td>
                      <td style="color:green;font-size: 1.3em" >0.00</td>
                      <td>0.00</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
      		</div>
              </div>

              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div><h2 class="sub-header">Semi-Annual Revenue<div style = "float:right;font-size:14px;"></div>
                   <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print/SemiAnnual" target="_blank">Print</a></button>
                  <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#SemiAnnualRevenue"></button>

                   <div class="collapse out" id ="SemiAnnualRevenue">
                <table class="table table-striped">
                            <thead>
                              <tr>
                        <th>Annual</th>
                        <th>Year</th>
                        <th>Amount To Collect</th>
                        <th>Amount Collected</th>
                        <th>Total Revenue</th>
                              </tr>
                            </thead>
                            <tbody>


                              @if($accountFirstSemiAnnualRevenue->TotalAmountToBePaid != NULL)
                              <tr>
                              <td>First Semi-Annual</td>
                              <td>{{now()->year}}</td>
                              <td style = "color:red">{{$accountFirstSemiAnnualRevenue->TotalAmountToBePaid}}</td>
                              <td style = "color:green">{{$accountFirstSemiAnnualRevenue->TotalAmountPaid}}</td>
                              <td>{{$accountFirstSemiAnnualRevenue->TotalRevenue}}</td>
                              </tr>
                              @else
                              <tr>
                              <td>First Semi-Annual</td>
                              <td>{{now()->year}}</td>
                              <td style = "color:red">0.00</td>
                              <td style = "color:green">0.00</td>
                              <td>0.00</td>
                              </tr>
                              @endif

                              @if($accountSecondSemiAnnualRevenue->TotalAmountToBePaid != NULL)
                              <tr>
                              <td>Second Semi-Annual</td>
                              <td>{{now()->year}}</td>
                              <td style = "color:red">{{$accountSecondSemiAnnualRevenue->TotalAmountToBePaid}}</td>
                              <td style = "color:green">{{$accountSecondSemiAnnualRevenue->TotalAmountPaid}}</td>
                              <td>{{$accountSecondSemiAnnualRevenue->TotalRevenue}}</td>
                              </tr>
                              @else
                              <tr>
                              <td>Second Semi-Annual</td>
                              <td>{{now()->year}}</td>
                              <td style = "color:red">0.00</td>
                              <td style = "color:green">0.00</td>
                              <td>0.00</td>
                              </tr>
                              @endif

                              @if($accountAnnualRevenue->TotalAmountToBePaid != NULL)
                              <tr>
                              <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
                              <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                              <td style="color:red;font-size: 1.3em">{{$accountAnnualRevenue->TotalAmountToBePaid}}</td>
                              <td style="color:green;font-size: 1.3em">{{$accountAnnualRevenue->TotalAmountPaid}}</td>
                              <td style="color:black;font-size: 1.3em">{{$accountAnnualRevenue->TotalRevenue}}</td>
                              </tr>
                              @else
                              <tr>
                              <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
                              <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                              <td style="color:red;font-size: 1.3em">0.00</td>
                              <td style="color:green;font-size: 1.3em" >0.00</td>
                              <td>0.00</td>
                              </tr>
                              @endif
                            </tbody>
                          </table>



                      </div>
                  </div>
                                     <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print" target="_blank">Print all</a></button>
                  <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>
                      </div>
            </div>

<script type="text/javascript">
$(".btn[data-target='#MonthlyRevenue']").text('Expand');
$(".btn[data-target='#MonthlyRevenue']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyRevenue']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#MonthlyRevenueperBazaaar']").text('Expand');
$(".btn[data-target='#MonthlyRevenueperBazaaar']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyRevenueperBazaaar']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#QuarterlyRevenue']").text('Expand');
$(".btn[data-target='#QuarterlyRevenue']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#QuarterlyRevenue']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#SemiAnnualRevenue']").text('Expand');
$(".btn[data-target='#SemiAnnualRevenue']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#SemiAnnualRevenue']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

</script>
@endsection
