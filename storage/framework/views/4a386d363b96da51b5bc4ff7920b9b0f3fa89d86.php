<html>
<head>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Manila Sundance</title>

<script src="/js/error/jquery.min.js"></script>
<link rel="icon" href="/img/mslogo/MSLogo.png">
<!-- This link calls the css file from the public folder -->
<link href="/css/sign.css" rel="stylesheet">


<link href="/css/bootstrap4.min.css" rel="stylesheet">
<link href="/css/carousel.css" rel="stylesheet">

<?php if(request()->segment(0)=='' AND (request()->segment(1)=='signup' OR request()->segment(1)=='login')): ?>
    <link rel="stylesheet" href="css/sign/reset.min.css">
    <link rel="stylesheet" href="css/sign/style4.css">
<?php endif; ?>

<script  src="/js/error/bootsrap.min.js"></script>

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

<link href="/css/dashboard2.css" rel="stylesheet">
<?php endif; ?>


<?php if(request()->segment(0)=='brand' AND request()->segment(1)=='bazaars'): ?>
<link href="/css/brandbazaars.css" rel="stylesheet">
<?php endif; ?>

<?php if(request()->segment(2)=='calendar'): ?>
<link href='/css/fullcalendarr.min.css' rel='stylesheet' />
<link href='/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/js/moment.min.js'></script>
<script src='/js/fullcalendarjquery.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/chart.min.js'></script>

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
    background-color: #ffffa8;
    color:#F79391;
  }
  .fc-content {
    background-color: #F79391;
  }
</style>
<?php endif; ?>

<script>
window.Laravel = <?php echo json_encode([
  'csrfToken' => csrf_token(),
]); ?>;
</script>
<?php if((request()->segment(1)=='brand' AND request()->segment(2)=='settings') OR (request()->segment(1)=='admin' AND request()->segment(2)=='brandprofile')): ?>
<link href='/css/accountsettings.css' rel='stylesheet' />
<?php endif; ?>

<?php if((request()->segment(1)=='brand' AND request()->segment(2)=='stalls') OR (request()->segment(1)=='admin' AND request()->segment(2)=='manage_stalls')): ?>
<link href='/css/map.css' rel='stylesheet' />
<?php endif; ?>

<?php if(request()->segment(1)=='admin' AND request()->segment(2)=='reportform'): ?>
<link href='/css/accountsettings.css' rel='stylesheet' />
<?php endif; ?>

<link rel="stylesheet" type="text/css" href="/css/datatables.css">
<script type="text/javascript" charset="utf8" src="/js/datatables.js"></script>

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
  <?php elseif(request()->segment(0)=='' AND request()->segment(1)!='printbill' AND (request()->segment(1)!='signup' AND request()->segment(1)!='login')): ?>
    <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endif; ?>

<?php if(request()->segment(0)=='' AND (request()->segment(1)=='signup' OR request()->segment(1)=='login')): ?>
    <script src='js/sign/jquery.min.js'></script>
    <script src='js/sign/jquery.easing.min.js'></script>
    <script src="js/sign/index.js"></script>

    <script src="/js/bootstrap.min.js"></script>
<?php endif; ?>

  <script src="/js/dashboard.js"></script>


 <!-- start confirmLeave Dessa 2018-0925 -->

<!-- <?php if(request()->segment(1)=='brand' AND request()->segment(2)=='stalls'): ?>

  <script type="text/javascript"> -->
<!-- //   window.onbeforeunload = function() {
//     return "Hey, you're leaving the site. Bye!";
// };

// window.addEventListener('beforeunload', function (e) {
//   // Cancel the event as stated by the standard.
//   e.preventDefault();
//   // Chrome requires returnValue to be set.
//   e.returnValue = '';
// });

// window.onbeforeunload = function (e) {
//   alert("eyy");
// } -->

<!-- $(document).ready(function() {
  $('.leave').click(function() {
    $('modalConfirmLeave').show()
  })
}); -->

 <!--  </script>
 -->
          <!-- <div id = "modalConfirmLeave" class = "modal fade"  role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                        <h4 class ="modal-title"> Are you sure you want to leave? </h4>
                      </div>
                      <div class="modal-body">
                        <form style="text-align:center">

                          <div class = "form-group">
                            <label> Reservation process is not yet done. If you leave now, no reservation data will be saved.</label>
                          </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-default" data-dismiss = "modal"> LEAVE </button>
                        <button type ="button" class = "btn btn-default" data-dismiss = "modal"> STAY </button>
                      </div>
                    </div>
              </div>
            </div> -->

<!-- <?php endif; ?> -->

 <!-- end confirmLeave Dessa 2018-0925 -->

  </body>
</html>
