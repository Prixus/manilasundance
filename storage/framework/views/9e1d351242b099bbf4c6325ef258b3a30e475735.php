<html>
<head>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Manila Sundance</title>
<link rel="icon" href="/img/MSLogo.png">
<!-- This link calls the css file from the public folder -->
<link href="/css/sign.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/carousel.css" rel="stylesheet">

<style>
  body {
    font-family: 'Times New Roman';
    color: black;
  }
  h5, p, label {
    display: inline-block;
    margin: 6px;
  }
  h5{
    color: #F79391;
    font-size: 16px;
    font-weight: bold;
  }
  p, label {
    color: black;
    font-weight: normal;
  }
  .lbl {
    width:150px;
  }
</style>


</head>
<body>

  <div class="container-fluid">
      <div class="row">

          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



        <center>
        <img src = "img/mslogo/logo.png" style="height:129;width:500px;">
        <h1>Manila Sundance</h1>
        <h4>Fashion Events</h4>
        </center>

        <br>
          <h5 class="lbl">Address:   </h5><p>Cityland Tower 1, Mandaluyong City</p><br>
          <h5 class="lbl">Tin Number:   </h5><p>894563286787</p><br>
          <h5 class="lbl">Telephone Number :   </h5><p>252-89-91</p><br>
          <h5 class="lbl">Fax:    </h5><p>252-89-91</p><br>
          <h5 class="lbl">Website:    </h5><p>ManilaSundance.com</p>
        <br>
        <div>
          <br>
          <center><h2 style = "width:100%; border-top:2px; border-bottom:2px; border-top-style: dashed; border-bottom-style: dashed; #000">INVOICE<h2></center>

          <h5>Billing Party</h5>

          <h5 class="lbl">Tin Number:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_TinNumber); ?></label><br>
          <h5 class="lbl">Company:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_Name); ?></label><br>
          <h5 class="lbl">Name:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_OwnerName); ?></label><br>
          <h5 class="lbl">Tel:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_MobileNumber); ?></label><br>
          <h5 class="lbl">Website:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_Website); ?></label><br>

        </div>
          <br><br>
          <div class="table-responsive">
              <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">
                <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
                  <tr>
                    <th>Stall ID</th>
                    <th>Stall Type</th>
                    <th>Stall Size</th>
                    <th>Booking Cost</th>
                    <th>Rental Cost</th>
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
                    <td>22000</td>
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
          
          <div class="sub-header" style="background-color:#3ce1e0;padding:1px;"></div>
        <br><br><br>
        <div>
        <center><h2 style = "width:100%; border-top:2px; border-bottom:2px; border-top-style: dashed; border-bottom-style: dashed; #000">INVOICE RESERVATION TERMS AND CONDITIONS<h2></center>
       <div>
        <h4>1. Payment</h4>
        <p>1.1.	Payments are to be made through deposit and money transfer to Manila Sundance BPI account. </p><br>
        <p>1.2.	After paying, the brand should upload the deposit slip in manilasundance.com. Payments will be confirmed by the administration first for the reservation to be completed. </p><br>
        <p>1.3.	The brand should pay half or full amount of the total reservation and stall renting fee after 5 days from the date of reservation. </p><br>
        <p>1.4.	Failure to comply from the previous statements, your reserved stall/s will be available for other brands to reserve.</p><br>
        <h4>2. Cancellation of Reservation</h4>
        <p>2.1. The reservation cannot be cancelled unless the brand hasn’t paid any amount yet. The stall will be automatically available for other brands after 5 days of reservation.</p><br>
        <p>2.2. In any case that the brand already paid, and they want to cancel the reservation, the amount paid is nonrefundable.</p><br>
      </div>
        <br>
        <label>Thank you for staying with us!</label>
        <br><br>
        </div>
          </div>

      </div>
  </div>

</body>
</html>
