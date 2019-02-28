@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       <h1 class="page-header">ADMINISTRATOR</h1>
       <div><h2 class="sub-header">Monthly Reservations<div style = "float:right;font-size:14px;"></div>
      <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/monthly" target="_blank">Print</a></button>
      <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyReservations"></button>

       <div class="collapse out" id ="MonthlyReservations">
         <table class="table table-striped">

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
               @if($AnnualreservationsCount != NULL)
               <tr>
               <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
               <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
               <td style="color:black;font-size: 1.3em">{{$AnnualreservationsCount->TotalReservation}}</td>
               </tr>
               @else
               <tr>
               <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
               <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
               <td>0</td>
               </tr>
               @endif
             </tbody>
           </table>
      </div>

      </div>
      </div>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

 <div><h2 class="sub-header">Monthly Void Reservations<div style = "float:right;font-size:14px;"></div>
<button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/monthly/void" target="_blank">Print</a></button>
<button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyVoidReservations"></button>

 <div class="collapse out" id ="MonthlyVoidReservations">
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
       @if($AnnualVoidreservationsCount->TotalReservation != NULL)
       <tr>
       <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
       <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
       <td style="color:black;font-size: 1.3em">{{$AnnualVoidreservationsCount->TotalReservation}}</td>
       </tr>
       @else
       <tr>
       <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
       <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
       <td></td>
       <td>0</td>
       </tr>
       @endif
     </tbody>
   </table>
</div>

</div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <div><h2 class="sub-header">Monthly Reservations per Bazaar<div style = "float:right;font-size:14px;"></div>
<button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/monthlyperbazaar" target="_blank">Print</a></button>
<button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyReservationsPerBazaar"></button>

 <div class="collapse out" id ="MonthlyReservationsPerBazaar">
   <table class="table table-striped">
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
         @if($AnnualreservationsCount->TotalReservation != NULL)
         <tr>
         <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
         <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
         <td></td>
         <td style="color:black;font-size: 1.3em">{{$AnnualreservationsCount->TotalReservation}}</td>
         </tr>
         @else
         <tr>
         <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
         <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
         <td></td>
         <td>0</td>
         </tr>
         @endif
       </tbody>
     </table>
</div>

</div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <div><h2 class="sub-header">Monthly Void Reservations per Bazaar<div style = "float:right;font-size:14px;"></div>
<button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/monthlyperbazaar/void" target="_blank">Print</a></button>
<button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyVoidReservationsPerBazaar"></button>

 <div class="collapse out" id ="MonthlyVoidReservationsPerBazaar">
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
         @if($AnnualVoidreservationsCount->TotalReservation != NULL)
         <tr>
         <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
         <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
         <td style="color:black;font-size: 1.3em">{{$AnnualVoidreservationsCount->TotalReservation}}</td>
         </tr>
         @else
         <tr>
         <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
         <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
         <td></td>
         <td>0</td>
         </tr>
         @endif
       </tbody>
     </table>
