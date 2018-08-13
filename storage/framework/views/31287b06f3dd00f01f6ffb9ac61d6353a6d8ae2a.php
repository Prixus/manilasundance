<?php $__env->startSection('content'); ?>

<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<br><br>
        <div id='calendar'></div>
        <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '2018-03-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                title: 'All Day Event',
                start: '2018-03-01',
                },
                {
                title: 'Long Event',
                start: '2018-03-07',
                end: '2018-03-10'
                },
                {
                id: 999,
                title: 'Repeating Event',
                start: '2018-03-09T16:00:00'
                },
                {
                id: 999,
                title: 'Repeating Event',
                start: '2018-03-16T16:00:00'
                },
                {
                title: 'Conference',
                start: '2018-03-11',
                end: '2018-03-13'
                },
                {
                title: 'Meeting',
                start: '2018-03-12T10:30:00',
                end: '2018-03-12T12:30:00'
                },
                {
                title: 'Lunch',
                start: '2018-03-12T12:00:00'
                },
                {
                title: 'Meeting',
                start: '2018-03-12T14:30:00'
                },
                {
                title: 'Happy Hour',
                start: '2018-03-12T17:30:00'
                },
                {
                title: 'Dinner',
                start: '2018-03-12T20:00:00'
                },
                {
                title: 'Birthday Party',
                start: '2018-03-13T07:00:00'
                },
                {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2018-03-28'
                }
            ]
            });

        });

        </script>
<br><br>

</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>