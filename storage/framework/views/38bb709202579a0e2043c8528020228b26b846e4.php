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


  <div class="container-fluid">
      <h2>Monthly Reservations</h2>
    <div class="table-responsive">
  <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

      <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
          <tr>
        <th>Month</th>
        <th>Year</th>
        <th>Total Reservations</th>
          </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $reservationsCount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
               $monthnum =$reservation->months;
               $dateObj = DateTime::createFromFormat('!m',$monthnum);
               $monthname = $dateObj->format('F');
               ?>
          <tr>
          <td><?php echo e($monthname); ?></td>
          <td><?php echo e(now()->year); ?></td>
          <td><?php echo e($reservation->TotalReservation); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($AnnualreservationsCount != NULL): ?>
          <tr>
          <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
          <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
          <td style="color:black;font-size: 1.3em"><?php echo e($AnnualreservationsCount->TotalReservation); ?></td>
          </tr>
          <?php else: ?>
          <tr>
          <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
          <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
          <td>0</td>
          </tr>
          <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>




<div class="table-responsive">
    <h2>Void Reservations</h2>
<table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

  <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
    <tr>
   <th>Month</th>
   <th>Year</th>
   <th>Void Reservations</th>
    </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $reservationsVoid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Voidreservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
       $monthnum =$Voidreservation->months;
       $dateObj = DateTime::createFromFormat('!m',$monthnum);
       $monthname = $dateObj->format('F');
       ?>
  <tr>
    <td><?php echo e($monthname); ?></td>
    <td><?php echo e(now()->year); ?></td>
    <td><?php echo e($Voidreservation->VoidReservations); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($AnnualVoidreservationsCount->TotalReservation != NULL): ?>
    <tr>
    <td style="color:blue;font-size: 1.3em">Annual Void Reservations</td>
    <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
    <td style="color:black;font-size: 1.3em"><?php echo e($AnnualVoidreservationsCount->TotalReservation); ?></td>
    </tr>
    <?php else: ?>
    <tr>
    <td style="color:blue;font-size: 1.3em">Annual Void Reservations</td>
    <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
    <td>0</td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>
</div>


<div class="container-fluid">
    <h2>Monthly Reservations per Bazaar</h2>
  <div class="table-responsive">
<table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

    <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
      <th>Month</th>
      <th>Year</th>
      <th>Bazaar Name</th>
      <th>Total Reservations</th>
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $reservationsCountPerBazaar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
             $monthnum =$reservation->months;
             $dateObj = DateTime::createFromFormat('!m',$monthnum);
             $monthname = $dateObj->format('F');
             ?>
        <tr>
        <td><?php echo e($monthname); ?></td>
        <td><?php echo e(now()->year); ?></td>
        <td><?php echo e($reservation->BazaarName); ?></td>
        <td><?php echo e($reservation->TotalReservation); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($AnnualreservationsCount->TotalReservation != NULL): ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td></td>
        <td style="color:black;font-size: 1.3em"><?php echo e($AnnualreservationsCount->TotalReservation); ?></td>
        </tr>
        <?php else: ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td></td>
        <td>0</td>
        </tr>
        <?php endif; ?>
    </tbody>
  </table>
