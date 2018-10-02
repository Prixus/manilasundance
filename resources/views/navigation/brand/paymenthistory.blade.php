@extends('layouts.app')

@section('content')


<div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



          <h2 class="sub-header">Payment History
             <!-- <button style = "background-color:#337ab7;" type="button" class="btn btn-primary" id="BtnAdd">Add Product</button> -->
         </h2>


          <div id = "searchRecord" class="table-responsive">

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
          </div>



        </div>
      </div>
    </div>

<script type="text/javascript">
     var table = $('#PaymentHistory').DataTable({
        "order": [[ 0, "asc" ]]
    });
</script>
@endsection
