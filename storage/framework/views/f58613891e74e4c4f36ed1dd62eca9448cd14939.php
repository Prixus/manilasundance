<?php $__env->startSection('content'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

      <h2 class="sub-header">Reserve Stalls</h2>

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
                  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style="margin-right:70px;margin-left:65px" id="ReserveButton"  data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                  <?php $ctr++ ?>
                    <?php for($x=0;$x<=2;$x++): ?>
                        <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                        <?php $ctr++ ?>
                        <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-right:70px;" data-type=   "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                        <?php $ctr++ ?>
                    <?php endfor; ?>
                  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>"  data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                  <?php $ctr++ ?>
                </div>
            <?php elseif($i==1): ?>
              <div style=float:left;>
                  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style="margin-right:70px;margin-left:65px" id="ReserveButton"  data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>"  data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                  <?php $ctr++ ?>
                  <?php for($x=0;$x<=2;$x++): ?>
                    <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>"  data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                    <?php $ctr++ ?>
                    <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-right:70px;" data-type=  "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                    <?php $ctr++ ?>
                    <?php endfor; ?>
                  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>"  data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                  <?php $ctr++ ?>
            </div>
            <?php else: ?>
              <div style=float:left;>
                  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-right:70px;margin-left:65px" data-type= "<?php echo e($stalls[0]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                  <?php $ctr++ ?>
                  <?php for($x=0;$x<=2;$x++): ?>
                    <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                    <?php $ctr++ ?>
                    <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-right:70px;" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                    <?php $ctr++ ?>
                  <?php endfor; ?>
                  <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
                  <?php $ctr++ ?>
            </div>
          <?php endif; ?>
      <?php endfor; ?>

      <div style=float:left;margin-bottom:60px;>
        <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-left:65px;margin-top:50px" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
        <?php $ctr++ ?>

        <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-top:50px" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
        <?php $ctr++ ?>

        <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-right:60px;margin-top:50px" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
        <?php $ctr++ ?>

        <?php for($x=0;$x<=2;$x++): ?>
          <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-top:50px"  id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
          <?php $ctr++ ?>
        <?php endfor; ?>

          <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-right:60px;margin-top:50px"  id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
          <?php $ctr++ ?>
        <?php for($x=0;$x<=2;$x++): ?>
          <button class="button button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bottomlane" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" style="margin-top:50px" id="ReserveButton" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
          <?php $ctr++ ?>
          <?php endfor; ?>
     </div>

   </center>

<br>
<div style="float:left;margin-top:-40px;">
<p style="margin-left:310px;color:red;font-weight:bold;display:inline-block;width:150px;">*** E X I T ***</p>
<p style="margin-left:220px;color:blue;font-weight:bold;display:inline-block;width:150px;">*** E N T R A N C E ***</p>
</div>

<br><br><br><br><br><br>

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
  <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style="margin-right:50px;margin-left:18px" id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
  <?php $ctr++ ?>
  <?php for($x=0;$x<=5;$x++): ?>
    <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>"  id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
    <?php $ctr++ ?>
    <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style="margin-right:50px;" id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
    <?php $ctr++ ?>
  <?php endfor; ?>
  <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
  <?php $ctr++ ?>
  </div>
<?php endfor; ?>




<div style=float:left;>
  <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-right:50px;margin-left:18px id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
  <?php $ctr++ ?>
  <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-left:862px id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
  <?php $ctr++ ?>
</div>



<!--change button class by the class type -->
  <?php for($y=0;$y<=3;$y++): ?>
  <div style=float:left;>
    <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-right:50px;margin-left:18px id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
    <?php $ctr++ ?>
    <?php for($x=0;$x<=5;$x++): ?>
      <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
      <?php $ctr++ ?>
      <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" style=margin-right:50px; id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
      <?php $ctr++ ?>
    <?php endfor; ?>
    <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?>" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
   <?php $ctr++ ?>
  </div>
  <?php endfor; ?>



<div style=float:left;>
  <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" style=margin-left:18px; id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" style=margin-right:30px; id="ReserveButton" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>

 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot"  id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>

 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>

 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>
 <button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot"  id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
 <?php $ctr++ ?>

<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" style=margin-left:30px; id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
<button class="button2 button<?php echo e($stalls[$ctr]->Stall_Type); ?> <?php echo e($stalls[$ctr]->Stall_Status); ?> bot" id="ReserveButton" data-id= "<?php echo e($stalls[$ctr]->PK_StallID); ?>" data-reservationid = "<?php echo e($stalls[$ctr]->FK_ReservationID); ?>" data-type= "<?php echo e($stalls[$ctr]->Stall_Type); ?>" data-size= "<?php echo e($stalls[$ctr]->Stall_Size); ?>" data-status = "<?php echo e($stalls[$ctr]->Stall_Status); ?>" data-rentalcost = "<?php echo e($stalls[$ctr]->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($stalls[$ctr]->Stall_BookingCost); ?>"><?php echo e($stalls[$ctr]->PK_StallID); ?></button>
<?php $ctr++ ?>
</div>

</center>

<br>
<div style="float:left;">
<p style="margin-left:168px;color:red;font-weight:bold;display:inline-block;width:150px;">*** E X I T ***</p>
<p style="margin-left:450px;color:blue;font-weight:bold;display:inline-block;width:150px;">*** E N T R A N C E ***</p>
</div>
<br><br><br>

<?php endif; ?>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div style="background-color:teal;padding:1px;"></div>
<br>


                    <h2>Reserved Stalls</h2>
                    <table class="table table-striped" id="ReservedStallTable">
                          <thead>
                            <tr>
                              <th>Stall ID</th>
                              <th>Stall Rental Cost</th>
                              <th>Stall Booking Cost</th>
                              <th>Stall Type</th>
                              <th>Stall Status</th>
                            </tr>
                            <?php echo e(csrf_field()); ?>

                          </thead>

                          <tbody>
                          <?php $__currentLoopData = $ReservedStalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ReservedStall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="ReservedStall<?php echo e($ReservedStall->PK_StallID); ?>">
                              <td><?php echo e($ReservedStall->PK_StallID); ?></td>
                              <td><?php echo e($ReservedStall->Stall_RentalCost); ?></td>
                              <td><?php echo e($ReservedStall->Stall_BookingCost); ?></td>
                              <td><?php echo e($ReservedStall->Stall_Type); ?></td>
                              <td><?php echo e($ReservedStall->Stall_Status); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
</div>
</div>
</div>

              <button id = "BtnDelete" style = "background-color:#337ab7;margin-left:5px;" type="button" class="btn btn-primary"><a href = "/brand/stalls/viewbill">View Bill</a></button>
            <!-- This is the Modal that will be called to show the reservation info -->
              <div class = "modal fade" id = "ModalReserve" role = "dialog">
                <div class = "modal-dialog">

                  <div class="modal-content">
                    <div class = "modal-header" style = "background-color:#ffffa8">
                      <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                            <h4 class ="modal-title"> RESERVATION</h4>
                          </div>
                          <div class="modal-body">
                              <form>
                              <div class = "form-group">
                                <label> STALL ID: </label>
                                <input type="text" name ="txtProductName" class="form-control" id="ReserveStallID" disabled>
                              </div>
                              <div class = "form-group">
                                <label> STALL RENTAL COST:</label>
                                <input type="number" name ="txtStallRent" class="form-control" id="ReserveRent" disabled>
                              </div>

                              <div class="form-group">
                                <label> STALL BOOKING COST: </label>
                                <input type="text" name="txtStallBooking" class="form-control" id="ReserveBooking" disabled>
                              </div>
                              <div class = "form-group">
                                <label> STALL TYPE: <label>
                                <input type="text" name="txtStallType" class="form-control" id="ReserveType" disabled>
                              </div>
                              <div class ="form-group">
                                <label> STALL STATUS: <label>
                                <input type="text" name="txtStallStatus" class="form-control" id="ReserveStatus" disabled>
                              </div>
                          </form>
                          </div>
                          <div class = "modal-footer">
                            <button type ="button" class= "btn btn-success" data-dismiss="modal" id="Reserve">ADD </button>

                            <button type ="button" class= "btn btn-danger" data-dismiss="modal" id="Cancel" >CANCEL RESERVATION </button>
                            <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                          </div>
                        </div>
                  </div>
                </div>


 <!-- start confirm leave dessa 2018-0925  -->

<!-- modal for confirm leave reservation -->
<div id = "modalConfirmLeave" class = "modal fade"  role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header" style = "background-color:#ffffa8">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                        <h4 class ="modal-title"> ARE YOU SURE YOU WANT TO LEAVE? </h4>
                      </div>
                      <div class="modal-body">
                        <form>

                          <div class = "form-group">
                            <label> Reservation process is not yet done. If you leave now, no reservation data will be saved.</label>
                          </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-danger" data-dismiss = "modal" id="leavereservation"> LEAVE </button>
                        <button type ="button" class = "btn btn-success" data-dismiss = "modal"> STAY </button>
                      </div>
                    </div>
              </div>
            </div>

<!--  end confirm leave dessa 2018-0925  -->

<div id = "modalConfirmLogoutLeave" class = "modal fade"  role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header" style = "background-color:#ffffa8">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                        <h4 class ="modal-title"> ARE YOU SURE YOU WANT TO LEAVE? </h4>
                      </div>
                      <div class="modal-body">
                        <form>

                          <div class = "form-group">
                            <label> Reservation process is not yet done. If you leave now, no reservation data will be saved.</label>
                          </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-danger" data-dismiss = "modal" id="LogoutAndLeave"> LEAVE </button>
                        <button type ="button" class = "btn btn-success" data-dismiss = "modal"> STAY </button>
                      </div>
                    </div>
              </div>
            </div>


                <script type= "text/javascript">

                      var brandID = <?php echo e(Session::get('BrandID')); ?>;
                      $(document).ready(function()
                      {
                        console.log("<?php echo e(Session::get('ReservationID')); ?>");

// start confirm leave dessa 2018-0925
  var route;
  $(document).on('click', '#bazaar', function(){
      route="/brand/bazaars";
      console.log(route);
      $('#modalConfirmLeave').modal('show');

  });
  $(document).on('click', '#reservation', function(){
      route="/brand/reservations";
      $('#modalConfirmLeave').modal('show');
  });
  $(document).on('click', '#billing', function(){
      route="/brand/billing";
      $('#modalConfirmLeave').modal('show');
  });
  $(document).on('click', '#product', function(){
      route="/brand/products";
      $('#modalConfirmLeave').modal('show');
  });
  $(document).on('click', '#calendar', function(){
      route="/brand/calendar";
      $('#modalConfirmLeave').modal('show');
  });
  $(document).on('click', '#setting', function(){
      route="/brand/settings";
      $('#modalConfirmLeave').modal('show');
  });
  $(document).on('click', '#paymenthistory', function(){
      route="/brand/paymenthistory";
      $('#modalConfirmLeave').modal('show');
  });
  $(document).on('click', '#notification', function(){
      route="/brand/notifs";
      $('#modalConfirmLeave').modal('show');
  });

  $(document).on('click', '#logoutleave', function(){
      route="/logout/<?php echo e($currentAccount->Account_AccessLevel); ?>";
      $('#modalConfirmLeave').modal('show');
  });


//   $("#BtnDelete").click(function(){
//     $(this).data('clicked', true);
// });

//   if($('#BtnDelete').data('clicked')) {
//     // do nothing
// }

// else{
//   window.onbeforeunload = function() {
//         return "Dude, are you sure you want to leave? Think of the kittens!";
//     }

// }


// end confirm leave dessa 2018-0925

                            $(document).on('click', '#ReserveButton', function(){
                              id = $(this).data('id');
                              $('#ReserveStallID').val($(this).data('id'));
                              $('#ReserveRent').val($(this).data('rentalcost'));
                              $('#ReserveBooking').val($(this).data('bookingcost'));
                              $('#ReserveType').val($(this).data('type'));
                              $('#ReserveStatus').val($(this).data('status'));

                              if($(this).data('status')!="Available"){
                                $('#Reserve').prop("disabled",true);
                              }
                              else{
                                $('#Reserve').prop("disabled",false);
                              }

                              if($(this).data('reservationid')==<?php echo e(Session::get('ReservationID')); ?>){
                                  $('#Reserve').hide();
                                  $('#Cancel').show();
                              }
                              else{
                                  $('#Cancel').hide();
                                  $('#Reserve').show();
                              }

                            $('#ModalReserve').modal('show');
                            });

                            $('.modal-footer').on('click','#Reserve',function() {
                                          $.ajax({
                                            type: 'POST',
                                            url: '/brand/stalls',
                                            data: {
                                              '_token': $('input[name=_token]').val(),
                                              'id': $('#ReserveStallID').val(),
                                              'rent': $('#ReserveRent').val(),
                                              'booking': $('#ReserveBooking').val(),
                                              'brandID': brandID
                                            },
                                            success: function(response){
                                              toastr.success('Successfully reserve stall!','Success Alert', {timeOut: 5000});
                                              $('#ReservedStallTable').prepend("<tr id='ReservedStall"+ response.PK_StallID+"'><td>" + response.PK_StallID + "</td><td>" + response.Stall_RentalCost + "</td><td>" + response.Stall_BookingCost + "</td><td>" + response.Stall_Type + "</td><td>" + response.Stall_Status + "</td></tr>");
                                                $( "button[data-id='" + response.PK_StallID + "']" ).removeClass("Available").addClass("TemporarilyReserved");
                                                $( "button[data-id='" + response.PK_StallID + "']" ).data("status","TemporarilyReserved");
                                                $( "button[data-id='" + response.PK_StallID + "']" ).data("reservationid", response.FK_ReservationID);
                                            }
                                          });
                            });

                            $('.modal-footer').on('click','#Cancel',function() {
                                          $.ajax({
                                            type: 'POST',
                                            url: '/brand/stalls/cancel',
                                            data: {
                                              '_token': $('input[name=_token]').val(),
                                              'id': $('#ReserveStallID').val(),
                                              'rent': $('#ReserveRent').val(),
                                              'booking': $('#ReserveBooking').val(),
                                              'brandID': brandID
                                            },
                                            success: function(response){
                                              toastr.warning('Successfully Cancelled stall!','Success Alert', {timeOut: 5000});
                                              $('#ReservedStallTable').prepend("<tr id='ReservedStall" + response.PK_StallID + "'><td>" + response.PK_StallID + "</td><td>" + response.Stall_RentalCost + "</td><td>" + response.Stall_BookingCost + "</td><td>" + response.Stall_Type + "</td><td>" + response.Stall_Status + "</td></tr>");
                                                $( "button[data-id='" + response.PK_StallID + "']" ).removeClass("TemporarilyReserved").addClass("Available");
                                                $( "button[data-id='" + response.PK_StallID + "']" ).data("status","Available");
                                                $( "button[data-id='" + response.PK_StallID + "']" ).data("reservationid", response.FK_ReservationID);
                                            }
                                          });
                            });

                              $('.modal-footer').on('click', '#leavereservation', function(){
                                $.ajax({
                                  type: 'POST',
                                  url: 'reservations/cancel',
                                  data: {
                                    '_token': $('input[name=_token]').val(),
                                    'route': route,
                                  },
                                  success: function(response){
                                    window.location.href=response;
                                  }
                                });
                              });

                              $('.modal-footer').on('click', '#LogoutAndLeave', function(){
                                  route="/logout/<?php echo e($currentAccount->Account_AccessLevel); ?>";
                                  $.ajax({
                                    type: 'POST',
                                    url: 'reservations/cancel',
                                    data: {
                                      '_token': $('input[name=_token]').val(),
                                      'route': route,
                                    },
                                    success: function(response){
                                    window.location.href=response;
                                    }
                                  });
                              });

                      });
                </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>