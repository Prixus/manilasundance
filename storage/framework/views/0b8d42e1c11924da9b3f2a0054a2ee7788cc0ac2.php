<?php $__env->startSection('content'); ?>

<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<br>
        <div id='calendar' style="width:60%; height:60%;background-color: #ffffa8;margin-bottom: 0px;"></div>
        <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },

            defaultDate: Date('YYYY-DD-MM'),
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [

                <?php $__currentLoopData = $bazaars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bazaar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                _id:  '<?php echo e($bazaar->PK_BazaarID); ?>',
                title:  '<?php echo e($bazaar->Bazaar_Name); ?>',
                //url: '',
                start: '<?php echo e($bazaar->Bazaar_DateStart); ?>',
                end: '<?php echo e($bazaar->Bazaar_DateEnd); ?>T23:59:59'
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            ]
            });

        });

        </script>
<br><br><br><br><br><br>

</div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>