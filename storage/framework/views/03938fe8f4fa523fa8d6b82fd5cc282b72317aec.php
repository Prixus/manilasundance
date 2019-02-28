<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>
 <div><h2 class="sub-header">Monthly Revenue<div style = "float:right;font-size:14px;"></div>
<button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print/monthly" target="_blank">Print</a></button>
<button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyRevenue"></button>

          <div class="collapse out" id ="MonthlyRevenue">
          <table class="table table-striped">
              <thead>
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
                <td style="color:green;font-size: 1.3em" >0.00</td>
                <td>0.00</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
		</div>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <div><h2 class="sub-header">Monthly Revenue per Bazaar<div style = "float:right;font-size:14px;"></div>
         <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print/monthlyperbazaar" target="_blank">Print</a></button>
         <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyRevenueperBazaaar"></button>

          <div class="collapse out" id ="MonthlyRevenueperBazaaar">
         <table class="table table-striped">


             <thead>
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
                </div>


      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div><h2 class="sub-header">Quarterly Revenue<div style = "float:right;font-size:14px;"></div>
       <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print/quarterly" target="_blank">Print</a></button>
       <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#QuarterlyRevenue"></button>

        <div class="collapse out" id ="QuarterlyRevenue">
        <table class="table table-striped">
                    <thead>
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
                      <td style="color:green;font-size: 1.3em" >0.00</td>
                      <td>0.00</td>
                      </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
      		</div>
              </div>

              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div><h2 class="sub-header">Semi-Annual Revenue<div style = "float:right;font-size:14px;"></div>
                   <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print/SemiAnnual" target="_blank">Print</a></button>
                  <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#SemiAnnualRevenue"></button>

                   <div class="collapse out" id ="SemiAnnualRevenue">
                <table class="table table-striped">
                            <thead>
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
                              <td style="color:green;font-size: 1.3em" >0.00</td>
                              <td>0.00</td>
                              </tr>
                              <?php endif; ?>
                            </tbody>
                          </table>



                      </div>
                  </div>
                                     <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print" target="_blank">Print all</a></button>
                  <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>
                      </div>
            </div>

<script type="text/javascript">
$(".btn[data-target='#MonthlyRevenue']").text('Expand');
$(".btn[data-target='#MonthlyRevenue']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyRevenue']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#MonthlyRevenueperBazaaar']").text('Expand');
$(".btn[data-target='#MonthlyRevenueperBazaaar']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#MonthlyRevenueperBazaaar']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#QuarterlyRevenue']").text('Expand');
$(".btn[data-target='#QuarterlyRevenue']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#QuarterlyRevenue']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

$(".btn[data-target='#SemiAnnualRevenue']").text('Expand');
$(".btn[data-target='#SemiAnnualRevenue']").click(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});
$(".btn[data-target='#SemiAnnualRevenue']").dblclick(function() {
    if ($(this).text() == 'Expand') {
        $(this).text('Collapse');
    } else {
        $(this).text('Expand');
    }
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>