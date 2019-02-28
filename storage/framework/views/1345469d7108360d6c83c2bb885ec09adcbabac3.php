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
      <h2>Monthly Revenue</h2>
    <div class="table-responsive">
  <table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

      <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
        <tr>
  <th>Month</th>
  <th>Year</th>
  <th>Amount To Collect</th>
  <th>Amount Collected</th>
  <th>Total Revenue</th>
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $accountRevenue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
             $monthnum =$revenue->months;
             $dateObj = DateTime::createFromFormat('!m',$monthnum);
             $monthname = $dateObj->format('F');
             ?>
        <tr>
        <td><?php echo e($monthname); ?></td>
        <td><?php echo e(now()->year); ?></td>
        <td style = "color:red"><?php echo e($revenue->TotalAmountToBePaid); ?></td>
        <td style = "color:green"><?php echo e($revenue->TotalAmountPaid); ?></td>
        <td><?php echo e($revenue->TotalRevenue); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($accountAnnualRevenue->TotalAmountToBePaid != NULL): ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td style="color:red;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalAmountToBePaid); ?></td>
        <td style="color:green;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalAmountPaid); ?></td>
        <td style="color:black;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalRevenue); ?></td>
        </tr>
        <?php else: ?>
        <tr>
        <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
        <td style="color:red;font-size: 1.3em">0.00</td>
        <td style="color:green;font-size: 1.3em">0.00</td>
        <td style="color:black;font-size: 1.3em">0.00</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
<br><br><br>


<div class="container-fluid">
    <h2>Monthly Revenue per Bazaar</h2>
  <div class="table-responsive">
<table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

    <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
      <tr>
