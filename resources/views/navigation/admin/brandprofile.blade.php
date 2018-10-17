@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



  <h2 class="sub-header" style="margin-top:0px;color:#f79791">{{$AccountInformation->GuestBrand_Name}}</h2>
    <h4>Brand Name</h4>
  <br>
      <h3 class="sub-header subsett">Account Information</h3>
      <br>

        <h5 class="perrow"><div class="lbl">Official Username:</div>    <label class="txtbox">{{$AccountInformation->Account_UserName}}</label></h5>
        <!-- <h5 class="perrow"><div class="lbl">Profile Photo:</div>    <label class="txtbox"></label></h5> -->
        <h5 class="perrow"><div class="lbl">Account Rating:</div>    <label class="txtbox">{{$AccountInformation->Account_Rating}}</label></h5>
        <h5 class="perrow"><div class="lbl">Balance:</div>    <label class="txtbox">{{$AccountInformation->Account_Balance}}</label></h5>
        <h5 class="perrow"><div class="lbl">Date Created:</div>    <label class="txtbox">{{$AccountInformation->created_at}}</label></h5>
      <br>

      <h3 class="sub-header subsett">Brand Information</h3>
      <br>

        <h5 class="perrow"><div class="lbl">Owner Name:</div>    <label class="txtbox">{{$AccountInformation->GuestBrand_OwnerName}}</label></h5>
        <h5 class="perrow"><div class="lbl">TIN Number:</div>    <label class="txtbox">{{$AccountInformation->GuestBrand_TinNumber}}</label></h5>
        <h5 class="perrow"><div class="lbl">Brand Description:</div>    <br> <label class="txtbox" style="margin-left:230px;">{{$AccountInformation->GuestBrand_Description}} </label></h5>
        <h5 class="perrow"><div class="lbl">List of Products:</div>
        <br>
          <label class="txtbox" style="margin-left:210px;">
            <ul>
              @foreach($Brand->products as $product)
                  <li>{{$product->Product_Name}}</li>
              @endforeach

            </ul>
          </label>
        </h5>
      <h3 class="sub-header subsett">Contact Information</h3>
      <br>
        <h5 class="perrow"><div class="lbl">Official Brand Website:</div>    <label class="txtbox">{{$AccountInformation->GuestBrand_Website}}</label></h5>
        <h5 class="perrow"><div class="lbl">Official Brand Mobile Number:</div>    <label class="txtbox">{{$AccountInformation->GuestBrand_MobileNumber}}</label></h5>
        <h5 class="perrow"><div class="lbl">Official Brand Email Address:</div>    <label class="txtbox">{{$AccountInformation->GuestBrand_EmailAddress}}</label></h5>
      <br><br>


        <br><br><br>

      <h3 class="sub-header subsett">Payment History</h3>
        <table class="table table-striped" id="PaymentHistory">
          <thead>
            <tr >
              <th>Bill ID</th>
              <th>Payment ID</th>
              <th>Date</th>
              <th>Total Cost</th>
              <th>Amount Paid</th>
              <th>Current Balance</th>
              <!-- <th></th>
              <th></th> -->
            </tr>
              {{ csrf_field() }}
          </thead>
          <tbody>
            @foreach($billings as $billing)
            @php
            $totalPayment =0.00;
            @endphp
            <tr id="">
              <td>{{$billing->PK_BillingID}}</td>
              <td></td>
              <td>{{$billing->created_at}}</td>
              <td>{{$billing->Billing_SubTotal}}</td>
              @if($billing->Billing_BalanceFromPreviousBilling != 0)
              <td>{{$billing->Billing_BalanceFromPreviousBilling*-1}}</td>
              @else
              <td>0.00</td>
              @endif
            @php
            $totalPayment += $billing->Billing_BalanceFromPreviousBilling*-1;
            @endphp
              <td>{{$billing->Billing_SubTotal + $billing->Billing_BalanceFromPreviousBilling}}</td>
                @foreach($billing->paymentsMade as $payment)
                @if($payment->Payment_Status == "Approved")
                @php
                  $totalPayment += $payment->Payment_Amount;
                @endphp
                <tr>
                <td>{{$billing->PK_BillingID}}</td>
                <td>{{$payment->PK_PaymentID}}</td>
                <td>{{$payment->updated_at}}</td>
                <td>0.00</td>
                <td>{{$payment->Payment_Amount}}</td>
                <td>{{$billing->Billing_SubTotal - $totalPayment}}</td>
                </tr>
                @endif
                @endforeach
              <!-- <td style = "float:right;">
                <button id = "EditButton"  style = "background-color:green;float:left;"  class="btn btn-primary">Edit</button>
              </td>
              <td>
                <button id = "DeleteButton" style = "background-color:red;float:right;"  class="btn btn-primary">Delete</button>
              </td> -->
            </tr>
            @endforeach
          </tbody>
        </table>




                  <button style = "background-color:red;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a style = "color:#fff;" href="/admin/accounts">Back</a></button>
</div>
</div>
</div>

<script type="text/javascript">
     var table = $('#PaymentHistory').DataTable({
        "order": [[ 0, "asc" ]]
    });
</script>

@endsection
