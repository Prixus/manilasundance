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
