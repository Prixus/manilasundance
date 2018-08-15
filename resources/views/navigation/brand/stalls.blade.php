@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<h2 class="sub-header">Reserve Stalls</h2>
<br><br>
<div class="sub-header" style="background-color:teal;padding:1px;"></div>
<h4 style="margin-left:50px;color:teal;">Legend:</h4>
<button class="btnlegend" style="border: 2px solid #0077FF;margin-left:65px">Corner Stall</button>
<button class="btnlegend" style="border: 2px solid #4CAF50;">Regular Stall</button>
<button class="btnlegend" style="border: 2px solid #9A00FF;">Prime Stall</button>
<button class="btnlegend" style="border: 2px solid #FFA500;">Food Stall</button>
<button class="btnlegend" style="background-color:#f79391;">Permanently Reserved</button>
<button class="btnlegend" style="background-color:#f3f35f;">Temporarily Reserved</button>
<button class="btnlegend sub-header">Vacant</button>
<br><br><br><br>
<div class="sub-header" style="background-color:teal;padding:1px;"></div>
<h4 style="margin-left:50px;color:teal;">Stall Map:</h4>
<br>
{{ csrf_field() }}
<center>
@php $ctr=0 @endphp
@for($i=0;$i<=4;$i++)
@if($i==0)
<div style=float:left;>
    <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" style="margin-right:70px;margin-left:65px" id="ReserveButton"  data-id= "{{$stalls[$ctr]->PK_StallID}}" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-0000{{$stalls[$ctr]->PK_StallID}}</button>
@php $ctr++ @endphp
    @for($x=0;$x<=2;$x++)
      <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-id= "{{$stalls[$ctr]->PK_StallID}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-0000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
      <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-right:70px;" data-type=   "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-0000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
    @endfor
    <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}"  data-id= "{{$stalls[$ctr]->PK_StallID}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-0000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
</div>
@elseif($i==1)
<div style=float:left;>
    <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" style="margin-right:70px;margin-left:65px" id="ReserveButton"  data-id= "{{$stalls[$ctr]->PK_StallID}}"  data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-0000{{$stalls[$ctr]->PK_StallID}}</button>
@php $ctr++ @endphp
    @for($x=0;$x<=2;$x++)
      <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-id= "{{$stalls[$ctr]->PK_StallID}}"  data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
      <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-right:70px;" data-type=  "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
    @endfor
    <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-id= "{{$stalls[$ctr]->PK_StallID}}" data-type= "{{$stalls[$ctr]->Stall_Type}}"  data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
</div>
@else
<div style=float:left;>
    <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-right:70px;margin-left:65px" data-type= "{{$stalls[0]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-000{{$stalls[$ctr]->PK_StallID}}</button>
@php $ctr++ @endphp
    @for($x=0;$x<=2;$x++)
      <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-id= "{{$stalls[$ctr]->PK_StallID}}" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
      <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-right:70px;" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
    @endfor
    <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}}" id="ReserveButton" data-id= "{{$stalls[$ctr]->PK_StallID}}" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-000{{$stalls[$ctr]->PK_StallID}}</button>
      @php $ctr++ @endphp
</div>
@endif
@endfor

<div style=float:left;margin-bottom:60px;>
<button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}} bottomlane" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-left:65px;margin-top:50px" id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-00{{$stalls[$ctr]->PK_StallID}}</button>
@php $ctr++ @endphp

  <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}} bottomlane" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-top:50px" id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-00{{$stalls[$ctr]->PK_StallID}}</button>
  @php $ctr++ @endphp

<button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}} bottomlane" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-right:60px;margin-top:50px" id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-00{{$stalls[$ctr]->PK_StallID}}</button>
@php $ctr++ @endphp

@for($x=0;$x<=2;$x++)
  <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}} bottomlane" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-top:50px"  id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-1001</button>
      @php $ctr++ @endphp
@endfor

<button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}} bottomlane" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-right:60px;margin-top:50px"  id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-1001</button>
        @php $ctr++ @endphp
@for($x=0;$x<=2;$x++)
    <button class="button button{{$stalls[$ctr]->Stall_Type}} {{$stalls[$ctr]->Stall_Status}} bottomlane" data-id= "{{$stalls[$ctr]->PK_StallID}}" style="margin-top:50px" id="ReserveButton" data-type= "{{$stalls[$ctr]->Stall_Type}}" data-size= "{{$stalls[$ctr]->Stall_Size}}" data-status = "{{$stalls[$ctr]->Stall_Status}}" data-rentalcost = "{{$stalls[$ctr]->Stall_RentalCost}}" data-bookingcost = "{{$stalls[$ctr]->Stall_BookingCost}}">prm-00{{$stalls[$ctr]->PK_StallID}}</button>
        @php $ctr++ @endphp
@endfor
</div>

