<?php $__env->startSection('content'); ?>

<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<h2 class="sub-header">Reserve Stalls</h2>
<br><br>
<center>
<img src='/<?php echo e($StallMap->Bazaar_StallMap); ?>' width = "600">
</center>
<br><br>
<h2 class="sub-header">Available Stalls<div style = "float:right;font-size:14px;">
<input type = "text" placeholder = "Search...">
<button class = "btnSearch">GO</button>
</div>
</h2>

        <table class="table table-striped" id="StallTable">
              <thead>
                <tr>
                  <th>Stall ID</th>
                  <th>Stall Rental Cost</th>
                  <th>Stall Booking Cost</th>
                  <th>Stall Type</th>
                  <th>Stall Status</th>
                </tr>
                <?php echo e(csrf_field()); ?>

              </thead>

              <tbody>
              <?php $__currentLoopData = $BazaarStalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BazaarStall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="Stall<?php echo e($BazaarStall->PK_StallID); ?>">
                  <td><?php echo e($BazaarStall->PK_StallID); ?></td>
                  <td><?php echo e($BazaarStall->Stall_RentalCost); ?></td>
                  <td><?php echo e($BazaarStall->Stall_BookingCost); ?></td>
                  <td><?php echo e($BazaarStall->Stall_Type); ?></td>
                  <td><?php echo e($BazaarStall->Stall_Status); ?></td>
				  <td><button id = "ReserveButton" style = "background-color:#337ab7;margin-left:5px;" type="button" class="btn btn-primary" data-id="<?php echo e($BazaarStall->PK_StallID); ?>" data-rentalcost="<?php echo e($BazaarStall->Stall_RentalCost); ?>" data-bookingcost = "<?php echo e($BazaarStall->Stall_BookingCost); ?>" data-type="<?php echo e($BazaarStall->Stall_Type); ?>" data-status="<?php echo e($BazaarStall->Stall_Status); ?>">Reserve</button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($BazaarStalls->links()); ?>

              </tbody>
            </table>

            <br><br>

            <br><br>            <br><br>

            <h2 class="sub-header">Your Reserved Stalls</h2>

                    <table class="table table-striped" id="ReservedStallTable">
                          <thead>
                            <tr>
                              <th>Stall ID</th>
                              <th>Stall Rental Cost</th>
                              <th>Stall Booking Cost</th>
                              <th>Stall Type</th>
                              <th>Stall Status</th>
                            </tr>
                            <?php echo e(csrf_field()); ?>

                          </thead>

                          <tbody>
                          <?php $__currentLoopData = $ReservedStalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ReservedStall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="ReservedStall<?php echo e($ReservedStall->PK_StallID); ?>">
                              <td><?php echo e($ReservedStall->PK_StallID); ?></td>
                              <td><?php echo e($ReservedStall->Stall_RentalCost); ?></td>
                              <td><?php echo e($ReservedStall->Stall_BookingCost); ?></td>
                              <td><?php echo e($ReservedStall->Stall_Type); ?></td>
                              <td><?php echo e($ReservedStall->Stall_Status); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
</div>
</div>
</div>

              <button id = "BtnDelete" style = "background-color:#337ab7;margin-left:5px;" type="button" class="btn btn-primary"><a href = "/brand/stalls/viewbill">View Bill</a></button>
            <!-- This is the Modal that will be called to show the reservation info -->
              <div class = "modal fade" id = "ModalReserve" role = "dialog">
                <div class = "modal-dialog">

                  <div class="modal-content">
                    <div class = "modal-header">
                      <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                            <h4 class ="modal-title"> Reservation</h4>
                          </div>
                          <div class="modal-body">
                              <form  style="text-align:center">
                              <div class = "form-group">
                                <label> Stall ID: </label>
                                <input type="text" name ="txtProductName"  id="ReserveStallID" disabled>
                              </div>
                              <div class = "form-group">
                                <label> Stall Rental Cost</label>
                                <input type="number" name ="txtStallRent" id="ReserveRent" disabled>
                              </div>

                              <div class="form-group">
                                <label> Stall Booking Cost </label>
                                <input type="text" name="txtStallBooking" id="ReserveBooking" disabled>
                              </div>
                              <div class = "form-group">
                                <label> Stall Type <label>
                                <input type="text" name="txtStallType" id="ReserveType" disabled>
                              </div>
                              <div class ="form-group">
                                <label> Stall Status <label>
                                <input type="text" name="txtStallStatus" id="ReserveStatus" disabled>
                              </div>
                          </form>
                          </div>
                          <div class = "modal-footer">
                            <button type ="button" class= "btn btn-success" data-dismiss="modal" id="Reserve">ADD </button>
                            <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                          </div>
                        </div>
                  </div>
                </div>


                <script type= "text/javascript">

                      var brandID = <?php echo e(Session::get('BrandID')); ?>;
                      $(document).ready(function()
                      {

                            $(document).on('click', '#ReserveButton', function(){
                              id = $(this).data('id');
                              $('#ReserveStallID').val($(this).data('id'));
                              $('#ReserveRent').val($(this).data('rentalcost'));
                              $('#ReserveBooking').val($(this).data('bookingcost'));
                              $('#ReserveType').val($(this).data('type'));
                              $('#ReserveStatus').val($(this).data('status'));

                            $('#ModalReserve').modal('show');
                            });

                            $('.modal-footer').on('click','#Reserve',function() {
                                          $.ajax({
                                            type: 'POST',
                                            url: '/brand/stalls',
                                            data: {
                                              '_token': $('input[name=_token]').val(),
                                              'id': $('#ReserveStallID').val(),
                                              'rent': $('#ReserveRent').val(),
                                              'booking': $('#ReserveBooking').val(),
                                              'brandID': brandID
                                            },
                                            success: function(response){
                                              toastr.success('Successfully reserve stall!','Success Alert', {timeOut: 5000});
                                              $('#ReservedStallTable').prepend("<tr id='ReservedStall"+ response.PK_StallID+"'><td>" + response.PK_StallID + "</td><td>" + response.Stall_RentalCost + "</td><td>" + response.Stall_BookingCost + "</td><td>" + response.Stall_Type + "</td><td>" + response.Stall_Status + "</td></tr>");
                                              $('#Stall'+ response.PK_StallID).remove();
                                            }
                                          });
                            });

                      });
                </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>