</div>
		</div>
        </div>


  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
   <div><h2 class="sub-header">Monthly Bazaar Count<div style = "float:right;font-size:14px;"></div>
  <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/monthlybazaarcount" target="_blank">Print</a></button>
  <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyBazaarCount"></button>

   <div class="collapse out" id ="MonthlyBazaarCount">
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
      @if($bazaarAnnualCount != NULL)
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Bazaar Count</td>
      <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
      <td style="color:black;font-size: 1.3em">{{$bazaarAnnualCount->bazaarCount}}</td>
      </tr>
      @else
      @endif

      @endforeach
    </tbody>
  </table>
  </div>


  		</div>
          </div>


          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div><h2 class="sub-header">Semi-Annual Reservations<div style = "float:right;font-size:14px;"></div>
               <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/semiannual" target="_blank">Print</a></button>
              <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#SemiAnnualReservation"></button>

               <div class="collapse out" id ="SemiAnnualReservation">
            <table class="table table-striped">
                        <thead>
                          <tr>
                    <th>Annual</th>
                    <th>Year</th>
                    <th>Total Reservations</th>
                          </tr>
                        </thead>
                        <tbody>


                          @if($FirstHalfAnnualReservationsCount->TotalReservation != NULL)
                          <tr>
                          <td>First Semi-Annual Reservations</td>
                          <td>{{now()->year}}</td>
                          <td>{{$FirstHalfAnnualReservationsCount->TotalReservation}}</td>
                          </tr>
                          @else
                          <tr>
                          <td>First Semi-Annual Reservations</td>
                          <td>{{now()->year}}</td>
                          <td>0</td>
                          </tr>
                          @endif

                          @if($SecondHalfAnnualReservationsCount->TotalReservation != NULL)
                          <tr>
                          <td>Second Semi-Annual Reservations</td>
                          <td>{{now()->year}}</td>
                          <td>{{$SecondHalfAnnualReservationsCount->TotalReservation}}</td>
                          </tr>
                          @else
                          <tr>
                          <td>Annual Reservations</td>
                          <td>{{now()->year}}</td>
                          <td></td>
                          <td>0</td>
                          </tr>
                          @endif

                          @if($AnnualreservationsCount->TotalReservation != NULL)
                          <tr>
                          <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
                          <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                          <td style="color:black;font-size: 1.3em">{{$AnnualreservationsCount->TotalReservation}}</td>
                          </tr>
                          @else
                          <tr>
                          <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
                          <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                          <td></td>
                          <td>0</td>
                          </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>

                  </div>
              </div>

              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div><h2 class="sub-header">Quarterly Reservations<div style = "float:right;font-size:14px;"></div>
                   <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/quarterly" target="_blank">Print</a></button>
                  <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#QuarterlyReservations"></button>

                   <div class="collapse out" id ="QuarterlyReservations">
                <table class="table table-striped">
                            <thead>
                              <tr>
                        <th>Quarter</th>
                        <th>Year</th>
                        <th>Total Reservations</th>
                              </tr>
                            </thead>
                            <tbody>


                              @if($FirstQuarterReservationsCount->TotalReservation != NULL)
                              <tr>
                              <td>First Quarter</td>
                              <td>{{now()->year}}</td>
                              <td>{{$FirstQuarterReservationsCount->TotalReservation}}</td>
                              </tr>
                              @else
                              <tr>
                              <td>First Quarter</td>
                              <td>{{now()->year}}</td>
                              <td>0</td>
                              </tr>
                              @endif

                              @if($SecondQuarterReservationsCount->TotalReservation != NULL)
                              <tr>
                              <td>Second Quarter</td>
                              <td>{{now()->year}}</td>
                              <td>{{$SecondQuarterReservationsCount->TotalReservation}}</td>
                              </tr>
                              @else
                              <tr>
                              <td>Second Quarter</td>
                              <td>{{now()->year}}</td>
                              <td>0</td>
                              </tr>
                              @endif

                              @if($ThirdQuarterReservationsCount->TotalReservation != NULL)
                              <tr>
                              <td>Third Quarter Quarter</td>
                              <td>{{now()->year}}</td>
                              <td>{{$ThirdQuarterReservationsCount->TotalReservation}}</td>
                              </tr>
                              @else
                              <tr>
                              <td>Third Quarter </td>
                              <td>{{now()->year}}</td>
                              <td>0</td>
                              </tr>
                              @endif

                              @if($FourthQuarterReservationsCount->TotalReservation != NULL)
                              <tr>
                              <td>Fourth Quarter</td>
                              <td>{{now()->year}}</td>
                              <td>{{$FourthQuarterReservationsCount->TotalReservation}}</td>
                              </tr>
                              @else
                              <tr>
                              <td>Fourth Quarter</td>
                              <td>{{now()->year}}</td>
                              <td>0</td>
                              </tr>
                              @endif

                              @if($AnnualreservationsCount->TotalReservation != NULL)
                              <tr>
                              <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
                              <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                              <td style="color:black;font-size: 1.3em">{{$AnnualreservationsCount->TotalReservation}}</td>
                              </tr>
                              @else
                              <tr>
                              <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
                              <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                              <td>0</td>
                              </tr>
                              @endif
                            </tbody>
                          </table>
                        </div>

                      </div>
                  </div>

                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div><h2 class="sub-header">Semi-Annual Void Reservations<div style = "float:right;font-size:14px;"></div>
                       <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/semiannual/void" target="_blank">Print</a></button>
                      <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#SemiAnnualVoidReservation"></button>

                       <div class="collapse out" id ="SemiAnnualVoidReservation">
                    <table class="table table-striped">
                                <thead>
                                  <tr>
                            <th>Annual</th>
                            <th>Year</th>
                            <th>Total Reservations</th>
                                  </tr>
                                </thead>
                                <tbody>


                                  @if($FirstHalfVoidAnnualReservationsCount->TotalReservation != NULL)
                                  <tr>
                                  <td>First Semi-Annual Reservations</td>
                                  <td>{{now()->year}}</td>
                                  <td>{{$FirstHalfVoidAnnualReservationsCount->TotalReservation}}</td>
                                  </tr>
                                  @else
                                  <tr>
                                  <td>First Semi-Annual Reservations</td>
                                  <td>{{now()->year}}</td>
                                  <td>0</td>
                                  </tr>
                                  @endif

                                  @if($SecondHalfVoidAnnualReservationsCount->TotalReservation != NULL)
                                  <tr>
                                  <td>Second Semi-Annual Reservations</td>
                                  <td>{{now()->year}}</td>
                                  <td>{{$SecondHalfVoidAnnualReservationsCount->TotalReservation}}</td>
                                  </tr>
                                  @else
                                  <tr>
                                  <td>Annual Reservations</td>
                                  <td>{{now()->year}}</td>
                                  <td></td>
                                  <td>0</td>
                                  </tr>
                                  @endif

                                  @if($AnnualVoidreservationsCount->TotalReservation != NULL)
                                  <tr>
                                  <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
                                  <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                                  <td style="color:black;font-size: 1.3em">{{$AnnualVoidreservationsCount->TotalReservation}}</td>
                                  </tr>
                                  @else
                                  <tr>
                                  <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
                                  <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                                  <td></td>
                                  <td>0</td>
                                  </tr>
                                  @endif
                                </tbody>
                              </table>
                            </div>

                          </div>
                      </div>

                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div><h2 class="sub-header">Quarterly Void Reservations<div style = "float:right;font-size:14px;"></div>
                       <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print/quarterly/void" target="_blank">Print</a></button>
                      <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#QuarterlyVoidReservations"></button>

                       <div class="collapse out" id ="QuarterlyVoidReservations">
                    <table class="table table-striped">
                                <thead>
                                  <tr>
                            <th>Quarter</th>
                            <th>Year</th>
                            <th>Total Reservations</th>
                                  </tr>
                                </thead>
                                <tbody>


                                  @if($FirstQuarterVoidReservationsCount->TotalReservation != NULL)
                                  <tr>
                                  <td>First Quarter</td>
                                  <td>{{now()->year}}</td>
                                  <td>{{$FirstQuarterVoidReservationsCount->TotalReservation}}</td>
                                  </tr>
                                  @else
                                  <tr>
                                  <td>First Quarter</td>
                                  <td>{{now()->year}}</td>
                                  <td>0</td>
                                  </tr>
                                  @endif

                                  @if($SecondQuarterVoidReservationsCount->TotalReservation != NULL)
                                  <tr>
                                  <td>Second Quarter</td>
                                  <td>{{now()->year}}</td>
                                  <td>{{$SecondQuarterVoidReservationsCount->TotalReservation}}</td>
                                  </tr>
                                  @else
                                  <tr>
                                  <td>Second Quarter</td>
                                  <td>{{now()->year}}</td>
                                  <td>0</td>
                                  </tr>
                                  @endif

                                  @if($ThirdQuarterVoidReservationsCount->TotalReservation != NULL)
                                  <tr>
                                  <td>Third Quarter Quarter</td>
                                  <td>{{now()->year}}</td>
                                  <td>{{$ThirdQuarterVoidReservationsCount->TotalReservation}}</td>
                                  </tr>
                                  @else
                                  <tr>
                                  <td>Third Quarter </td>
                                  <td>{{now()->year}}</td>
                                  <td>0</td>
                                  </tr>
                                  @endif

                                  @if($FourthQuarterVoidReservationsCount->TotalReservation != NULL)
                                  <tr>
                                  <td>Fourth Quarter</td>
                                  <td>{{now()->year}}</td>
                                  <td>{{$FourthQuarterVoidReservationsCount->TotalReservation}}</td>
                                  </tr>
                                  @else
                                  <tr>
                                  <td>Fourth Quarter</td>
                                  <td>{{now()->year}}</td>
                                  <td>0</td>
                                  </tr>
                                  @endif

                                  @if($AnnualVoidreservationsCount->TotalReservation != NULL)
                                  <tr>
                                  <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
                                  <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                                  <td style="color:black;font-size: 1.3em">{{$AnnualVoidreservationsCount->TotalReservation}}</td>
                                  </tr>
                                  @else
                                  <tr>
                                  <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
                                  <td style="color:black;font-size: 1.3em">{{now()->year}}</td>
                                  <td>0</td>
                                  </tr>
                                  @endif
                                </tbody>
                              </table>
                            </div>


                          </div>
                                                     <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print" target="_blank">Print All</a></button>
                              <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>
                      </div>




