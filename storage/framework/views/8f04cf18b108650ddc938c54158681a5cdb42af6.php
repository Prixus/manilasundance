<?php $__env->startSection('content'); ?>
<div style="margin:50px;">
<h2 class="sub-header">Manila Sundance</h2>
      <h4>Fashion Events</h4>
      
      <br>
        <h5>Address:    <label>________________________</label></h5>
        <h5>City, State, Zip:    <label>________________________</label></h5>
        <h5>Tel:    <label>________________________</label></h5>
        <h5>Fax:    <label>________________________</label></h5>
        <h5>Website:    <label>________________________</label></h5> 
      <br>
      <div>
      <br>
      <br>
      <h5>Billing Party</h5>
        <h5>Company:    <label>________________________</label></h5>
        <h5>Name:    <label>________________________</label></h5>
        <h5>Address Line 1:    <label>________________________</label></h5>
        <h5>Address Line 2:    <label>________________________</label></h5>
        <h5>City, State, Zip:    <label>________________________</label></h5>
        <h5>Tel:    <label>________________________</label></h5>
        <h5>Fax:    <label>________________________</label></h5>
        <h5>Website:    <label>________________________</label></h5> 
      <br>
      </div>
        
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
                  <th></th>
                  <th>Total Stall Rental Fee:</th>
                  <th>50000</th>
                </tr>
        <tr>
                  <th></th>
                  <th>Reservation Fee:</th>
                  <th>25000</th>
                </tr>
        <tr>
                  <th></th>
                  <th>Subtotal Cost:</th>
                  <th>75000</th>
                </tr>
        <tr>
                  <th></th>
                  <th>Subtotal Discount::</th>
                  <th>5000</th>
                </tr>
        <tr>
                  <th></th>
                  <th>Total Amount::</th>
                  <th>70000</th>
                </tr>
              </tbody>
            </table>
          </div>
      <br><br><br><br>
      <label>Thank you for staying with us!</label>
      
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>