<th>Month</th>
<th>Year</th>
<th>Bazaar Name</th>
<th>Amount To Collect</th>
<th>Amount Collected</th>
<th>Total Revenue</th>
      </tr>
    </thead>

    <?php $__currentLoopData = $accountRevenuePerBazaar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
         $monthnum =$revenue->months;
         $dateObj = DateTime::createFromFormat('!m',$monthnum);
         $monthname = $dateObj->format('F');
         ?>
        <tr>
        <td><?php echo e($monthname); ?></td>
        <td><?php echo e(now()->year); ?></td>
        <td><?php echo e($revenue->BazaarName); ?></td>
        <td style = "color:red"><?php echo e($revenue->TotalAmountToBePaid); ?></td>
        <td style = "color:green"><?php echo e($revenue->TotalAmountPaid); ?></td>
        <td><?php echo e($revenue->TotalRevenue); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php if($accountAnnualRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td></td>
      <td style="color:red;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalAmountToBePaid); ?></td>
      <td style="color:green;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalAmountPaid); ?></td>
      <td style="color:black;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td></td>
      <td style="color:red;font-size: 1.3em">0.00</td>
      <td style="color:green;font-size: 1.3em">0.00</td>
      <td style="color:black;font-size: 1.3em">0.00</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>

<div class="container-fluid">
    <h2>Quarterly Revenue</h2>
  <div class="table-responsive">
<table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

    <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
      <tr>
  <th>Quarter</th>
  <th>Year</th>
  <th>Amount To Collect</th>
  <th>Amount Collected</th>
  <th>Total Revenue</th>
      </tr>
    </thead>
    <tbody>
      <?php if($accountFirstQuarterRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td>First Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red"><?php echo e($accountFirstQuarterRevenue->TotalAmountToBePaid); ?></td>
      <td style = "color:green"><?php echo e($accountFirstQuarterRevenue->TotalAmountPaid); ?></td>
      <td><?php echo e($accountFirstQuarterRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>First Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red">0.00</td>
      <td style = "color:green">0.00</td>
      <td>0.00</td>
      </tr>
      <?php endif; ?>

      <?php if($accountSecondQuarterRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td>Second Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red"><?php echo e($accountSecondQuarterRevenue->TotalAmountToBePaid); ?></td>
      <td style = "color:green"><?php echo e($accountSecondQuarterRevenue->TotalAmountPaid); ?></td>
      <td><?php echo e($accountSecondQuarterRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Second Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red">0.00</td>
      <td style = "color:green">0.00</td>
      <td>0.00</td>
      </tr>
      <?php endif; ?>

      <?php if($accountThirdQuarterRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td>Third Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red"><?php echo e($accountThirdQuarterRevenue->TotalAmountToBePaid); ?></td>
      <td style = "color:green"><?php echo e($accountThirdQuarterRevenue->TotalAmountPaid); ?></td>
      <td><?php echo e($accountThirdQuarterRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Third Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red">0.00</td>
      <td style = "color:green">0.00</td>
      <td>0.00</td>
      </tr>
      <?php endif; ?>

      <?php if($accountFourthQuarterRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td>Fourth Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red"><?php echo e($accountFourthQuarterRevenue->TotalAmountToBePaid); ?></td>
      <td style = "color:green"><?php echo e($accountFourthQuarterRevenue->TotalAmountPaid); ?></td>
      <td><?php echo e($accountFourthQuarterRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Fourth Quarter</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red">0.00</td>
      <td style = "color:green">0.00</td>
      <td>0.00</td>
      </tr>
      <?php endif; ?>
      <?php if($accountAnnualRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td style="color:red;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalAmountToBePaid); ?></td>
      <td style="color:green;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalAmountPaid); ?></td>
      <td style="color:black;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td style="color:red;font-size: 1.3em">0.00</td>
      <td style="color:green;font-size: 1.3em">0.00</td>
      <td style="color:black;font-size: 1.3em">0.00</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>

<div class="container-fluid">
    <h2>SemiAnnual Revenue</h2>
  <div class="table-responsive">
<table class="table table-striped" style = "width:100%; border-top:3px solid #3CE1E0">

    <thead style = "width:100%; border-bottom:3px solid #3CE1E0">
      <tr>
<th>Annual</th>
<th>Year</th>
<th>Amount To Collect</th>
<th>Amount Collected</th>
<th>Total Revenue</th>
      </tr>
    </thead>
    <tbody>


      <?php if($accountFirstSemiAnnualRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td>First Semi-Annual</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red"><?php echo e($accountFirstSemiAnnualRevenue->TotalAmountToBePaid); ?></td>
      <td style = "color:green"><?php echo e($accountFirstSemiAnnualRevenue->TotalAmountPaid); ?></td>
      <td><?php echo e($accountFirstSemiAnnualRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>First Semi-Annual</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red">0.00</td>
      <td style = "color:green">0.00</td>
      <td>0.00</td>
      </tr>
      <?php endif; ?>

      <?php if($accountSecondSemiAnnualRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td>Second Semi-Annual</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red"><?php echo e($accountSecondSemiAnnualRevenue->TotalAmountToBePaid); ?></td>
      <td style = "color:green"><?php echo e($accountSecondSemiAnnualRevenue->TotalAmountPaid); ?></td>
      <td><?php echo e($accountSecondSemiAnnualRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td>Second Semi-Annual</td>
      <td><?php echo e(now()->year); ?></td>
      <td style = "color:red">0.00</td>
      <td style = "color:green">0.00</td>
      <td>0.00</td>
      </tr>
      <?php endif; ?>
      <?php if($accountAnnualRevenue->TotalAmountToBePaid != NULL): ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td style="color:red;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalAmountToBePaid); ?></td>
      <td style="color:green;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalAmountPaid); ?></td>
      <td style="color:black;font-size: 1.3em"><?php echo e($accountAnnualRevenue->TotalRevenue); ?></td>
      </tr>
      <?php else: ?>
      <tr>
      <td style="color:blue;font-size: 1.3em">Annual Revenue</td>
      <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
      <td style="color:red;font-size: 1.3em">0.00</td>
      <td style="color:green;font-size: 1.3em">0.00</td>
      <td style="color:black;font-size: 1.3em">0.00</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>

</body>
</html>
