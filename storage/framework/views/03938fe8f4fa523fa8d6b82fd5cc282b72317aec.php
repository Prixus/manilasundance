<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>





          <table class="table table-striped">
          <h2 class="sub-header">Monthly Revenue<div style = "float:right;font-size:14px;">

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
              </tbody>
            </table>

            <table class="table table-striped">
            <h2 class="sub-header">Monthly Revenue<div style = "float:right;font-size:14px;">

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
                </tbody>
              </table>


          <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedrevenue/print" target="_blank">Print</a></button>
          <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>


		</div>
        </div>
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>