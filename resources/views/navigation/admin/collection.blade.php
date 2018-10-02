@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header" style="color:#3ce1e0;">Collection
          <!-- <div style = "float:right;font-size:14px;color:white;">
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button>
          </div> -->
          </h2>

<!-- Start Dessa 2018-0829 -->

          <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> August</h3>
              <p>Month</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
          </div>
        </div>

          <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 title="253000.00">253000.00</h3>
              <p>Forecasted Revenue for this month</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
          <br>
        </div>

        <hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">

<!-- End Dessa 2018-0829 -->


          <h2 class="sub-header" style = "color:#f79391;">Payments For Approval
              <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#newpayments">
          </h2>


      <div id="newpayments" class="collapse in">

          <div class="table-responsive">
            <table class="table table-striped classnewpayments" id="newpayments">
              <thead>
                <tr>
                  <th>Payment ID</th>
                  <th>Bill ID</th>
                  <!-- <th>Payment Deadline</th> -->
                  <th>Payment DateTime</th>
                  <th>Payment Amount</th>
                  <th>Payment Reference Number</th>
                  <th>Payment Status</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                {{csrf_field()}}
              @foreach($payments as $payment)
                <tr id="Payment{{$payment->PK_PaymentID}}">
                  <td>{{$payment->PK_PaymentID}}</td>
                  <td>{{$payment->FK_BillingID}}</td>
                  <!-- <td>{{$payment->Payment_Deadline}}</td> -->
                  <td>{{$payment->Payment_DateTime}}</td>
                  <td>{{$payment->Payment_Amount}}</td>
                  <td>{{$payment->Payment_AccountNumber}}</td>
                  <td>{{$payment->Payment_Status}}</td>

				  <td><button style = 'background-color:#337ab7;float:right;' type="button" class="btn btn-primary" aria-pressed="false" data-id='{{$payment->PK_PaymentID}}' data-billid="{{$payment->FK_BillingID}}" data-deadline="{{$payment->PK_Deadline}}" data-datetime="{{$payment->Payment_DateTime}}" data-amount = "{{$payment->Payment_Amount}}" data-account = "{{$payment->Payment_AccountNumber}}" data-status = "{{$payment->Payment_Status}}" data-image="{{$payment->Payment_ImagePath}}" id='btnConfirmPayment'>Confirm Payment</button></td>
            <td>
				  <button style = "background-color:green;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/admin/bill/{{$payment->FK_BillingID}}">Show Bill</button></td>
                </tr>
                @endforeach

                </tbody>
            </table>
          </div>

              <br><br>
        </div>


        <hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">

          <h2 class="sub-header" style = "color:#f79391;">Approved Payments
              <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#approved">
          </h2>


      <div id="approved" class="collapse in">

          <div class="table-responsive">
            <table class="table table-striped classapproved" id="approved">
              <thead>
                <tr>
                  <th>Payment ID</th>
                  <th>Bill ID</th>
                  <!-- <th>Payment Deadline</th> -->
                  <th>Payment DateTime</th>
                  <th>Payment Amount</th>
                  <th>Payment Reference Number</th>
                  <th>Payment Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                {{csrf_field()}}
              @foreach($approvedPayments as $approvedPayment)
                <tr id="Payment{{$approvedPayment->PK_PaymentID}}">
                  <td>{{$approvedPayment->PK_PaymentID}}</td>
                  <td>{{$approvedPayment->FK_BillingID}}</td>
                  <!-- <td>{{$approvedPayment->Payment_Deadline}}</td> -->
                  <td>{{$approvedPayment->Payment_DateTime}}</td>
                  <td>{{$approvedPayment->Payment_Amount}}</td>
                  <td>{{$approvedPayment->Payment_AccountNumber}}</td>
                  <td>{{$approvedPayment->Payment_Status}}</td>

          <td>
          <button style = "background-color:green;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/admin/bill/{{$approvedPayment->FK_BillingID}}">Show Bill</button></td>
                </tr>
                @endforeach

                </tbody>
            </table>
          </div>

              <br><br>
        </div>


        </div>
      </div>
    </div>


	 <!-- This is the Modal that will be called for add column -->
      <div class = "modal fade" id = "modalConfirmPayment" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header" style = "background-color:#ffffa8">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> PAYMENT INFORMATION </h4>
                  </div>

                  <div class="modal-body">
                    <form>
                      <div>
                      <img id='DepositImage' src='' width="500" height="320">
                      </div>
                      <div class = "form-group" >
                        <label> PAYMENT ID: </label>
                        <input type='number' class="form-control" id="PaymentID" disabled>
                      </div>
                      <div class = "form-group" >
                        <label> BILL ID: </label>
                        <input type='number' class="form-control" id="BillingID" disabled>
                      </div>
                      <div class = "form-group" >
                        <label> PAYMENT DATE: </label>
                        <input type='datetime' class="form-control" id="PaymentDate" required>
                      </div>
                      <div class = "form-group">
                        <label> PAYMENT REFERENCE NUMBER: </label>
                        <input type='text' class="form-control" id="PaymentReferenceNumber" disabled>
                      </div>
                      <div class = "form-group">
                        <label> PAYMENT AMOUNT: </label>
                        <input type='number' class="form-control" id="PaymentAmount" required>
                      </div>


                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type ="button" class = "btn btn-success" id="submitConfirm" data-dismiss = "modal"> CONFIRM </button>
                    <button type ="button" class = "btn btn-danger" id="submitReject" data-dismiss = "modal"> REJECT </button>
                  </div>
                </div>
          </div>
        </div>


