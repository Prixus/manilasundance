@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Billing
          <!-- <div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button>
          </div> -->
          </h2>
          <div class="table-responsive">
            <table class="table table-striped" id="AdminBillingTable">
              <thead>
                <tr>
                  <th>Billing ID</th>
                  <th>Subtotal Cost</th>
                  <th>Amount Paid</th>
                  <th>Balance from previous bill</th>
                  <th>Total Amount</th>
                  <th>Datetime Generated</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($bills as $Bill)
                <tr>
                  <td>{{$Bill->PK_BillingID}}</td>
                  <td>{{$Bill->Billing_SubTotal}}</td>
                  <td>{{$Bill->Billing_AmountPaid}}</td>
                  @if($Bill->Billing_BalanceFromPreviousBilling < 0)
                  <td>({{$Bill->Billing_BalanceFromPreviousBilling * -1}})</td>
                  @else
                  <td>{{$Bill->Billing_BalanceFromPreviousBilling}}</td>
                  @endif
                  <td>{{$Bill->Billing_AmountToBePaid}}</td>
                  <td>{{$Bill->created_at}}</td>
                  <td>{{$Bill->Billing_Status}}</td>
                  <td><button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/admin/bill/{{$Bill->PK_BillingID}}" >Show Bill</a></button></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

     </div>
  </div>
</div>

<script type= "text/javascript">
    var table = $('#AdminBillingTable').DataTable({
        "order": [[ 0, "desc" ]]
    });
</script>


@endsection
