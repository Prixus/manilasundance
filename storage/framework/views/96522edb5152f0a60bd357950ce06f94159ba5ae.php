<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 

          <h2 class="sub-header">Collection<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					</div>
					</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Payment ID</th>
                  <th>Bill ID</th>
                  <th>Payment Deadline</th>
                  <th>Payment DateTime</th>
                  <th>Payment Amount</th>
                  <th>Payment Account Number</th>
                  <th>Payment Status</th>                                    
                </tr>
              </thead>
              <tbody>

                <?php echo e(csrf_field()); ?>

              <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="Payment<?php echo e($payment->PK_PaymentID); ?>">
                  <td><?php echo e($payment->PK_PaymentID); ?></td>
                  <td><?php echo e($payment->FK_BillingID); ?></td>
                  <td><?php echo e($payment->Payment_Deadline); ?></td>
                  <td><?php echo e($payment->Payment_DateTime); ?></td>                                  
                  <td><?php echo e($payment->Payment_Amount); ?></td>
                  <td><?php echo e($payment->Payment_AccountNumber); ?></td>
                  <td><?php echo e($payment->Payment_Status); ?></td>
				          
				  <td><button style = 'background-color:#337ab7;float:right;' type="button" class="btn btn-primary" aria-pressed="false" data-id='<?php echo e($payment->PK_PaymentID); ?>' data-billid="<?php echo e($payment->FK_BillingID); ?>" data-deadline="<?php echo e($payment->PK_Deadline); ?>" data-datetime="<?php echo e($payment->Payment_DateTime); ?>" data-amount = "<?php echo e($payment->Payment_Amount); ?>" data-account = "<?php echo e($payment->Payment_AccountNumber); ?>" data-status = "<?php echo e($payment->Payment_Status); ?>" data-image="<?php echo e($payment->Payment_ImagePath); ?>" id='btnConfirmPayment'>Confirm Payment</button></td>
            <td>
				  <button style = "background-color:green;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/admin/bill">Show Bill</button></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	
	
	 <!-- This is the Modal that will be called for add column -->
      <div class = "modal fade" id = "modalConfirmPayment" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Paymnent Information </h4>
                  </div>

                  <div class="modal-body">
                    <form>
                      <div>
                      <img id='DepositImage' src='' width="500" height="320">
                      </div>
                      <div class = "form-group" >
                        <label> Payment ID: </label>
                        <input type='number' id="PaymentID" disabled>
                      </div>
                      <div class = "form-group" >
                        <label> Bill ID: </label>
                        <input type='number' id="BillingID" disabled>
                      </div>
                      <div class = "form-group" >
                        <label> Payment date: </label>
                        <input type='datetime' id="PaymentDate" required>
                      </div>
                      <div class = "form-group">
                        <label> Payment deadline: </label>
                      </div>
                      <div class = "form-group">
                        <label> Payment Amount: </label>
                        <input type='number' id="PaymentAmount" required>
                      </div>
                      

                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type ="button" class = "btn btn-default" id="submitConfirm" data-dismiss = "modal"> Confirm </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>


<script type="text/javascript">

           $(document).on('click', '#btnConfirmPayment', function(){
            $('#PaymentID').val($(this).data('id'));
            $('#BillingID').val($(this).data('billid'));            
            $('#PaymentDate').val($(this).data('datetime'));
            $('#PaymentAmount').val($(this).data('amount'));
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
              'PaymentAmount' : $('#PaymentAmount').val()

            },
            success: function(response){
              toastr.success('Successfully Confirmed Payment','Success Alert', {timeOut:5000});
              $('#Payment' + response.PK_PaymentID).remove();

            }
        });

  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>