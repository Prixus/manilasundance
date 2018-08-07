<html>
<head>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Manila Sundance</title>
<link rel="icon" href="/img/mslogo/MSLogo.png">
<!-- This link calls the css file from the public folder -->
<link href="/css/sign.css" rel="stylesheet">
<link href="/css/bootstrappp.min.css" rel="stylesheet">
<link href="/css/carousel.css" rel="stylesheet">

<script src="/js/error/bootsrap.min.js"></script>
<script src="/js/error/jquery.min.js"></script>
<meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="stylesheet" href="/css/toastr.min.css">
  <script type="text/javascript" src="/js/toastr.min.js"></script>


<script src="/js/bootstrap.min.js"></script>

<?php if(request()->segment(0)=='' AND (request()->segment(1)=='bazaar' OR request()->segment(1)=='brands')): ?>
<link href="/css/bazaar.css" rel="stylesheet">
<?php endif; ?>

<?php if(request()->segment(1)=='admin' OR request()->segment(1)=='brand'): ?>
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/ionicons.min.css">
<link rel="stylesheet" href="/css/AdminLTE.min.css">
<link rel="stylesheet" href="/css/_all-skins.min.css">
<link rel="stylesheet" href="/css/bootstrap3-wysihtml5.min.css">

<link href="/css/dashboardd.css" rel="stylesheet">
<?php endif; ?>


<?php if(request()->segment(0)=='brand' AND request()->segment(1)=='bazaars'): ?>
<link href="/css/brandbazaars.css" rel="stylesheet">
<?php endif; ?>

<?php if(request()->segment(2)=='calendar'): ?>
<link href='/css/fullcalendar.min.css' rel='stylesheet' />
<link href='/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/js/moment.min.js'></script>
<script src='/js/fullcalendarjquery.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
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
<style>
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
    color:#F79391;
  }
  #calendar {
    max-width: 900px;
    margin: 0 auto;
    background-color: #E9F347;
    color:#F79391;
  }
  .fc-content {
    background-color: #F79391;
  }
</style>
<?php endif; ?>



</head>
<body>
  <?php if(request()->segment(1)=='admin'): ?>
    <?php echo $__env->make('includes.sidebar-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif(request()->segment(1)=='brand'): ?>
    <?php echo $__env->make('includes.sidebar-brand', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif(request()->segment(0)=='' AND request()->segment(1)!='printbill'): ?>
    <?php echo $__env->make('includes.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endif; ?>
  <div>
    <!--errors -->
      <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
  </div>

  <?php if(request()->segment(1)=='admin' OR request()->segment(1)=='brand'): ?>
  <?php elseif(request()->segment(0)=='' AND request()->segment(1)!='printbill'): ?>
    <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endif; ?>

  <script src="/js/dashboard.js"></script>

  </body>
</html>
