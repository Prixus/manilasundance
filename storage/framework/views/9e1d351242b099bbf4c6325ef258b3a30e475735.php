<html>
<head>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Manila Sundance</title>
<link rel="icon" href="/img/MSLogo.png">
<!-- This link calls the css file from the public folder -->
<link href="/css/sign.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/carousel.css" rel="stylesheet">




</head>
<body>

  <div class="container-fluid">
      <div class="row">

          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


            <h2 class="sub-header">Manila Sundance</h2>
        <h4>Fashion Events</h4>

        <br>
          <h5>Address:    <label>________________________</label></h5>
          <h5>Tin Number    <label>________________________</label></h5>
          <h5>Telephone Number    <label>________________________</label></h5>
          <h5>Fax:    <label>________________________</label></h5>
          <h5>Website:    <label>________________________</label></h5>
        <br>
        <div>
        <br>
        <br>
        <h5>Billing Party</h5>
          <?php $__currentLoopData = $ReservationAccountBrandInformations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ReservationAccountBrandInformation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h5>Tin Number:    <label><?php echo e($ReservationAccountBrandInformation->GuestBrand_TinNumber); ?></label></h5>
          <h5>Company:    <label><?php echo e($ReservationAccountBrandInformation->GuestBrand_Name); ?></label></h5>
          <h5>Name:    <label><?php echo e($ReservationAccountBrandInformation->GuestBrand_OwnerName); ?></label></h5>
          <h5>Tel:    <label><?php echo e($ReservationAccountBrandInformation->GuestBrand_MobileNumber); ?></label></h5>
          <h5>Website:    <label><?php echo e($ReservationAccountBrandInformation->GuestBrand_Website); ?></label></h5>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Cost:</td>
                    <td><?php echo e($TotalCost); ?></td>
                </tbody>
              </table>
            </div>
        <br><br>
        <label>Thank you for staying with us!</label>
        <br><br>
        <div>
        </div>
          </div>

      </div>
  </div>

</body>
</html>
