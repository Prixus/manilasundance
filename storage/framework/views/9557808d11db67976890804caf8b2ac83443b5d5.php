<?php $__env->startSection('sidebar-brand'); ?>

<?php if(request()->segment(1)=='brand' AND request()->segment(2)=='stalls' AND request()->segment(3)!='viewbill'): ?>
      <!-- top navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <img style="width:30px;height:30px;margin-top:10px;margin-right:10px;float:left;" src="/img/mslogo/mslogo.png" alt="Manila Sundance Logo">
                <a class="navbar-brand">Manila Sundance</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li class="leave"><a href="#">Logout</a></li>
                </ul>

              </div>
            </div>
          </nav>

      <!-- side navigation -->

              <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                  <li style = "background-color:rgb(153, 237, 199);">
                  <!-- Sidebar user panel -->
                    <div class="user-panel">
                      <div class="pull-left image">
                        <img onerror="this.src='/img/users/profilepicture.jpg'" src="/<?php echo e($currentAccount->Account_ProfilePicture); ?>" class="img-circle" alt="User Image">
                      </div>
                      <div class="pull-left info">
                      <p style = "color:black;"><?php echo e($currentAccount->Account_UserName); ?></p>
                      <p style = "font-size:12px;color:teal;"><?php echo e($currentAccount->Account_AccessLevel); ?></p>
                      </div>
                    </div>
                  </li>
                  <li class="active leave"><a href="#">Bazaars</a></li>
                  <li class="leave"><a href="#">Reservations</a></li>
                  <li class="leave"><a href="#">Billing</a></li>
                  <li class="leave"><a href="#">Products</a></li>
                  <li class="leave"><a href="#">Calendar</a></li>
                  <li class="leave"><a href="#">Account Settings</a></li>
                  <li class="leave"><a href="#">Payment History</a></li>

                  <li class="leave"><a href="#">Notifications <?php if($currentAccount->unreadNotifications->count() > 0): ?><span style="float:right;"
                      class="badge alert-danger"><?php echo e($currentAccount->unreadNotifications->count()); ?></a></li>
                  <?php else: ?>
                  </a></li>
                  <?php endif; ?>


                </ul>


              </div>

      <!-- This will call the child of the sidebar that varies on the page. it may or may not have child -->

<?php else: ?>
      <!-- top navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <img style="width:30px;height:30px;margin-top:10px;margin-right:10px;float:left;" src="/img/mslogo/mslogo.png" alt="Manila Sundance Logo">
                <a class="navbar-brand" href="#">Manila Sundance</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="/logout/<?php echo e($currentAccount->Account_AccessLevel); ?>">Logout</a></li>
                </ul>
              </div>
            </div>
          </nav>

      <!-- side navigation -->

              <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                  <li style = "background-color:rgb(153, 237, 199);">
                  <!-- Sidebar user panel -->
                    <div class="user-panel">
                      <div class="pull-left image">
                        <img onerror="this.src='/img/users/profilepicture.jpg'" src="/<?php echo e($currentAccount->Account_ProfilePicture); ?>" class="img-circle" alt="User Image">
                			</div>
              				<div class="pull-left info">
              				<p style = "color:black;"><?php echo e($currentAccount->Account_UserName); ?></p>
              				<p style = "font-size:12px;color:teal;"><?php echo e($currentAccount->Account_AccessLevel); ?></p>
              				</div>
                    </div>
                  </li>
                  <li <?php if(request()->segment(1)=='brand' AND (request()->segment(2)=='bazaars' OR request()->segment(2)=='bazaar' OR request()->segment(2)=='stalls')): ?> class="active" <?php endif; ?> ><a href="/brand/bazaars">Bazaars</a></li>
                  <li <?php if(request()->segment(1)=='brand' AND (request()->segment(2)=='reservations' OR request()->segment(2)=='update_payment')): ?> class="active" <?php endif; ?> ><a href="/brand/reservations">Reservations</a></li>
                  <li <?php if(request()->segment(1)=='brand' AND (request()->segment(2)=='billing' OR request()->segment(2)=='bill')): ?> class="active" <?php endif; ?> ><a href="/brand/billing">Billing</a></li>
                  <li <?php if(request()->segment(1)=='brand' AND request()->segment(2)=='products'): ?> class="active" <?php endif; ?> ><a href="/brand/products">Products</a></li>
                  <li <?php if(request()->segment(1)=='brand' AND request()->segment(2)=='calendar'): ?> class="active" <?php endif; ?> ><a href="/brand/calendar">Calendar</a></li>
                  <li <?php if(request()->segment(1)=='brand' AND request()->segment(2)=='settings'): ?> class="active" <?php endif; ?> ><a href="/brand/settings">Account Settings</a></li>
                  <li <?php if(request()->segment(1)=='brand' AND request()->segment(2)=='paymenthistory'): ?> class="active" <?php endif; ?> ><a href="/brand/paymenthistory">Payment History</a></li>


                  <li <?php if(request()->segment(1)=='brand' AND request()->segment(2)=='notifs'): ?> class="active" <?php endif; ?> ><a href="/brand/notifs">Notifications <?php if($currentAccount->unreadNotifications->count() > 0): ?><span style="float:right;"
                      class="badge alert-danger"><?php echo e($currentAccount->unreadNotifications->count()); ?></a></li>
                  <?php else: ?>
                  </a></li>
                  <?php endif; ?>


                </ul>


              </div>

      <!-- This will call the child of the sidebar that varies on the page. it may or may not have child -->

<?php endif; ?>

<?php echo $__env->yieldSection(); ?>
