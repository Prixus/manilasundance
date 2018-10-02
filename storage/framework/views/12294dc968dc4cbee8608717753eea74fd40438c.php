<?php $__env->startSection('content'); ?>


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
                  <?php echo e(csrf_field()); ?>

              </thead>
              <tbody>
                <?php $__currentLoopData = $billings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $billing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $totalPayment =0.00;
                ?>
                <tr id="">
                  <td><?php echo e($billing->PK_BillingID); ?></td>
                  <td></td>
                  <td><?php echo e($billing->created_at); ?></td>
                  <td><?php echo e($billing->Billing_SubTotal); ?></td>
                  <?php if($billing->Billing_BalanceFromPreviousBilling != 0): ?>
                  <td><?php echo e($billing->Billing_BalanceFromPreviousBilling*-1); ?></td>                  
                  <?php else: ?>
                  <td>0.00</td>
                  <?php endif; ?>
                <?php
                $totalPayment += $billing->Billing_BalanceFromPreviousBilling*-1;
                ?>
                  <td><?php echo e($billing->Billing_SubTotal + $billing->Billing_BalanceFromPreviousBilling); ?></td>
                    <?php $__currentLoopData = $billing->paymentsMade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($payment->Payment_Status == "Approved"): ?>
                    <?php
                      $totalPayment += $payment->Payment_Amount; 
                    ?>
                    <tr>
                    <td><?php echo e($billing->PK_BillingID); ?></td>
                    <td><?php echo e($payment->PK_PaymentID); ?></td>
                    <td><?php echo e($payment->updated_at); ?></td>
                    <td>0.00</td>
                    <td><?php echo e($payment->Payment_Amount); ?></td>
                    <td><?php echo e($billing->Billing_SubTotal - $totalPayment); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <!-- <td style = "float:right;">
                    <button id = "EditButton"  style = "background-color:green;float:left;"  class="btn btn-primary">Edit</button>
                  </td>
                  <td>
                    <button id = "DeleteButton" style = "background-color:red;float:right;"  class="btn btn-primary">Delete</button>
                  </td> -->
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>