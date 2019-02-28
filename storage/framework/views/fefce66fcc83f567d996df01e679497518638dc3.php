<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>
 <div><h2 class="sub-header">Monthly User Registrations<div style = "float:right;font-size:14px;"></div>
<button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print/monthly" target = "_blank">Print</a></button>
<button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#MonthlyRegistrations"></button>

          <div class="collapse out" id ="MonthlyRegistrations">
          <table class="table table-striped">
              <thead>
                <tr>
          <th>Month</th>
          <th>Year</th>
          <th>Total Accounts</th>
                </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $accountRegistration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                     $monthnum =$registration->months;
                     $dateObj = DateTime::createFromFormat('!m',$monthnum);
                     $monthname = $dateObj->format('F');
                     ?>
                <tr>
                <td><?php echo e($monthname); ?></td>
                <td><?php echo e(now()->year); ?></td>
                <td><?php echo e($registration->Users); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($AnnualRegistrations != NULL): ?>

                <tr>
                <td style="color:blue;font-size: 1.3em">Annual Registration</td>
                <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
                <td style="color:black;font-size: 1.3em"><?php echo e($AnnualRegistrations->Users); ?></td>
                </tr>
                  <?php else: ?>
                    <tr>
                  <td>Annual Registration</td>
                  <td><?php echo e(now()->year); ?></td>
                  <td>0</td>
                </tr>
                  <?php endif; ?>
              </tbody>
            </table>
          </div>
    </div>
        </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <div><h2 class="sub-header">Semi-Annual Registrations<div style = "float:right;font-size:14px;"></div>
        <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print/annually" target = "_blank">Print</a></button>
        <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#SemiAnnual"></button>

                  <div class="collapse out" id ="SemiAnnual">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                  <th>Month</th>
                  <th>Year</th>
                  <th>Total Accounts</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($FirstHalfAnnualRegistrations != NULL): ?>

                          <tr>
                          <td>First Semi-Annual </td>
                          <td><?php echo e(now()->year); ?></td>
                          <td><?php echo e($FirstHalfAnnualRegistrations->Users); ?></td>
                          </tr>
                          <?php else: ?>
                            <tr>
                          <td>First Semi-Annual</td>
                          <td><?php echo e(now()->year); ?></td>
                          <td>0</td>
                          </tr>
                          <?php endif; ?>

                          <?php if($SecondHalfAnnualRegistrations != NULL): ?>

                          <tr>
                          <td>Second Semi-Annual</td>
                          <td><?php echo e(now()->year); ?></td>
                          <td><?php echo e($SecondHalfAnnualRegistrations->Users); ?></td>
                          </tr>
                            <?php else: ?>
                              <tr>
                            <td>Second Semi-Annual</td>
                            <td><?php echo e(now()->year); ?></td>
                            <td>0</td>
                          </tr>
                            <?php endif; ?>
                        <?php if($AnnualRegistrations != NULL): ?>

                        <tr>
                        <td style="color:blue;font-size: 1.3em">Annual Registration</td>
                        <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
                        <td style="color:black;font-size: 1.3em"><?php echo e($AnnualRegistrations->Users); ?></td>
                        </tr>
                          <?php else: ?>
                            <tr>
                          <td>Annual Registration</td>
                          <td><?php echo e(now()->year); ?></td>
                          <td>0</td>
                        </tr>
                          <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
            </div>
                </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <div><h2 class="sub-header">Quarterly Registrations<div style = "float:right;font-size:14px;"></div>
                      <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print/quarterly" target = "_blank">Print</a></button>
          <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#QuarterlyRegistrations"></button>

          <div class="collapse out" id ="QuarterlyRegistrations">
                  <table class="table table-striped">


                      <thead>
                        <tr>
                  <th>Quarter</th>
                  <th>Year</th>
                  <th>Total Accounts</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if($FirstQuarterRegistrations != NULL): ?>

                        <tr>
                        <td>First Quarter</td>
                        <td><?php echo e(now()->year); ?></td>
                        <td><?php echo e($FirstQuarterRegistrations->Users); ?></td>
                        </tr>
                        <?php else: ?>
                          <tr>
                        <td>First Quarter</td>
                        <td><?php echo e(now()->year); ?></td>
                        <td>0</td>
                        </tr>
                        <?php endif; ?>

                        <?php if($SecondQuarterRegistrations != NULL): ?>

                        <tr>
                        <td>Second Quarter</td>
                        <td><?php echo e(now()->year); ?></td>
                        <td><?php echo e($SecondQuarterRegistrations->Users); ?></td>
                        </tr>
                          <?php else: ?>
                            <tr>
                          <td>Second Quarter</td>
                          <td><?php echo e(now()->year); ?></td>
                          <td>0</td>
                        </tr>
                          <?php endif; ?>

                          <?php if($ThirdQuarterRegistrations != NULL): ?>

                          <tr>
                          <td>Third Quarter</td>
                          <td><?php echo e(now()->year); ?></td>
                          <td><?php echo e($ThirdQuarterRegistrations->Users); ?></td>
                          </tr>
                            <?php else: ?>
                            <tr>
                            <td>Third Quarter</td>
                            <td><?php echo e(now()->year); ?></td>
                            <td>0</td>
                          </tr>
                            <?php endif; ?>

                            <?php if($FourthQuarterRegistrations != NULL): ?>

                            <tr>
                            <td>Fourth Quarter</td>
                            <td><?php echo e(now()->year); ?></td>
                            <td><?php echo e($FourthQuarterRegistrations->Users); ?></td>
                            </tr>
                              <?php else: ?>
                                <tr>
                              <td>Fourth Quarter</td>
                              <td><?php echo e(now()->year); ?></td>
                              <td>0</td>
                            </tr>
                              <?php endif; ?>

                              <?php if($AnnualRegistrations != NULL): ?>

                              <tr>
                              <td style="color:blue;font-size: 1.3em">Annual Registration</td>
                              <td style="color:black;font-size: 1.3em"><?php echo e(now()->year); ?></td>
                              <td style="color:black;font-size: 1.3em"><?php echo e($AnnualRegistrations->Users); ?></td>
                              </tr>
                                <?php else: ?>
                                  <tr>
                                <td>Annual Registration</td>
                                <td><?php echo e(now()->year); ?></td>
                                <td>0</td>
                              </tr>
                                <?php endif; ?>



                      </tbody>
                    </table>
                  </div>



            </div>
            <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>
            <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedregistrations/print" target = "_blank">Print All</a></button>
                </div>

      </div>
    </div>

    <script type="text/javascript">
    $(".btn[data-target='#QuarterlyRegistrations']").text('Expand');
    $(".btn[data-target='#QuarterlyRegistrations']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#QuarterlyRegistrations']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });

    $(".btn[data-target='#MonthlyRegistrations']").text('Expand');
    $(".btn[data-target='#MonthlyRegistrations']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#MonthlyRegistrations']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });

    $(".btn[data-target='#SemiAnnual']").text('Expand');
    $(".btn[data-target='#SemiAnnual']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#SemiAnnual']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>