</center>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="sub-header" style="background-color:teal;padding:1px;"></div>
<br>
<br><br>



            <br><br>

            <br><br>            <br><br>

            <h2 class="sub-header">Your Reserved Stalls</h2>

                    <table class="table table-striped" id="ReservedStallTable">
                          <thead>
                            <tr>
                              <th>Stall ID</th>
                              <th>Stall Rental Cost</th>
                              <th>Stall Booking Cost</th>
                              <th>Stall Type</th>
                              <th>Stall Status</th>
                            </tr>
                            {{ csrf_field() }}
                          </thead>

                          <tbody>
                          @foreach($ReservedStalls as $ReservedStall)
                            <tr id="ReservedStall{{$ReservedStall->PK_StallID}}">
                              <td>{{$ReservedStall->PK_StallID}}</td>
                              <td>{{$ReservedStall->Stall_RentalCost}}</td>
                              <td>{{$ReservedStall->Stall_BookingCost}}</td>
                              <td>{{$ReservedStall->Stall_Type}}</td>
                              <td>{{$ReservedStall->Stall_Status}}</td>
                            </tr>
                        @endforeach
                          </tbody>
                        </table>
</div>
</div>
</div>

              <button id = "BtnDelete" style = "background-color:#337ab7;margin-left:5px;" type="button" class="btn btn-primary"><a href = "/brand/stalls/viewbill">View Bill</a></button>
            <!-- This is the Modal that will be called to show the reservation info -->
              <div class = "modal fade" id = "ModalReserve" role = "dialog">
                <div class = "modal-dialog">

                  <div class="modal-content">
                    <div class = "modal-header">
                      <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                            <h4 class ="modal-title"> Reservation</h4>
                          </div>
                          <div class="modal-body">
                              <form  style="text-align:center">
                              <div class = "form-group">
                                <label> Stall ID: </label>
                                <input type="text" name ="txtProductName"  id="ReserveStallID" disabled>
                              </div>
                              <div class = "form-group">
                                <label> Stall Rental Cost</label>
                                <input type="number" name ="txtStallRent" id="ReserveRent" disabled>
                              </div>

                              <div class="form-group">
                                <label> Stall Booking Cost </label>
                                <input type="text" name="txtStallBooking" id="ReserveBooking" disabled>
                              </div>
                              <div class = "form-group">
                                <label> Stall Type <label>
                                <input type="text" name="txtStallType" id="ReserveType" disabled>
                              </div>
                              <div class ="form-group">
                                <label> Stall Status <label>
                                <input type="text" name="txtStallStatus" id="ReserveStatus" disabled>
                              </div>
                          </form>
                          </div>
                          <div class = "modal-footer">
                            <button type ="button" class= "btn btn-success" data-dismiss="modal" id="Reserve">ADD </button>
                            <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                          </div>
                        </div>
                  </div>
                </div>


                <script type= "text/javascript">

                      var brandID = {{ Session::get('BrandID')}};
                      $(document).ready(function()
                      {

                            $(document).on('click', '#ReserveButton', function(){
                              id = $(this).data('id');
                              $('#ReserveStallID').val($(this).data('id'));
                              $('#ReserveRent').val($(this).data('rentalcost'));
                              $('#ReserveBooking').val($(this).data('bookingcost'));
                              $('#ReserveType').val($(this).data('type'));
                              $('#ReserveStatus').val($(this).data('status'));

                              if($(this).data('status')!="Available"){
                                $('#Reserve').prop("disabled",true);
                              }
                              else{
                                $('#Reserve').prop("disabled",false);
                              }

                            $('#ModalReserve').modal('show');
                            });

                            $('.modal-footer').on('click','#Reserve',function() {
                                          $.ajax({
                                            type: 'POST',
                                            url: '/brand/stalls',
                                            data: {
                                              '_token': $('input[name=_token]').val(),
                                              'id': $('#ReserveStallID').val(),
                                              'rent': $('#ReserveRent').val(),
                                              'booking': $('#ReserveBooking').val(),
                                              'brandID': brandID
                                            },
                                            success: function(response){
                                              toastr.success('Successfully reserve stall!','Success Alert', {timeOut: 5000});
                                              $('#ReservedStallTable').prepend("<tr id='ReservedStall"+ response.PK_StallID+"'><td>" + response.PK_StallID + "</td><td>" + response.Stall_RentalCost + "</td><td>" + response.Stall_BookingCost + "</td><td>" + response.Stall_Type + "</td><td>" + response.Stall_Status + "</td></tr>");
                                                $( "button[data-id='" + response.PK_StallID + "']" ).removeClass("Available").addClass("TemporarilyReserved");
                                                $( "button[data-id='" + response.PK_StallID + "']" ).data("status","TemporarilyReserved");
                                            }
                                          });
                            });

                      });
                </script>

@endsection
