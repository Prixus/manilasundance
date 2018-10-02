<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Discounts<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					</div>
					</h2>
                <button style = "background-color:#337ab7;" type="button" class="btn btn-primary" id="BtnAdd">Add Discount</button>
          <div class="table-responsive">
        <h2>

        </h2>

            <table id ="DiscountTable" class="table table-striped">
              <thead>
                <tr>
					<th>Discount ID</th>
					<th>Discount Name</th>
          <th>Discount Amount</th>
					<th>Description</th>
                </tr>
                <?php echo e(csrf_field()); ?>

              </thead>
              <tbody>
                <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="Discount<?php echo e($discount->PK_DiscountID); ?>">
					<td><?php echo e($discount->PK_DiscountID); ?></td>
					<td><?php echo e($discount->Discount_Name); ?></td>
					<td><?php echo e($discount->Discount_Requirements); ?></td>
          <td><?php echo e($discount->Discount_ValidDateStart); ?></td>
          <td><?php echo e($discount->Discount_ValidDateEnd); ?></td>
          <td><?php echo e($discount->Discount_ValidTimeStart); ?><td>
          <td><?php echo e($discount->Discount_ValidTimeEnd); ?></td>
          <td><?php echo e($discount->Discount_Amount); ?></td>
					<td>
                        <button id = "btnDelete" style = "background-color:red;" type="button" class="btn btn-primary" data-id="<?php echo e($discount->PK_DiscountID); ?>" data-name = "<?php echo e($discount->Discount_Name); ?>" data-requirement="<?php echo e($discount->Discount_Requirements); ?>" data-datestart ="<?php echo e($discount->Discount_ValidDateStart); ?>" data-dateend = "<?php echo e($discount->Discount_ValidDateEnd); ?>" data-timestart="<?php echo e($discount->Discount_ValidTimeStart); ?>" data-timeend = "<?php echo e($discount->Discount_ValidTimeEnd); ?>" data-amount = "<?php echo e($discount->Discount_Amount); ?>">Delete</button>
                        <button id = "btnEdit" style = "background-color:green;margin-right:5px;" type="button" class="btn btn-primary" data-id="<?php echo e($discount->PK_DiscountID); ?>" data-name = "<?php echo e($discount->Discount_Name); ?>" data-requirement="<?php echo e($discount->Discount_Requirements); ?>" data-datestart ="<?php echo e($discount->Discount_ValidDateStart); ?>" data-dateend = "<?php echo e($discount->Discount_ValidDateEnd); ?>" data-timestart="<?php echo e($discount->Discount_ValidTimeStart); ?>" data-timeend = "<?php echo e($discount->Discount_ValidTimeEnd); ?>" data-amount = "<?php echo e($discount->Discount_Amount); ?>">Edit</button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

		<!-- This is the Modal that will be called for add column -->
      <div class = "modal fade" id = "modalAdd" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header" style = "background-color:#ffffa8">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">DISCOUNT</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class = "form-group">
                        <label> DISCOUNT NAME: </label>
                        <input type="text" name ="txtDiscountName" class="form-control" id="AddDiscountName" required>
                      </div>
                      <div class="form-group">
                        <div>
                        <label> DISCOUNT REQUIREMENTS: </label>
                      </div>
                        <textarea rows="4" cols="50" name="txtDiscountRequirements" class="form-control" id="AddDiscountRequirements"></textarea>
                      </div>
                      <div class = "form-group">
                        <label> DISCOUNT VALIDITY DATE START: </label>
                        <input type="date" name = "txtDiscountDateStart" class="form-control" id="AddDiscountDateStart" required>
                      </div>
					            <div class = "form-group">
                        <label> DISCOUNT VALIDITY DATE END: </label>
                        <input type="date" name = "txtDiscountDateEnd" class="form-control" id="AddDiscountDateEnd" required>
                      </div>
					            <div class = "form-group">
                        <label> DISCOUNT VALIDITY TIME START: </label>
                        <input type="time" name = "txtTimeStart" class="form-control" id="AddDiscountTimeStart" required>
                      </div>
                      <div class = "form-group">
                      <label> DISCOUNT VALIDITY TIME END: </label>
                      <input type="time" name = "txtTimeEnd" class="form-control" id="AddDiscountTimeEnd" required>
                      </div>
                      <div class = "form-group">
                      <label> DISCOUNT AMOUNT:</label>
                      <input type="number" min="0" name = "txtEmailAddress" step="0.01" class="form-control" id="AddDiscountAmount" required>
                      </div>
                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitAdd">ADD DISCOUNT</button>
                    <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>


        		<!-- This is the Modal that will be called for edit column -->
              <div class = "modal fade" id = "modalEdit" role = "dialog">
                <div class = "modal-dialog">

                  <div class="modal-content">
                    <div class = "modal-header" style = "background-color:#ffffa8">
                      <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                            <h4 class ="modal-title">DISCOUNT</h4>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class = "form-group">
                                <label> DISCOUNT ID: </label>
                                <input type="text" name ="txtDiscountName" class="form-control" id="EditDiscountID" disabled>
                              </div>
                              <div class = "form-group">
                                <label> DISCOUNT NAME: </label>
                                <input type="text" name ="txtDiscountName" class="form-control" id="EditDiscountName" required>
                              </div>
                              <div class="form-group">
                                <div>
                                <label> DISCOUNT REQUIREMENTS: </label>
                              </div>
                                <textarea rows="4" cols="50" name="txtDiscountRequirements" class="form-control" id="EditDiscountRequirements"></textarea>
                              </div>
                              <div class = "form-group">
                                <label> DISCOUNT VALIDITY DATE START: </label>
                                <input type="date" name = "txtDiscountDateStart" class="form-control" id="EditDiscountDateStart" required>
                              </div>
        					            <div class = "form-group">
                                <label> DISCOUNT VALIDITY DATE END: </label>
                                <input type="date" name = "txtDiscountDateEnd" class="form-control" id="EditDiscountDateEnd" required>
                              </div>
        					            <div class = "form-group">
                                <label> DISCOUNT VALIDITY TIME START: </label>
                                <input type="time" name = "txtTimeStart" class="form-control" id="EditDiscountTimeStart" required>
                              </div>
                              <div class = "form-group">
                              <label> DISCOUNT VALIDITY TIME END: </label>
                              <input type="time" name = "txtTimeEnd" class="form-control" id="EditDiscountTimeEnd" required>
                              </div>
                              <div class = "form-group">
                              <label> DISCOUNT AMOUNT:</label>
                              <input type="number" min="0" name = "txtEmailAddress" step="0.01" class="form-control" id="EditDiscountAmount" required>
                              </div>
                          </form>
                          </div>
                          <div class = "modal-footer">
                            <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitEdit">EDIT DISCOUNT</button>
                            <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                          </div>
                        </div>
                  </div>
                </div>

                <!-- This is the Modal that will be called for delete column -->
                  <div class = "modal fade" id = "modalDelete" role = "dialog">
                    <div class = "modal-dialog">

                      <div class="modal-content">
                        <div class = "modal-header" style = "background-color:#ffffa8">
                          <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                                <h4 class ="modal-title">DISCOUNT</h4>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class = "form-group">
                                    <label> DISCOUNT ID: </label>
                                    <input type="text" name ="txtDiscountName" class="form-control" id="DeleteDiscountID" disabled>
                                  </div>
                                  <div class = "form-group">
                                    <label> DISCOUNT NAME: </label>
                                    <input type="text" name ="txtDiscountName" class="form-control" id="DeleteDiscountName" disabled>
                                  </div>
                                  <div class="form-group">
                                    <div>
                                    <label> DISCOUNT REQUIREMENTS: </label>
                                  </div>
                                    <textarea rows="4" cols="50" name="txtDiscountRequirements" class="form-control" id="DeleteDiscountRequirements" disabled></textarea>
                                  </div>
                                  <div class = "form-group">
                                    <label> DISCOUNT VALIDITY DATE START: </label>
                                    <input type="date" name = "txtDiscountDateStart" class="form-control" id="DeleteDiscountDateStart" disabled>
                                  </div>
                                  <div class = "form-group">
                                    <label> DISCOUNT VALIDITY DATE END: </label>
                                    <input type="date" name = "txtDiscountDateEnd" class="form-control" id="DeleteDiscountDateEnd" disabled>
                                  </div>
                                  <div class = "form-group">
                                    <label> DISCOUNT VALIDITY TIME START: </label>
                                    <input type="time" name = "txtTimeStart" class="form-control" id="DeleteDiscountTimeStart" disabled>
                                  </div>
                                  <div class = "form-group">
                                  <label> DISCOUNT VALIDITY TIME END: </label>
                                  <input type="time" name = "txtTimeEnd" class="form-control" id="DeleteDiscountTimeEnd" disabled>
                                  </div>
                                  <div class = "form-group">
                                  <label> DISCOUNT AMOUNT:</label>
                                  <input type="number" min="0" name = "txtEmailAddress" step="0.01" class="form-control" id="DeleteDiscountAmount" disabled>
                                  </div>
                              </form>
                              </div>
                              <div class = "modal-footer">
                                <button type="button" class = "btn btn-danger" data-dismiss = "modal" id="SubmitDelete">DELETE DISCOUNT</button>
                                <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                              </div>
                            </div>
                      </div>
                    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        
            $(document).on('click', '#BtnAdd', function(){
            $('#modalAdd').modal('show');
            });

        $('.modal-footer').on('click','#SubmitAdd',function(){
          $.ajax({
            type: 'POST',
            url: '/admin/discounts',
            data:{
              '_token': $('input[name=_token]').val(),
              'name':$('#AddDiscountName').val(),
              'requirement':$('#AddDiscountRequirements').val(),
              'datestart':$('#AddDiscountDateStart').val(),
              'dateend':$('#AddDiscountDateEnd').val(),
              'timestart':$('#AddDiscountTimeStart').val(),
              'timeend':$('#AddDiscountTimeEnd').val(),
              'amount':$('#AddDiscountAmount').val()
            },
            success: function(response){
              if(response.errors){
                toastr.error('Validation Error','Error Alert', {timeOut:5000});
              }
              else{
              toastr.success('Successfully Added Discount','Success Alert',{timeOut:5000});
              $('#DiscountTable').prepend("<tr id='Discount" + response.PK_DiscountID + "'><td>" + response.PK_DiscountID + "</td><td>" +response.Discount_Name + "</td><td>" + response.Discount_Requirements + "</td><td>" + response.Discount_ValidDateStart + "</td><td>" + response.Discount_ValidDateEnd + "</td><td>" + response.Discount_ValidTimeStart + "<td><td>" + response.Discount_ValidTimeEnd + "</td><td>" + response.Discount_Amount + "</td><td><button id = 'btnDelete' style = 'background-color:red;' type='button' class='btn btn-primary' data-id='" + response.PK_DiscountID + "' data-name = '" + response.Discount_Name + "' data-requirement= '" + response.Discount_Requirements + "' data-datestart ='" + response.Discount_ValidDateStart + "' data-dateend = '" + response.Discount_ValidDateEnd + "' data-timestart='" + response.Discount_ValidTimeStart + "' data-timeend = '" + response.Discount_ValidTimeEnd + "' data-amount = '" + response.Discount_Amount + "'>Delete</button><button id = 'btnEdit' style = 'background-color:green;margin-right:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_DiscountID + "' data-name = '" + response.Discount_Name + "' data-requirement='" +response.Discount_Requirements + "' data-datestart ='" + response.Discount_ValidDateStart + "' data-dateend = '" + response.Discount_ValidDateEnd + "' data-timestart='" + response.Discount_ValidTimeStart + "' data-timeend = '" + response.Discount_ValidTimeEnd + "' data-amount = '" + response.Discount_Amount + "'>Edit</button></td></tr>");
              }
            }
          });
        });

        $(document).on('click','#btnEdit',function(){
          id = $(this).data('id');
          $('#EditDiscountID').val($(this).data('id'));
          $('#EditDiscountName').val($(this).data('name'));
          $('#EditDiscountRequirements').val($(this).data('requirement'));
          $('#EditDiscountDateStart').val($(this).data('datestart'));
          $('#EditDiscountDateEnd').val($(this).data('dateend'));
          $('#EditDiscountTimeStart').val($(this).data('timestart'));
          $('#EditDiscountTimeEnd').val($(this).data('timeend'));
          $('#EditDiscountAmount').val($(this).data('amount'));
          $('#modalEdit').modal('show');
        });

        $('.modal-footer').on('click','#SubmitEdit',function(){
          $.ajax({
            type: 'PUT',
            url: '/admin/discounts/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
              'name':$('#EditDiscountName').val(),
              'requirement':$('#EditDiscountRequirements').val(),
              'datestart':$('#EditDiscountDateStart').val(),
              'dateend':$('#EditDiscountDateEnd').val(),
              'timestart':$('#EditDiscountTimeStart').val(),
              'timeend':$('#EditDiscountTimeEnd').val(),
              'amount':$('#EditDiscountAmount').val()
            },
            success: function(response){
              if(response.errors){
                toastr.error("Validation Error", "Error Alert", {timeOut:5000});
              }
              else{
              toastr.success('Successfully Updated discount','Success Alert', {timeOut:5000});
              $('#Discount'+response.PK_DiscountID).replaceWith("<tr id='Discount" + response.PK_DiscountID + "'><td>" + response.PK_DiscountID + "</td><td>" +response.Discount_Name + "</td><td>" + response.Discount_Requirements + "</td><td>" + response.Discount_ValidDateStart + "</td><td>" + response.Discount_ValidDateEnd + "</td><td>" + response.Discount_ValidTimeStart + "<td><td>" + response.Discount_ValidTimeEnd + "</td><td>" + response.Discount_Amount + "</td><td><button id = 'btnDelete' style = 'background-color:red;' type='button' class='btn btn-primary' data-id='" + response.PK_DiscountID + "' data-name = '" + response.Discount_Name + "' data-requirement= '" + response.Discount_Requirements + "' data-datestart ='" + response.Discount_ValidDateStart + "' data-dateend = '" + response.Discount_ValidDateEnd + "' data-timestart='" + response.Discount_ValidTimeStart + "' data-timeend = '" + response.Discount_ValidTimeEnd + "' data-amount = '" + response.Discount_Amount + "'>Delete</button><button id = 'btnEdit' style = 'background-color:green;margin-right:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_DiscountID + "' data-name = '" + response.Discount_Name + "' data-requirement='" +response.Discount_Requirements + "' data-datestart ='" + response.Discount_ValidDateStart + "' data-dateend = '" + response.Discount_ValidDateEnd + "' data-timestart='" + response.Discount_ValidTimeStart + "' data-timeend = '" + response.Discount_ValidTimeEnd + "' data-amount = '" + response.Discount_Amount + "'>Edit</button></td></tr>");
            }
            }
          });
        });

        $(document).on('click','#btnDelete',function(){
          id = $(this).data('id');
          $('#DeleteDiscountID').val($(this).data('id'));
          $('#DeleteDiscountName').val($(this).data('name'));
          $('#DeleteDiscountRequirements').val($(this).data('requirement'));
          $('#DeleteDiscountDateStart').val($(this).data('datestart'));
          $('#DeleteDiscountDateEnd').val($(this).data('dateend'));
          $('#DeleteDiscountTimeStart').val($(this).data('timestart'));
          $('#DeleteDiscountTimeEnd').val($(this).data('timeend'));
          $('#DeleteDiscountAmount').val($(this).data('amount'));
          $('#modalDelete').modal('show');
        });


        $('.modal-footer').on('click','#SubmitDelete',function()
        {
          $.ajax({
            type:'DELETE',
            url: '/admin/discounts/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
            },
          success: function(response){
            toastr.warning('Successfully Deleted Discount','Delete Alert',{timeOut:5000});
              $('#Discount' + response.PK_DiscountID).remove();
          }
          });
        });


      });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>