<script type="text/javascript">

// $('.classnewpayments').DataTable({
//         "order": [[ 0, "desc" ]]
//     });

var table = $('.classapproved').DataTable({
        "order": [[ 0, "desc" ]]
    });

           $(document).on('click', '#btnConfirmPayment', function(){
            $('#PaymentID').val($(this).data('id'));
            $('#BillingID').val($(this).data('billid'));
            $('#PaymentDate').val($(this).data('datetime'));
            $('#PaymentAmount').val($(this).data('amount'));
            $('#PaymentReferenceNumber').val($(this).data('account'));
            $('#DepositImage').attr('src','/'+$(this).data('image'));
            id = $(this).data('id');
            $('#modalConfirmPayment').modal('show');
            });


        $(document).on('click','#submitConfirm',function(){

          $.ajax({
            type: 'PUT',
            url: '/brand/payments/' + id,
            data: {
              '_token':$('input[name=_token]').val(),
              'PaymentAmount' : $('#PaymentAmount').val(),
              'BillingID' : $('#BillingID').val(),
              'ReferenceNumber': $('#PaymentReferenceNumber').val()

            },
            success: function(response){
              if(response == "A bank deposit with a same transaction number has already been approved."){
                toastr.warning('A bank deposit with a same transaction number has already been approved.','Success Alert', {timeOut:5000});
              }
              else{
                toastr.success('Successfully Confirmed Payment','Success Alert', {timeOut:5000});
                $('#Payment' + response.PK_PaymentID).remove();
                table.row.add($('<tr id="Payment' + response.PK_PaymentID + '"><td>' + response.PK_PaymentID + '</td><td>' + response.FK_BillingID + '</td><td>' + response.Payment_DateTime + '</td><td>' + response.Payment_Amount + '</td><td>' + response.Payment_AccountNumber + '</td><td>' + response.Payment_Status + '</td><td>' + '<button style = "background-color:green;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/admin/bill/' + response.FK_BillingID + '">Show Bill</button></td></tr>'
              )).draw(false);
              }


            }
        });

  });

  $(document).on('click','#submitReject',function(){

    $.ajax({
      type: 'PUT',
      url: '/brand/payments/reject/' + id,
      data: {
        '_token':$('input[name=_token]').val(),
        'PaymentAmount' : $('#PaymentAmount').val(),
        'BillingID' : $('#BillingID').val()

      },
      success: function(response){
        toastr.error('Successfully rejected Payment','Success Alert', {timeOut:5000});
        $('#Payment' + response.PK_PaymentID).remove();
      }
  });

});


      // start collapse_expand dessa 2018-0909

        $(".btn[data-target='#newpayments']").text('Collapse');
      $(".btn[data-target='#newpayments']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#newpayments']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#approved']").text('Collapse');
  $(".btn[data-target='#approved']").click(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });
  $(".btn[data-target='#approved']").dblclick(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });


      // end collapse_expand dessa 2018-0909

</script>

@endsection
