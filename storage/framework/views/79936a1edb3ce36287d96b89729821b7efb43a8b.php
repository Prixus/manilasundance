<?php $__env->startSection('content'); ?>


<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



      <h2 class="sub-header"><span class="glyphicon glyphicon-globe"></span>    Notifications
				<!-- <div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
				</div> -->
			</h2>


          <div class="table-responsive">
            <table class="table table-striped" style="font-size:15px;" id="BrandNotifsTable">
              <thead>
                <tr>
                  <th>Date Received</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $currentAccount->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($notification->created_at); ?></td>
                  <?php if($notification->type== "App\Notifications\PaymentVerified"): ?>
                  <td>Payment Approved</td>
                  <td>Your Payment worth of <?php echo e($notification->data['PaymentInformation']['Payment_Amount']); ?> for bill <?php echo e($notification->data['PaymentInformation']['FK_BillingID']); ?> was received on <?php echo e($notification->data['repliedTime']['date']); ?> </td>
                  <td><button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" target="_blank" aria-pressed="false"><a href = "/brand/printReceipt/<?php echo e($notification->data['PaymentInformation']['PK_PaymentID']); ?>" target="_blank" >Print Receipt</a></button></td>
                </tr>
                  <?php elseif($notification->type== "App\Notifications\PaymentRejected"): ?>
                  <td>Payment Rejection</td>
                  <td><?php echo e($notification->data['message']); ?></td>
                  <td></td>
                  <?php elseif($notification->type== "App\Notifications\ExcessPayment"): ?>
                  <td>Payment Excess</td>
                  <td><?php echo e($notification->data['message']); ?></td>
                  <td></td>
                  <?php elseif($notification->type== "App\Notifications\billDueDateNotification"): ?>
                  <td>Bill Due Date</td>
                  <td><?php echo e($notification->data['message']); ?></td>
                  <td></td>
                  <?php elseif($notification->type== "App\Notifications\voidFiveDaysDeadline"): ?>
                  <td>Reservation Void</td>
                  <td><?php echo e($notification->data['message']); ?></td>
                  <td></td>
                  <?php elseif($notification->type== "App\Notifications\voidBeforeBazaarStart"): ?>
                  <td>Reservation Void</td>
                  <td><?php echo e($notification->data['message']); ?></td>
                  <td></td>
                  <?php elseif($notification->type== "App\Notifications\WarningsNotification"): ?>
                  <td>Account Warning</td>
                  <td><?php echo e($notification->data['message']); ?></td>
                  <td></td>
                  <?php else: ?>
                  <td>Bazaar Cancellation</td>
                  <td><?php echo e($notification->data['message']); ?></td>
                  <td></td>
                </tr>
                  <?php endif; ?>

                 <?php
                  $notification->markasRead();
                  ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>

</div>
</div>
</div>

<script type= "text/javascript">
    var table = $('#BrandNotifsTable').DataTable({
        "order": [[ 0, "desc" ]]
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>