<?php $__env->startSection('content'); ?>

 <!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">

        <?php $__currentLoopData = $bazaars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bazaar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item active">
          <img class="first-slide" src="<?php echo e($bazaar->Bazaar_EventPoster); ?>" alt="Upcoming Bazaar">
        </div>
        <?php break; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $first=0; ?>

        <?php $__currentLoopData = $bazaars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bazaar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if ($first!=0) { ?>
        <div class="item">
          <img class="second-slide" src="<?php echo e($bazaar->Bazaar_EventPoster); ?>" alt="Upcoming Bazaar">
        </div>
        <?php } ?>
        <?php $first=1; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- end carousel -->

    <?php
    $top=1;
    $fst='';
    $snd='';
    $trd=''; ?>
    <?php $__currentLoopData = $bazaars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bazaar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($top > 3): ?>
        <?php break; ?>
      <?php elseif($top == 1): ?>
        <?php $fst='{{$bazaar->Bazaar_EventPoster}}'; ?>
      <?php elseif($top == 2): ?>
        <?php $snd='{{$bazaar->Bazaar_EventPoster}}'; ?>
      <?php elseif($top == 3): ?>
        <?php $trd='{{$bazaar->Bazaar_EventPoster}}'; ?>
      <?php endif; ?>
    <?php $top++; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <br><br>
<h1 style = "float:right;margin-right: 80px;color:#3ce1e0;font-weight:bold;">UPCOMING BAZAARS</h1>
<hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 5%;height:3px;width:90%;">
<br><br><br><br><br><br>

  <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->



      <!-- START THE FEATURETTES -->
      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block samesizefeat" data-src="/eventposter/(November 16 - November 19 2017).jpg" src="/eventposter/(November 16 - November 19 2017).jpg" data-holder-rendered="true">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block samesizefeat" data-src="/eventposter/1 (Aug 17-19 2018).jpg" src="/eventposter/1 (Aug 17-19 2018).jpg" data-holder-rendered="true">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block samesizefeat" data-src="/eventposter/(February 2 - February 4 2018).jpg" src="/eventposter/(February 2 - February 4 2018).jpg" data-holder-rendered="true">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>