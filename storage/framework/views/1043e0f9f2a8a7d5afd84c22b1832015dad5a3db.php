<?php $__env->startSection('content'); ?>

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
                <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($reservation->PK_ReservationID); ?></td>
                  <td><?php echo e($reservation->Reservation_DateTime); ?></td>
                  <td><?php echo e($reservation->Billing_SubTotal); ?></td>
                  <td><button style = "background-color:Green;" type="button" class="btn btn-primary" id="btnUploadPayment" data-billid = "<?php echo e($reservation->PK_BillingID); ?>">Upload Payment</button></td>
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
        <div class = "modal-header">
          <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                <h4 class ="modal-title">Bazaar Registration</h4>
              </div>
              <div class="modal-body">



                  <?php echo Form::open(array('url' => '/brand/payments','files'=>'true','method'=>'POST')); ?>

                  <div class="form-group">
                    <label> Payment BillID: </label>
                    <?php echo e(Form::number('BillID',null,array('id'=>'billid','required'=>'required'))); ?>

                  </div>
                  <div class="form-group">
                    <label> Payment Account Number: </label>
                    <?php echo e(Form::text('AccountNumber')); ?>

                  </div>
                  <div class="form-group">
                    <label> Payment Amount: </label>
                    <?php echo e(Form::number('PaymentAmount')); ?>

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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>