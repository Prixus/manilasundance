<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Manila Sundance</h2>
		  <h4>Fashion Events</h4>
		  <br>
		  <div style = "float:right;">
			  <h5>Bill Number:   <label>1001-0012</label></h5>
			  <h5>Datetime:   <label>01-11-17 11:11:11</label></h5>
			  <h5>Expiration:   <label>09-30-17 23:59:59</label></h5>
			  </div>
		  <br>
		  <label>Bill By:</label>
		  <br>
			  <h5>Account Number:    <label>1002-0992-1902</label></h5>
			  <h5>Account Name:    <label>Jennica Adena</label></h5>
			  <h5>Contact Number:    <label>09111111111</label></h5>

			   <br>
			  <label>Bill To:</label>
			  <br>
			  <h5>TIN Number:    <label>98789685451</label></h5>
			  <h5>Brand Name:    <label>Thrift Apparel</label></h5>
			  <h5>Owner's Name:    <label>Sheena Azucena</label></h5>

		  <br>

				<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Bazaar Name</th>
                  <th>Stall Number</th>
                  <th>Stall Fee</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Summer Sale 2018</td>
                  <td>stl-1001</td>
                  <td>16000</td>
                </tr>
                <tr>
                  <td>Valentine Sale 2018</td>
                  <td>stl-1414</td>
                  <td>18000</td>
                </tr>
                <tr>
                  <td>New Year Sale 2018</td>
                  <td>stl-1111</td>
                  <td>16000</td>
                </tr>
				<tr>
                  <th>Total Stall Rental Fee:</th>
                  <th>-</th>
                  <th>50000</th>
                </tr>
              </tbody>
            </table>
          </div>
				<br>
			  <h5>Stall Rental Fee:    <label>50000</label></h5>
			  <h5>Reservation Fee:    <label>25000</label></h5>
			  <h5>Subtotal Cost:    <label>75000</label></h5>
			  <h5>Subtotal Discount:    <label>5000</label></h5>
			  <br>
			  <h4><label>Total Amount:    70000</label></h4>

		  <br><br>
		  <div>
		  <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/admin/collection">Back</a></button>
		  <button style = "background-color:green;float:right;" type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false"><a href = "#" >Print</a></button>
		  </div>
        </div>

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>