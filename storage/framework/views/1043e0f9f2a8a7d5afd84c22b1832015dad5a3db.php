<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



          <h2 class="sub-header">Reservations

					<div style = "float:right;font-size:14px;">

      <button style = "background-color:#337ab7;" type="button" class="btn btn-primary"><a href = "/brand/bazaars" >Reserve Stall/s</a></button>
					<!-- <input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button> -->
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
            <table class="table table-striped" id="BrandReservationsTable">
              <thead>
                <tr>
					             <th>Reservation ID</th>
					             <th>Reservation Datetime</th>
					             <th>Reservation Cost</th>
                       <th>Reservation Amount to be Paid</th>
                       <th></th>

                </tr>
              </thead>
              <tbody>

                <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="brandreservation<?php echo e($reservation->PK_ReservationID); ?>">
                  <td><?php echo e($reservation->PK_ReservationID); ?></td>
                  <td><?php echo e($reservation->Reservation_DateTime); ?></td>
                  <td><?php echo e($reservation->Billing_SubTotal); ?></td>
                  <td><?php echo e($reservation->Billing_AmountToBePaid); ?></td>
                  <?php if($reservation->Billing_AmountToBePaid==0): ?>
                  <td><button style = "background-color:Green;" type="button" class="btn btn-primary" id="btnUploadPayment" data-billid = "<?php echo e($reservation->PK_BillingID); ?>" disabled>Upload Payment</button></td>
                  <?php else: ?>
                  <td><button style = "background-color:Green;" type="button" class="btn btn-primary" id="btnUploadPayment" data-billid = "<?php echo e($reservation->PK_BillingID); ?>">Upload Payment</button></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
        <div class = "modal-header" style = "background-color:#ffffa8">
          <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                <h4 class ="modal-title">BAZAAR REGISTRATION</h4>
              </div>
              <div class="modal-body">



                  <?php echo Form::open(array('url' => '/brand/payments','files'=>'true','method'=>'POST')); ?>

                  <div class="form-group">
                    <label> Payment BillID: </label>
                    <?php echo e(Form::number('BillID',null,array('id'=>'billid','required'=>'required', 'readonly' =>'readonly'))); ?>

                  </div>
                  <div class="form-group">
                    <label> Payment Reference Number: </label>
                    <?php echo e(Form::text('AccountNumber',null, array('required'=>'required', 'id'=>'AccountNumber'))); ?>

                  </div>
                  <div class="form-group">
                    <label> Payment Amount: </label>
                    <?php echo e(Form::number('PaymentAmount',null,array('id'=>'billid','required'=>'required', 'min' => 1))); ?>

                  </div>
                  <div class = "form-group">
                    <label> Upload Deposit Slip: </label>
                    <?php echo e(Form::file('DepositSlip')); ?>

                  </div>
                  <div class = "form-group">
                    <?php echo e(Form::submit('SubmitAdd')); ?>

                  </div>
          <?php echo Form::close(); ?>

              </div>

              <div class = "modal-footer">

                <button type = "button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
              </div>
            </div>
      </div>
    </div>

    <script type= "text/javascript">


    $(document).ready(function()
    {

      var table = $('#BrandReservationsTable').DataTable({
        "order": [[ 0, "desc" ]]
    });

      $(document).on('click', '#btnUploadPayment', function(){
        $('#billid').val($(this).data('billid'));
        $('#ModalUploadPayment').modal('show');
      });


    });
  </script>

<?php if($SucessAlert=='Payment has been received and awaiting confirmation'): ?>
    <script type= "text/javascript">
            toastr.success('Payment has been received and awaiting confirmation','Success Alert', {timeOut: 5000});
    </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>