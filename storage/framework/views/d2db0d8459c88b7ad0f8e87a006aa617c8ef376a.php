<?php $__env->startSection('sidebar-admin'); ?>

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
          <img src="/img/users/admin.jpg" class="img-circle" alt="User Image">
  			</div>
				<div class="pull-left info">
				<p style = "color:black;"><?php echo e($currentAccount->Account_UserName); ?></p>
				<p style = "font-size:12px;color:teal;"><?php echo e($currentAccount->Account_AccessLevel); ?></p>
				</div>
				</div>
			</li>
      <li <?php if(request()->segment(1)=='admin' AND (request()->segment(2)=='dashboard' OR request()->segment(2)=="reportform" OR request()->segment(2)=="viewreport")): ?> class="active" <?php endif; ?> ><a href="/admin/dashboard">Dashboard</a></li>
      <li <?php if(request()->segment(1)=='admin' AND (request()->segment(2)=='accounts' OR request()->segment(2)=='brandprofile')): ?> class="active" <?php endif; ?> ><a href="/admin/accounts">Accounts</a></li>
      <li <?php if(request()->segment(1)=='admin' AND (request()->segment(2)=='bazaar' OR request()->segment(2)=='manage_stalls')): ?> class="active" <?php endif; ?> ><a href="/admin/bazaar">Bazaar</a></li>
      <li <?php if(request()->segment(1)=='admin' AND request()->segment(2)=='penalties'): ?> class="active" <?php endif; ?> ><a href="/admin/penalties">Penalties</a></li>
     <!--  <li <?php if(request()->segment(1)=='admin' AND request()->segment(2)=='discounts'): ?> class="active" <?php endif; ?> ><a href="/admin/discounts">Discounts</a></li> -->
      <li <?php if(request()->segment(1)=='admin' AND request()->segment(2)=='calendar'): ?> class="active" <?php endif; ?> ><a href="/admin/calendar">Calendar</a></li>
      <li <?php if(request()->segment(1)=='admin' AND request()->segment(2)=='billing'): ?> class="active" <?php endif; ?> ><a href="/admin/billing">Billing</a></li>
      <li <?php if(request()->segment(1)=='admin' AND (request()->segment(2)=='collection' OR request()->segment(2)=='bill')): ?> class="active" <?php endif; ?> ><a href="/admin/collection">Collection</a></li>
        </div>

<!-- This will call the child of the sidebar that varies on the page. it may or may not have child -->
<?php echo $__env->yieldSection(); ?>
