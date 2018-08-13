@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Manila Sundance</h2>
      <h4>Fashion Events</h4>

      <br>
        <h5>Address:    <label>________________________</label></h5>
        <h5>Tin Number    <label>________________________</label></h5>
        <h5>Telephone Number    <label>________________________</label></h5>
        <h5>Fax:    <label>________________________</label></h5>
        <h5>Website:    <label>________________________</label></h5>
      <br>
      <div>
      <br>
      <br>
      <h5>Billing Party</h5>
        @foreach($ReservationAccountBrandInformations as $ReservationAccountBrandInformation)
        <h5>Tin Number:    <label>{{$ReservationAccountBrandInformation->GuestBrand_TinNumber}}</label></h5>
        <h5>Company:    <label>{{$ReservationAccountBrandInformation->GuestBrand_Name}}</label></h5>
        <h5>Name:    <label>{{$ReservationAccountBrandInformation->GuestBrand_OwnerName}}</label></h5>
        <h5>Tel:    <label>{{$ReservationAccountBrandInformation->GuestBrand_MobileNumber}}</label></h5>
        <h5>Website:    <label>{{$ReservationAccountBrandInformation->GuestBrand_Website}}</label></h5>
        @endforeach
      <br>
      </div>

        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Stall ID</th>
                  <th>Stall Type</th>
                  <th>Stall Size</th>
                  <th>Stall Booking Cost</th>
                  <th>Stall Rental Cost</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ReservedStalls as $ReservedStall)
                <tr>
                  <td>{{$ReservedStall->PK_StallID}}</td>
                  <td>{{$ReservedStall->Stall_Type}}</td>
                  <td>{{$ReservedStall->Stall_Size}}</td>
                  <td>{{$ReservedStall->Stall_BookingCost}}</td>
                  <td>{{$ReservedStall->Stall_RentalCost}}</td>
                </tr>
                @endforeach
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total Cost:</td>
                  <td>{{$TotalCost}}</td>
              </tbody>
            </table>
          </div>
      <br><br>
      <label>Thank you for staying with us!</label>
      <br><br>
      <div>
      <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/brand/pdf" >Print</a></button>
      <button style = "background-color:green;float:right;" type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false"><a href = "/brand/pdf" >Print</a></button>
      </div>
        </div>

    </div>
</div>


@endsection
