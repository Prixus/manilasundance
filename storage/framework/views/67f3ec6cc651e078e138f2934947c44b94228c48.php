<?php $__env->startSection('content'); ?>

<h2 style = "margin-left: 65px;color:#3ce1e0;font-weight:bold;">Brands</h2>
<hr class="featurette-divider" style = "background-color:#ccc5c5;margin:3px;margin-left: 5%;height:1px;width:90%;">
<br>
<section id ="boxes">
            <div class ="brandscontainer" >

                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class='brandsbox'>
                        <h5><?php echo e($brand->GuestBrand_Name); ?></h5>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
</section>


<br> <br>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>