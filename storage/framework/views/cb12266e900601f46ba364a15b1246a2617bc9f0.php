<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>





          <table class="table table-striped">
          <h2 class="sub-header">Monthly Reservations<div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
              <thead>
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
              </tbody>
            </table>

            <table class="table table-striped">
              <thead>
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
              </tbody>
            </table>

            <table class="table table-striped">
            <h2 class="sub-header">Monthly Reservations per Bazaar<div style = "float:right;font-size:14px;">
                <thead>
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
                </tbody>
              </table>

              <table class="table table-striped">
                  <thead>
                    <tr>
              <th>Month</th>
              <th>Year</th>
              <th>Bazaar Name</th>
              <th>Total Void Reservations</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $reservationsVoidPerBazaar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                         $monthnum =$reservation->months;
                         $dateObj = DateTime::createFromFormat('!m',$monthnum);
                         $monthname = $dateObj->format('F');
                         ?>
                    <tr>
                    <td><?php echo e($monthname); ?></td>
                    <td><?php echo e(now()->year); ?></td>
                    <td><?php echo e($reservation->BazaarName); ?></td>
                    <td><?php echo e($reservation->VoidReservations); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>



            <table class="table table-striped">
              <thead>
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
              </tbody>
            </table>



            <button style = "background-color:green;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/detailedreservations/print" target="_blank">Print</a></button>
          <button style = "background-color:#337ab7;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>

		</div>
        </div>
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>