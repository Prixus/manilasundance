<?php $__env->startSection('content'); ?>

<h2 style = "margin-left: 65px;color:#3ce1e0;font-weight:bold;">Bazaars</h2>
<hr class="featurette-divider" style = "background-color:#ccc5c5;margin:3px;margin-left: 5%;height:1px;width:90%;">
<br>
<section id ="boxes">
            <div class ="container" >

                <?php $__currentLoopData = $bazaars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bazaar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class='box'>
                        <img id='samesize' src='<?php echo e($bazaar->Bazaar_EventPoster); ?>'>
                        <h4><?php echo e($bazaar->Bazaar_Name); ?></h4>
                        <p id="bazaarDesc"><?php echo e($bazaar->Bazaar_Description); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
</section>

<br><br>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>