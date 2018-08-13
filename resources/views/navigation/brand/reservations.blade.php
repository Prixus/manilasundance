@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



          <h2 class="sub-header">Reservations

					<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					<!-- <label>View:</label>
							<select>
								<option>All</option>
								<option>Approved</option>
								<option>Processing</option>
								<option>Dismissed</option>
							</select>

					<button class = "btnSearch">GO</button>

					<label>Sort By:</label>
							<select>
								<option>Date</option>
								<option>Reservation ID</option>
								<option>Cost</option>
							</select>

					<button class = "btnSearch">GO</button>
                    -->
					</div>

					</h2>

			<div id = "searchRecord" class="table-responsive">

		  <button style = "background-color:#337ab7;" type="button" class="btn btn-primary"><a href = "/brand/bazaars" >Reserve Stall/s</a></button>
            <table class="table table-striped">
              <thead>
                <tr>
					             <th>Reservation ID</th>
					             <th>Reservation Datetime</th>
					             <th>Reservation Cost</th>

                </tr>
              </thead>
              <tbody>
                @foreach($reservations as $reservation)
                <tr>
                  <td>{{$reservation->PK_ReservationID}}</td>
                  <td>{{$reservation->Reservation_DateTime}}</td>
                  <td>{{$reservation->Billing_SubTotal}}</td>
                  <td><button style = "background-color:Green;" type="button" class="btn btn-primary" id="btnUploadPayment" data-billid = "{{$reservation->PK_BillingID}}">Upload Payment</button></td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>

    </div>
</div>

<!-- This is the Modal that will be called for add column -->
  <div class = "modal fade" id = "ModalUploadPayment" role = "dialog">
    <div class = "modal-dialog">

      <div class="modal-content">
        <div class = "modal-header">
          <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                <h4 class ="modal-title">Bazaar Registration</h4>
              </div>
              <div class="modal-body">



                  {!! Form::open(array('url' => '/brand/payments','files'=>'true','method'=>'POST')) !!}
                  <div class="form-group">
                    <label> Payment BillID: </label>
                    {{Form::number('BillID',null,array('id'=>'billid','required'=>'required'))}}
                  </div>
                  <div class="form-group">
                    <label> Payment Account Number: </label>
                    {{Form::text('AccountNumber')}}
                  </div>
                  <div class="form-group">
                    <label> Payment Amount: </label>
                    {{Form::number('PaymentAmount')}}
                  </div>
                  <div class = "form-group">
                    <label> Upload Deposit Slip: </label>
                    {{Form::file('DepositSlip')}}
                  </div>
                  <div class = "form-group">
                    {{Form::submit('SubmitAdd')}}
                  </div>
          {!! Form::close() !!}
              </div>

              <div class = "modal-footer">

                <button type = "button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
              </div>
            </div>
      </div>
    </div>



<script type= "text/javascript">


      $(document).ready(function()
      {
            $(document).on('click', '#btnUploadPayment', function(){
            $('#billid').val($(this).data('billid'));
            $('#ModalUploadPayment').modal('show');
            });
     });
</script>


@endsection
