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
          <h5 class="lbl">Address:   </h5><p>Cityland Tower 1, Mandaluyong City</p><br>
          <h5 class="lbl">Tin Number:   </h5><p>894563286787</p><br>
          <h5 class="lbl">Telephone Number :   </h5><p>252-89-91</p><br>
          <h5 class="lbl">Fax:    </h5><p>252-89-91</p><br>
          <h5 class="lbl">Website:    </h5><p>ManilaSundance.com</p>
        <br>
        <div>
          <br>
          <center><h2 style = "width:100%; border-top:2px; border-bottom:2px; border-top-style: dashed; border-bottom-style: dashed; #000">OFFICIAL RECEIPT</h2></center>
          <br>
          
          <h3 style = "float: right">Date: <?php echo e($dategenerated); ?></h3><br>

          <h5 class="lbl">Tin Number:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_TinNumber); ?></label><br>
          <h5 class="lbl">Company:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_Name); ?></label><br>
          <h5 class="lbl">Name:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_OwnerName); ?></label><br>
          <h5 class="lbl">Tel:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_MobileNumber); ?></label><br>
          <h5 class="lbl">Website:    </h5><label><?php echo e($ReservationAccountBrandInformations->GuestBrand_Website); ?></label><br>
          <br>
          <h3>OR Number: <?php echo e($ReservationAccountBrandInformations->PK_PaymentID); ?></h3>

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
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Cost: </td>
                    <td style="font-weight: bold;"><?php echo e($ReservationAccountBrandInformations->Billing_SubTotal); ?></td> 
                  </tr>   
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>VAT:</td>
                    <td style="font-weight: bold;"> <?php echo e($ReservationAccountBrandInformations->Billing_SubTotal * 0.12); ?></td> 
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Previously Amount Paid:</td>
                    <td style="font-weight: bold;"> <?php echo e($ReservationAccountBrandInformations->Billing_AmountPaid  - $ReservationAccountBrandInformations->Payment_Amount); ?></td> 
                  </tr>   
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Amount Paid:</td>
                    <td style="font-weight: bold;"> <?php echo e($ReservationAccountBrandInformations->Payment_Amount); ?></td> 
                  </tr>   
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Balance:</td>
                    <td style="font-weight: bold;"> <?php echo e($ReservationAccountBrandInformations->Billing_AmountToBePaid); ?></td>
                  </tr>              
                </tbody>
              </table>
            </div>

          <div class="sub-header" style="background-color:#3ce1e0;padding:1px;"></div>
        <br><br><br>
        <div>
        <br>
        <p>This serves as your official receipt. Please pay the remaining balance to continue participating in our bazaar.</p><br>
        <p>Thank you for staying with us!</p>
        <br><br>
        </div>
          </div>

      </div>
  </div>

</body>
</html>