</div>






<script type="text/javascript">

$(".btn[data-target='#MonthlyReservations']").text('Expand');
$(".btn[data-target='#MonthlyReservations']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyReservations']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});


$(".btn[data-target='#MonthlyVoidReservations']").text('Expand');
$(".btn[data-target='#MonthlyVoidReservations']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyVoidReservations']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#MonthlyReservationsPerBazaar']").text('Expand');
$(".btn[data-target='#MonthlyReservationsPerBazaar']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyReservationsPerBazaar']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});


$(".btn[data-target='#MonthlyVoidReservationsPerBazaar']").text('Expand');
$(".btn[data-target='#MonthlyVoidReservationsPerBazaar']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyVoidReservationsPerBazaar']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#MonthlyBazaarCount']").text('Expand');
$(".btn[data-target='#MonthlyBazaarCount']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyBazaarCount']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#SemiAnnualReservation']").text('Expand');
$(".btn[data-target='#SemiAnnualReservation']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#SemiAnnualReservation']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#QuarterlyReservations']").text('Expand');
$(".btn[data-target='#QuarterlyReservations']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#QuarterlyReservations']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});


$(".btn[data-target='#SemiAnnualVoidReservation']").text('Expand');
$(".btn[data-target='#SemiAnnualVoidReservation']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#SemiAnnualVoidReservation']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#QuarterlyVoidReservations']").text('Expand');
$(".btn[data-target='#QuarterlyVoidReservations']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#QuarterlyVoidReservations']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});



</script>

@endsection
