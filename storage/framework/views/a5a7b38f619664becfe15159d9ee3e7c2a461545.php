<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>

	<form action="/admin/viewreport" target="_blank">
      <h3 class="sub-header subsett">Customize your report.</h3>
      <br>


        <h5 class="perrow"><div class="lbl">Report:</div>
			<select class="txtbox" name="TypeOfReport">
				<option>Revenue</option>
				<option>User Registration</option>
				<option>Stall Reservations</option>
			</select>
			</h5>
        <h5 class="perrow"><div class="lbl">Starting From:</div>    <input class="txtbox" type="date" name="StartDate"></h5>
        <h5 class="perrow"><div class="lbl">Until:</div>    <input class="txtbox" type="date" name="EndDate"> <div class="lbl" id="message"></div></h5>
      <br><br>
      		<button style = "background-color:red;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/dashboard">Back</a></button>
		  <input type="submit" class="btn btn-primary"  value="View Report" >
		  <br><br>
    </form>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br>


		</div>
        </div>
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>