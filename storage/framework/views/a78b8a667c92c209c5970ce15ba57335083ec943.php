<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Monitor<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					</div>
					</h2>
  <?php echo e(csrf_field()); ?>

  <?php if($BazaarVenue=='MegatradeHall'): ?>
    <div class="sub-header" style="background-color:teal;padding:1px;"></div>
    <h4 style="margin-left:50px;color:teal;">Legend:</h4>
    <button class="btnlegend" style="border: 2px solid #0077FF;margin-left:65px">Corner Stall</button>
    <button class="btnlegend" style="border: 2px solid #4CAF50;">Regular Stall</button>
    <button class="btnlegend" style="border: 2px solid #9A00FF;">Prime Stall</button>
    <button class="btnlegend" style="border: 2px solid #FFA500;">Food Stall</button>
    <button class="btnlegend" style="background-color:#f79391;">Permanently Reserved</button>
    <button class="btnlegend" style="background-color:#f3f35f;">Temporarily Reserved</button>
    <button class="btnlegend sub-header">Vacant</button>
    <br><br><br><br>
    <div class="sub-header" style="background-color:teal;padding:1px;"></div>
    <h4 style="margin-left:50px;color:teal;">Stall Map:</h4>
    <br>
    <?php echo e(csrf_field()); ?>

    <center>
    <?php $ctr=0 ?>
    <?php for($i=0;$i<=4;$i++): ?>
      <?php if($i==0): ?>
          <div style=float:left;>
            <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style="margin-right:70px;margin-left:65px" id="ReserveButton"  data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
            <?php $ctr++ ?>
              <?php for($x=0;$x<=2;$x++): ?>
                  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                  <?php $ctr++ ?>
                  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-right:70px;" data-type=   "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                  <?php $ctr++ ?>
              <?php endfor; ?>
            <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>"  data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
            <?php $ctr++ ?>
          </div>
      <?php elseif($i==1): ?>
        <div style=float:left;>
            <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style="margin-right:70px;margin-left:65px" id="ReserveButton"  data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"   data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
            <?php $ctr++ ?>
            <?php for($x=0;$x<=2;$x++): ?>
              <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"   data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
              <?php $ctr++ ?>
              <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-right:70px;" data-type=  "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
              <?php $ctr++ ?>
              <?php endfor; ?>
            <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>"  data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
            <?php $ctr++ ?>
      </div>
      <?php else: ?>
        <div style=float:left;>
            <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-right:70px;margin-left:65px" data-type= "<?php echo e($stalls[0]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
            <?php $ctr++ ?>
            <?php for($x=0;$x<=2;$x++): ?>
              <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
              <?php $ctr++ ?>
              <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-right:70px;" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
              <?php $ctr++ ?>
            <?php endfor; ?>
            <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
            <?php $ctr++ ?>
      </div>
    <?php endif; ?>
<?php endfor; ?>

<div style=float:left;margin-bottom:60px;>
  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-left:65px;margin-top:50px" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
  <?php $ctr++ ?>

  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-top:50px" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
  <?php $ctr++ ?>

  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-right:60px;margin-top:50px" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
  <?php $ctr++ ?>

  <?php for($x=0;$x<=2;$x++): ?>
    <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-top:50px"  id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
    <?php $ctr++ ?>
  <?php endfor; ?>

    <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-right:60px;margin-top:50px"  id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
    <?php $ctr++ ?>
  <?php for($x=0;$x<=2;$x++): ?>
    <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  style="margin-top:50px" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
    <?php $ctr++ ?>
    <?php endfor; ?>
</div>

</center>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php endif; ?>

<?php if($BazaarVenue=="WorldTradeCenter"): ?>

<div class="sub-header" style="background-color:teal;padding:1px;"></div>
<h4 style="margin-left:50px;color:teal;">Legend:</h4>
<button class="btnlegend" style="border: 2px solid #0077FF;margin-left:65px">Corner Stall</button>
<button class="btnlegend" style="border: 2px solid #4CAF50;">Regular Stall</button>
<button class="btnlegend" style="border: 2px solid #9A00FF;">Prime Stall</button>
<button class="btnlegend" style="border: 2px solid #FFA500;">Food Stall</button>
<button class="btnlegend" style="background-color:#f79391;">Permanently Reserved</button>
<button class="btnlegend" style="background-color:#f3f35f;">Temporarily Reserved</button>
<button class="btnlegend sub-header">Vacant</button>
<br><br><br><br>
<div class="sub-header" style="background-color:teal;padding:1px;"></div>
<h4 style="margin-left:50px;color:teal;">Stall Map:</h4>
<br>
<?php echo e(csrf_field()); ?>

<center>
<?php $ctr=0; ?>
<?php for($y=0;$y<=3;$y++): ?>
<div style=float:left;>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-right:50px;margin-left:18px id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<?php for($x=0;$x<=5;$x++): ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>"  id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-right:50px; id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<?php endfor; ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
</div>
<?php endfor; ?>




<div style=float:left;>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-right:50px;margin-left:18px id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($stalls[$ctr]->updated_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-left:862px id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
</div>



<!--change button class by the class type -->
<?php for($y=0;$y<=3;$y++): ?>
<div style=float:left;>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-right:50px;margin-left:18px id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<?php for($x=0;$x<=5;$x++): ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-right:50px; id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<?php endfor; ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
</div>
<?php endfor; ?>



<div style=float:left;>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" style=margin-left:18px; id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" style=margin-right:30px; id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>

<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot"  id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>

<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>

<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot"  id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>

<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" style=margin-left:30px; id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-brandname= "<?php echo e($stalls[$ctr]->GuestBrand_Name); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationdate = "<?php echo e($allstalls[$ctr]->created_at); ?>" data-ownername = "<?php echo e($stalls[$ctr]->GuestBrand_OwnerName); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
</div>
<br><br><br><br><br><br>

</center>
<?php endif; ?>


<!-- start dessa show reserver 2018-0903-->

      <div class = "modal fade" id = "ModalShowReserver" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                    <h4 class ="modal-title">Stall Status</h4>
                  </div>
                  <div class="modal-body">

                  <div>
                    <h2 id="BazaarTitle"></h2>
                  </div>
                      <div>
                      <label>Stall Number:</label>
                      <label id="StallNumber"></label><br>
                      <label>Stall Reserver:</label>
                      <label id="Reserver"> </label><br>
                      <label>Stall Ownername:</label>
                      <label id="Ownername"> </label><br>
                      <label>Stall Reservation Date:</label>
                      <label id="DateReservation"></label><br>
                      </div>
                  </div>
                  <div class = "modal-footer">
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function(){

          $(document).on('click','#ReserveButton',function(){
            $('#StallNumber').text($(this).data('id'));
            $('#Reserver').text($(this).data('brandname'));
            $('#Ownername').text($(this).data('ownername'));
            $('#DateReservation').text($(this).data('reservationdate'));
            $('#ModalShowReserver').modal('show');
          });

        });
        </script>


<!-- end dessa show reserver 2018-0903-->




    <!-- This is the Modal that will be called for add column -->
    <div class = "modal fade" id = "ModalAdd" role = "dialog">
      <div class = "modal-dialog">

        <div class="modal-content">
          <div class = "modal-header" style = "background-color:#ffffa8">
            <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                  <h4 class ="modal-title">STALL REGISTRATION </h4>
                </div>
                <div class="modal-body">
                  <form>
                    <!--
                    <div class = "form-group">
                      <label> Stall ID: </label>
                      <input type="text" placeholder="Enter Stall ID" id="AddUsername" required>
                    </div>
                  -->
                    <div class="form-group">
                      <label> STALL RENTAL COST:</label>
                      <input type= "number" step ="0.01" min="1" class="form-control" id="AddStallRentalCost" required>
                    </div>

                      <div class = "form-group">
                      <label> STALL BOOKING COST: </label>
                      <input type= "number" step ="0.01" min="1" class="form-control" id="AddStallBookingCost" required>
                    </div>

                    <div class = "form-group">
                    <label>STALL TYPE:</label>
                    <select id="AddStallType" class="form-control">
                      <option value="Regular">Regular</option>
                      <option value="Prime">Prime</option>
                      <option value="Food">Food</option>
                    </select>
                  </div>

                <div class = "form-group">
                  <label> STALL SIZE </label>
                  <select id="AddStallSize" class="form-control">
                    <option value="2x3 m">2x3 m</option>
                    <option value="2x2 m">2x2 m</option>
                  </select>
                </div>

                  <div class = "form-group">
                  <label> STALL STATUS </label>
                  <select id="AddStallStatus" class="form-control">
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                  </select>
                </div>

                </form>
                </div>
                <div class = "modal-footer">
                  <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitAdd">ADD STALL </button>
                  <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                </div>
              </div>
        </div>
      </div>


          <!-- This is the Modal that will be called for edit column -->
          <div class = "modal fade" id = "ModalEdit" role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header" style = "background-color:#ffffa8">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                        <h4 class ="modal-title">STALL REGISTRATION </h4>
                      </div>
                      <div class="modal-body">
                        <form>

                          <div class = "form-group">
                            <label> STALL ID: </label>
                            <input type="text" class="form-control" id="EditStallID" disabled>
                          </div>

                          <div class="form-group">
                            <label> STALL RENTAL COST:</label>
                            <input type= "number" step ="0.01" min="1" class="form-control" id="EditStallRentalCost" required>
                          </div>

                            <div class = "form-group">
                            <label> STALL BOOKING COST: </label>
                            <input type= "number" step ="0.01" min="1" class="form-control" id="EditStallBookingCost" required>
                          </div>

                          <div class = "form-group">
                          <label>STALL TYPE: </label>
                          <select id="EditStallType" class="form-control">
                            <option value="Regular">Regular</option>
                            <option value="Prime">Prime</option>
                            <option value="Food">Food</option>
                            <option value="Corner">Corner</option>
                          </select>
                        </div>

                      <div class = "form-group">
                        <label> STALL SIZE: </label>
                        <select id="EditStallSize" class="form-control">
                          <option value="2x3 m">2x3 m</option>
                          <option value="2x2 m">2x2 m</option>
                        </select>
                      </div>

                        <div class = "form-group">
                        <label> STALL STATUS:</label>
                        <select id="EditStallStatus" class="form-control">
                          <option value="Available">Available</option>
                          <option value="Not Available">Not Available</option>
                        </select>
                      </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitEdit">EDIT STALL </button>
                        <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                      </div>
                    </div>
              </div>
            </div>

            <!-- This is the Modal that will be called for edit column -->
            <div class = "modal fade" id = "ModalDelete" role = "dialog">
              <div class = "modal-dialog">

                <div class="modal-content">
                  <div class = "modal-header" style = "background-color:#ffffa8">
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                          <h4 class ="modal-title">STALL REGISTRATION </h4>
                        </div>
                        <div class="modal-body">
                          <form>

                            <div class = "form-group">
                              <label> STALL ID: </label>
                              <input type="text" placeholder="Enter Stall ID" class="form-control" id="DeleteStallID" disabled>
                            </div>

                            <div class="form-group">
                              <label> STALL RENTAL COST:</label>
                              <input type= "number" step ="0.01" min="1" class="form-control" id="DeleteStallRentalCost" disabled>
                            </div>

                              <div class = "form-group">
                              <label> STALL BOOKING COST: </label>
                              <input type= "number" step ="0.01" min="1" class="form-control" id="DeleteStallBookingCost" disabled>
                            </div>

                            <div class = "form-group">
                            <label> STALL TYPE: </label>
                            <select id="DeleteStallType" disabled class="form-control">
                              <option value="Regular">Regular</option>
                              <option value="Prime">Prime</option>
                              <option value="Food">Food</option>
                            </select>
                          </div>

                        <div class = "form-group">
                          <label> STALL SIZE: </label>
                          <select id="DeleteStallSize" class="form-control">
                            <option value="2x3 m">2x3 m</option>
                            <option value="2x2 m">2x2 m</option>
                          </select>
                        </div>

                          <div class = "form-group">
                          <label> STALL STATUS: </label>
                          <select id="DeleteStallStatus" class="form-control">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                          </select>
                        </div>

                        </form>
                        </div>
                        <div class = "modal-footer">
                          <button type="button" class = "btn btn-danger" data-dismiss = "modal" id="SubmitDelete">DELETE STALL </button>
                          <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                        </div>
                      </div>
                </div>
              </div>


              <script type="text/javascript">
              var BazaarID = <?php echo e(Session::get('BazaarID')); ?> ;

                $(document).ready(function(){

                    $(document).on('click','#BtnAdd',function(){
                      $('#ModalAdd').modal('show');
                    });

                    $('.modal-footer').on('click','#SubmitAdd',function()
                    {
                      $.ajax({
                        type: 'POST',
                        url: '/admin/manage_stalls',
                        data: {
                          '_token': $('input[name=_token]').val(),
                          'rentalcost': $('#AddStallRentalCost').val(),
                          'bookingcost': $('#AddStallBookingCost').val(),
                          'type': $('#AddStallType').val(),
                          'status': $('#AddStallStatus').val(),
                          'size': $('#AddStallSize').val(),
                          'bazaarID' : BazaarID

                        },
                        success: function(response){
                          if(response.errrors){
                            toastr.error('Validation error', 'Error Alert', {timeOut:5000});
                          }
                          else{
                            toastr.success('Successfully Added Stall', 'Success Alert', {timeOut:5000});
                            $('#StallTable').prepend("<tr id = 'Stall" + response.PK_StallID + "'><td>" + response.PK_StallID + "</td><td>" + response.Stall_RentalCost + "</td><td>" + response.Stall_BookingCost + "</td><td>" + response.Stall_Type + "</td><td>" + response.Stall_Size + "</td><td>" + response.Stall_Status + "</td><td><button id='BtnDelete' style = 'background-color:red;margin-left:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_StallID + "' data-rentalcost='" + response.Stall_RentalCost + "'  data-bookingcost='" + response.Stall_BookingCost + "' data-type='" + response.Stall_Type + "' data-size = '" + response.Stall_Size + "' data-status = '" + response.Stall_Status + "'>Delete</button><button id= 'BtnDelete' style = 'background-color:green;' type='button' class='btn btn-primary' data-id='" + response.PK_StallID + "' data-rentalcost='" + response.Stall_RentalCost + "'  data-bookingcost='" + response.Stall_BookingCost + "' data-type='" + response.Stall_Type + "' data-size = '" + response.Stall_Size + "' data-status = '" + response.Stall_Status + "'>Edit</button></td></tr>");
                          }

                        }
                      });
                    });

                    $(document).on('click','#BtnEdit', function(){
                      id = ($(this).data('id'));
                      $('#EditStallID').val($(this).data('id'));
                      $('#EditStallRentalCost').val($(this).data('rentalcost'));
                      $('#EditStallBookingCost').val($(this).data('bookingcost'));
                      $('#EditStallType').val($(this).data('type'));
                      $('#EditStallSize').val($(this).data('size'));
                      $('#EditStallStatus').val($(this).data('status'));
                      $('#EditStallStatus').val($(this).data('status'));
                      $('#ModalEdit').modal('show');
                    });

                    $('.modal-footer').on('click','#SubmitEdit',function(){


                      $.ajax({
                        type: "PUT",
                        url: '/admin/manage_stalls/' + id,
                        data: {
                          '_token': $('input[name=_token]').val(),
                          'rentalcost': $('#EditStallRentalCost').val(),
                          'bookingcost': $('#EditStallBookingCost').val(),
                          'type': $('#EditStallType').val(),
                          'size': $('#EditStallSize').val(),
                          'status': $('#EditStallStatus').val(),
                          'bazaarID': BazaarID,
                        },
                        success: function(response){
                          if(response.errrors){
                            toastr.error('Validation Error','Error Alert', {timeOut:5000});
                          }
                          else{
                            toastr.success('Successfully Edit Stall Information', 'Success Alert', {timeOut:5000});
                            $('#Stall' + response.PK_StallID).replaceWith("<tr id = 'Stall" + response.PK_StallID + "'><td>" + response.PK_StallID + "</td><td>" + response.Stall_RentalCost + "</td><td>" + response.Stall_BookingCost + "</td><td>" + response.Stall_Type + "</td><td>" + response.Stall_Size + "</td><td>" + response.Stall_Status + "</td><td><button id='BtnDelete' style = 'background-color:red;margin-left:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_StallID + "' data-rentalcost='" + response.Stall_RentalCost + "'  data-bookingcost='" + response.Stall_BookingCost + "' data-type='" + response.Stall_Type + "' data-size = '" + response.Stall_Size + "' data-status = '" + response.Stall_Status + "'>Delete</button><button id= 'BtnDelete' style = 'background-color:green;' type='button' class='btn btn-primary' data-id='" + response.PK_StallID + "' data-rentalcost='" + response.Stall_RentalCost + "'  data-bookingcost='" + response.Stall_BookingCost + "' data-type='" + response.Stall_Type + "' data-size = '" + response.Stall_Size + "' data-status = '" + response.Stall_Status + "'>Edit</button></td></tr>");
                          }

                        }

                      });
                    });

                    $(document).on('click','#BtnDelete', function(){
                      id = ($(this).data('id'));
                      $('#DeleteStallID').val($(this).data('id'));
                      $('#DeleteStallRentalCost').val($(this).data('rentalcost'));
                      $('#DeleteStallBookingCost').val($(this).data('bookingcost'));
                      $('#DeleteStallType').val($(this).data('type'));
                      $('#DeleteStallSize').val($(this).data('size'));
                      $('#DeleteStallStatus').val($(this).data('status'));
                      $('#ModalDelete').modal('show');

                    });

                    $('.modal-footer').on('click','#SubmitDelete',function(){
                      $.ajax({
                        type: "Delete",
                        url:'/admin/manage_stalls/' + id,
                        data:{
                          '_token': $('input[name=_token]').val()
                        },
                        success: function(response){
                          toastr.error('Deleting Successful', 'Delete Alert', {timeOut:5000})
                          $('#Stall' + response.PK_StallID).remove();
                        }
                      });
                    });
                });
              </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>