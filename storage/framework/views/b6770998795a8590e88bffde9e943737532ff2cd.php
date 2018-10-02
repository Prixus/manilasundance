<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Manila Sundance</h2>
      <h4>Fashion Events</h4>

      <br>
        <h5>Address:    <label>Cityland Tower 1, Mandaluyong City</label></h5>
        <h5>Tin Number    <label>894563286787</label></h5>
        <h5>Telephone Number   <label>252-89-91</label></h5>
        <h5>Fax:    <label>252-89-91</label></h5>
        <h5>Website:   <label>ManilaSundance.com</label></h5>
      <br>
      <div>
      <br>
      <br>
      <h5>Billing Party</h5>

        <h5>Tin Number:    <label><?php echo e($ReservationAccountBrandInformations->GuestBrand_TinNumber); ?></label></h5>
        <h5>Company:    <label><?php echo e($ReservationAccountBrandInformations->GuestBrand_Name); ?></label></h5>
        <h5>Name:    <label><?php echo e($ReservationAccountBrandInformations->GuestBrand_OwnerName); ?></label></h5>
        <h5>Tel:    <label><?php echo e($ReservationAccountBrandInformations->GuestBrand_MobileNumber); ?></label></h5>
        <h5>Website:    <label><?php echo e($ReservationAccountBrandInformations->GuestBrand_Website); ?></label></h5>

      <br>
      </div>

        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Stall ID</th>
                  <th>Stall Type</th>
                  <th>Stall Size</th>
                  <th>Stall Booking Cost</th>
                  <th>Stall Rental Cost</th>
                  <th>Subtotal Cost</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $ReservedStalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ReservedStall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($ReservedStall->PK_StallID); ?></td>
                  <td><?php echo e($ReservedStall->Stall_Type); ?></td>
                  <td><?php echo e($ReservedStall->Stall_Size); ?></td>
                  <td><?php echo e($ReservedStall->Stall_BookingCost); ?></td>
                  <td><?php echo e($ReservedStall->Stall_RentalCost); ?></td>
                  <td><?php echo e($ReservedStall->Stall_RentalCost+$ReservedStall->Stall_BookingCost); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style ="color:green">Balance From Previous Billing:</td>
                  <?php if($ReservationAccountBrandInformations->Billing_BalanceFromPreviousBilling < 0): ?>
                  <td><?php echo e($ReservationAccountBrandInformations->Billing_BalanceFromPreviousBilling); ?></td>
                  <?php else: ?>
                  <td>(<?php echo e($ReservationAccountBrandInformations->Billing_BalanceFromPreviousBilling); ?>)</td>
                  <?php endif; ?>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style ="color:green">Amount Paid:</td>
                  <?php if($ReservationAccountBrandInformations->Billing_AmountPaid <= 0): ?>
                  <td><?php echo e($ReservationAccountBrandInformations->Billing_AmountPaid); ?></td>
                  <?php else: ?>
                  <td>(<?php echo e($ReservationAccountBrandInformations->Billing_AmountPaid); ?>)</td>
                  <?php endif; ?>

                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style ="color:red">Total Cost:</td>
                  <td style="font-size: 1.3em; font-style: bold; color: black"><?php echo e($ReservationAccountBrandInformations->Billing_AmountToBePaid); ?></td>
                </tr>
              </tbody>
            </table>
          </div>



        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Payment ID</th>
                  <th>Payment Type</th>
                  <th>Payment Amount</th>
                  <th>Payment Date</th>
                  <th>Payment Reference Number</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $billing->paymentsMade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Payments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($Payments->Payment_Status == "Approved"): ?>
                <tr>
                  <td><?php echo e($Payments->PK_PaymentID); ?></td>
                  <td><?php echo e($Payments->Payment_Mode); ?></td>
                  <td><?php echo e($Payments->Payment_Amount); ?></td>
                  <td><?php echo e($Payments->created_at); ?></td>
                  <td><?php echo e($Payments->Payment_AccountNumber); ?></td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style ="color:green">Amount Paid:</td>
                  <?php if($ReservationAccountBrandInformations->Billing_AmountPaid <= 0): ?>
                  <td><?php echo e($ReservationAccountBrandInformations->Billing_AmountPaid); ?></td>
                  <?php else: ?>
                  <td>(<?php echo e($ReservationAccountBrandInformations->Billing_AmountPaid); ?>)</td>
                  <?php endif; ?>
                </tr>

              </tbody>
            </table>
          </div>
      <br><br>
      <label>Thank you for staying with us!</label>
      <br><br>
      <div>
      <?php if($ReservationAccountBrandInformations->Billing_Status != "Void"): ?>
      <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/brand/seepdf/<?php echo e($ReservationAccountBrandInformations->PK_ReservationID); ?>" >Print</a></button>
      <?php endif; ?>
      <button style = "background-color:green;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/brand/billing" >Finished</a></button>
      </div>
        </div>

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>