</div>
</div>



  <div class="container-fluid">
      <h2>Void Reservations per Bazaar</h2>
    <div class="table-responsive">
      <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

      <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
       <th>Month</th>
       <th>Year</th>
       <th>Bazaar Name</th>
       <th>Void Reservations</th>
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $reservationsVoidPerBazaar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Voidreservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
           $monthnum =$Voidreservation->months;
           $dateObj = DateTime::createFromFormat('!m',$monthnum);
           $monthname = $dateObj->format('F');
           ?>
      <tr>
        <td><?php echo e($monthname); ?></td>
        <td><?php echo e(now()->year); ?></td>
        <td><?php echo e($Voidreservation->BazaarName); ?></td>
        <td><?php echo e($Voidreservation->VoidReservations); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($AnnualVoidreservationsCount->TotalReservation != NULL): ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Void Reservations</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td></td>
        <td style="color:black;font-size: 1.3em"><?php echo e($AnnualVoidreservationsCount->TotalReservation); ?></td>
        </tr>
        <?php else: ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Void Reservations</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td></td>
        <td>0</td>
        </tr>
        <?php endif; ?>
      </tbody>
      </table>
    </div>
  </div>

  <div class="container-fluid">
      <h2>Number of Bazaars</h2>
    <div class="table-responsive">
      <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

      <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
          <th>Month</th>
          <th>Year</th>
          <th>Bazaar Count</th>
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $bazaarCount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bazaar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
             $monthnum =$bazaar->months;
             $dateObj = DateTime::createFromFormat('!m',$monthnum);
             $monthname = $dateObj->format('F');
             ?>
        <tr>
        <td><?php echo e($monthname); ?></td>
        <td><?php echo e(now()->year); ?></td>
        <td><?php echo e($bazaar->bazaarCount); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($bazaarAnnualCount != NULL): ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Bazaar Count</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td style="color:black;font-size: 1.3em"><?php echo e($bazaarAnnualCount->bazaarCount); ?></td>
        </tr>
        <?php else: ?>
        <?php endif; ?>
      </tbody>
      </table>
    </div>
  </div>


  <div class="container-fluid">
      <h2>Semi-Annual Reservations</h2>
    <div class="table-responsive">
  <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

      <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
  <th>Annual</th>
  <th>Year</th>
  <th>Total Reservations</th>
        </tr>
      </thead>
      <tbody>


        <?php if($FirstHalfAnnualReservationsCount->TotalReservation != NULL): ?>
        <tr>
        <td>First Semi-Annual Reservations</td>
        <td><?php echo e(now()->year); ?></td>
        <td><?php echo e($FirstHalfAnnualReservationsCount->TotalReservation); ?></td>
        </tr>
        <?php else: ?>
        <tr>
        <td>First Semi-Annual Reservations</td>
        <td><?php echo e(now()->year); ?></td>
        <td>0</td>
        </tr>
        <?php endif; ?>

        <?php if($SecondHalfAnnualReservationsCount->TotalReservation != NULL): ?>
        <tr>
        <td>Second Semi-Annual Reservations</td>
        <td><?php echo e(now()->year); ?></td>
        <td><?php echo e($SecondHalfAnnualReservationsCount->TotalReservation); ?></td>
        </tr>
        <?php else: ?>
        <tr>
        <td>Annual Reservations</td>
        <td><?php echo e(now()->year); ?></td>
        <td></td>
        <td>0</td>
        </tr>
        <?php endif; ?>

        <?php if($AnnualreservationsCount->TotalReservation != NULL): ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td style="color:black;font-size: 1.3em"><?php echo e($AnnualreservationsCount->TotalReservation); ?></td>
        </tr>
        <?php else: ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td></td>
        <td>0</td>
        </tr>
        <?php endif; ?>

      </tbody>
    </table>
  </div>
</div>

<div class="container-fluid">
    <h2>Quarterly Reservations</h2>
  <div class="table-responsive">
<table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

    <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
      <tr>
<th>Quarter</th>
<th>Year</th>
<th>Total Reservations</th>
      </tr>
    </thead>
    <tbody>


      <?php if($FirstQuarterReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>First Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($FirstQuarterReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>First Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($SecondQuarterReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>Second Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($SecondQuarterReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Second Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($ThirdQuarterReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>Third Quarter Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($ThirdQuarterReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Third Quarter </td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($FourthQuarterReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>Fourth Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($FourthQuarterReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Fourth Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($AnnualreservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td style="color:black;font-size: 1.3em"><?php echo e($AnnualreservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>


<div class="container-fluid">
    <h2>Semi-Annual Void Reservations</h2>
  <div class="table-responsive">
<table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

    <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
      <tr>
<th>Annual</th>
<th>Year</th>
<th>Total Reservations</th>
      </tr>
    </thead>
    <tbody>


      <?php if($FirstHalfVoidAnnualReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>First Semi-Annual Reservations</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($FirstHalfVoidAnnualReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>First Semi-Annual Reservations</td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($SecondHalfVoidAnnualReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>Second Semi-Annual Reservations</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($SecondHalfVoidAnnualReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Annual Reservations</td>
      <td><?php echo e(now()->year); ?></td>
      <td></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($AnnualVoidreservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td style="color:black;font-size: 1.3em"><?php echo e($AnnualVoidreservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td></td>
      <td>0</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>


<div class="container-fluid">
    <h2>Quarterly Void Reservations</h2>
  <div class="table-responsive">
<table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

    <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
      <tr>
<th>Quarter</th>
<th>Year</th>
<th>Total Reservations</th>
      </tr>
    </thead>
    <tbody>


      <?php if($FirstQuarterVoidReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>First Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($FirstQuarterVoidReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>First Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($SecondQuarterVoidReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>Second Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($SecondQuarterVoidReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Second Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($ThirdQuarterVoidReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>Third Quarter Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($ThirdQuarterVoidReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Third Quarter </td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($FourthQuarterVoidReservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td>Fourth Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td><?php echo e($FourthQuarterVoidReservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Fourth Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>

      <?php if($AnnualVoidreservationsCount->TotalReservation != NULL): ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td style="color:black;font-size: 1.3em"><?php echo e($AnnualVoidreservationsCount->TotalReservation); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Reservations</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td>0</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>

</body>
</html>
