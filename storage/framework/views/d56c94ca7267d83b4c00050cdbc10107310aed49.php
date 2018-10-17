<?php if(count($errors) > 0 ): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <script>
      toastr.warning("<?php echo e($error); ?>",'Error',{timeOut:5000});
  </script>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('status')): ?>
<script>
    toastr.warning("<?php echo e(session('status')); ?>",'Error',{timeOut:5000});
</script>
<?php endif; ?>

<?php if(session('good')): ?>
<script>
    toastr.success("<?php echo e(session('good')); ?>",'Success',{timeOut:5000});
</script>
<?php endif; ?>
