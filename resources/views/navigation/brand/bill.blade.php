@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Manila Sundance</h2>
      <h4>Fashion Events</h4>

      <br>
        <h5>Address:    <label>Cityland Tower 1, Mandaluyong City</label></h5>
        <h5>Tin Number    <label>894563286787</label></h5>
        <h5>Telephone Number   <label>252-89-91</label></h5>
        <h5>Fax:    <label>252-89-91</label></h5>
        <h5>Website:   <label>ManilaSundance.com</label></h5>
      <br>
      <div>
      <br>
      <br>
      <h5>Billing Party</h5>

        <h5>Tin Number:    <label>{{$ReservationAccountBrandInformations->GuestBrand_TinNumber}}</label></h5>
        <h5>Company:    <label>{{$ReservationAccountBrandInformations->GuestBrand_Name}}</label></h5>
        <h5>Name:    <label>{{$ReservationAccountBrandInformations->GuestBrand_OwnerName}}</label></h5>
        <h5>Tel:    <label>{{$ReservationAccountBrandInformations->GuestBrand_MobileNumber}}</label></h5>
        <h5>Website:    <label>{{$ReservationAccountBrandInformations->GuestBrand_Website}}</label></h5>

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
                  <th>Subtotal Cost</th>
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
                  <td>{{$ReservedStall->Stall_RentalCost+$ReservedStall->Stall_BookingCost}}</td>
                </tr>
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style ="color:green">Balance From Previous Billing:</td>
                  @if($ReservationAccountBrandInformations->Billing_BalanceFromPreviousBilling < 0)
                  <td>{{$ReservationAccountBrandInformations->Billing_BalanceFromPreviousBilling}}</td>
                  @else
                  <td>({{$ReservationAccountBrandInformations->Billing_BalanceFromPreviousBilling}})</td>
                  @endif
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style ="color:green">Amount Paid:</td>
                  @if($ReservationAccountBrandInformations->Billing_AmountPaid <= 0)
                  <td>{{$ReservationAccountBrandInformations->Billing_AmountPaid}}</td>
                  @else
                  <td>({{$ReservationAccountBrandInformations->Billing_AmountPaid}})</td>
                  @endif

                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style ="color:red">Total Cost:</td>
                  <td style="font-size: 1.3em; font-style: bold; color: black">{{$ReservationAccountBrandInformations->Billing_AmountToBePaid}}</td>
                </tr>
              </tbody>
            </table>
          </div>



        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Payment ID</th>
                  <th>Payment Type</th>
                  <th>Payment Amount</th>
                  <th>Payment Date</th>
                  <th>Payment Reference Number</th>
                </tr>
              </thead>
              <tbody>
                @foreach($billing->paymentsMade as $Payments)
                @if($Payments->Payment_Status == "Approved")
                <tr>
                  <td>{{$Payments->PK_PaymentID}}</td>
                  <td>{{$Payments->Payment_Mode}}</td>
                  <td>{{$Payments->Payment_Amount}}</td>
                  <td>{{$Payments->created_at}}</td>
                  <td>{{$Payments->Payment_AccountNumber}}</td>
                </tr>
                @endif
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style ="color:green">Amount Paid:</td>
                  @if($ReservationAccountBrandInformations->Billing_AmountPaid <= 0)
                  <td>{{$ReservationAccountBrandInformations->Billing_AmountPaid}}</td>
                  @else
                  <td>({{$ReservationAccountBrandInformations->Billing_AmountPaid}})</td>
                  @endif
                </tr>

              </tbody>
            </table>
          </div>
      <br><br>
      <label>Thank you for staying with us!</label>
      <br><br>
      <div>
      @if($ReservationAccountBrandInformations->Billing_Status != "Void")
      <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/brand/seepdf/{{$ReservationAccountBrandInformations->PK_ReservationID}}" >Print</a></button>
      @endif
      <button style = "background-color:green;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/brand/billing" >Finished</a></button>
      </div>
        </div>

    </div>
</div>


@endsection
