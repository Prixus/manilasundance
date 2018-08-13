<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Bazaars<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					</div>
					</h2>

          <div class="table-responsive">

		  <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" id="BtnAdd">Add Bazaar</button></h2>

            <table class="table table-striped" id="BazaarTable">
              <thead>
                <tr>
					<th>Bazaar ID</th>
					<th>Bazaar Name</th>
					<th>Bazaar Starting Date</th>
          <th>Bazaar Starting Time</th>
					<th>Bazaar Ending Date</th>
          <th>Bazaar Ending Time</th>
					<th>Bazaar Venue</th>
          <th>Bazaar Status</th>
          <th>Booking Cost</th>
          <th></th>
                </tr>
                <?php echo e(csrf_field()); ?>

              </thead>
              <tbody>
                <?php $__currentLoopData = $bazaars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bazaar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id = "bazaar<?php echo e($bazaar->PK_BazaarID); ?>">
        					<td><?php echo e($bazaar->PK_BazaarID); ?></td>
        					<td><?php echo e($bazaar->Bazaar_Name); ?></td>
        					<td><?php echo e($bazaar->Bazaar_DateStart); ?></td>
                  <td><?php echo e($bazaar->Bazaar_TimeStart); ?></td>
                  <td><?php echo e($bazaar->Bazaar_DateEnd); ?></td>
        					<td><?php echo e($bazaar->Bazaar_TimeEnd); ?></td>
        					<td><?php echo e($bazaar->Bazaar_Venue); ?></td>
                  <td><?php echo e($bazaar->Bazaar_Status); ?></td>
                  <td><?php echo e($bazaar->Bazaar_BookingCost); ?></td>
        					<td><button id="BtnEdit"    style = "background-color:green;float:left;"  class="btn btn-primary"  aria-pressed="false" data-id="<?php echo e($bazaar->PK_BazaarID); ?>" data-name="<?php echo e($bazaar->Bazaar_Name); ?>" data-startdate="<?php echo e($bazaar->Bazaar_DateStart); ?>" data-enddate = "<?php echo e($bazaar->Bazaar_DateEnd); ?>" data-starttime="<?php echo e($bazaar->Bazaar_TimeStart); ?>" data-endtime= "<?php echo e($bazaar->Bazaar_TimeEnd); ?>" data-end="<?php echo e($bazaar->Bazaar_DateTimeEnd); ?>" data-venue="<?php echo e($bazaar->Bazaar_Venue); ?>" data-status="<?php echo e($bazaar->Bazaar_Status); ?>" data-bookingcost="<?php echo e($bazaar->Bazaar_BookingCost); ?>">Edit</button></td>
                  <td><button id="BtnDelete" style = "background-color:red;float:right;"   class="btn btn-primary" aria-pressed="false" data-id="<?php echo e($bazaar->PK_BazaarID); ?>" data-name="<?php echo e($bazaar->Bazaar_Name); ?>" data-startdate="<?php echo e($bazaar->Bazaar_DateStart); ?>" data-enddate = "<?php echo e($bazaar->Bazaar_DateEnd); ?>" data-starttime="<?php echo e($bazaar->Bazaar_TimeStart); ?>" data-endtime= "$bazaar->Bazaar_TimeEnd" data-venue="<?php echo e($bazaar->Bazaar_Venue); ?>" data-status="<?php echo e($bazaar->Bazaar_Status); ?>" data-bookingcost="<?php echo e($bazaar->Bazaar_BookingCost); ?>">Delete</button></td>
                  <td><button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary"><a href = "/admin/manage_stalls/<?php echo e($bazaar->PK_BazaarID); ?>" >Manage Stalls</a></button></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

		<!-- This is the Modal that will be called for add column -->
      <div class = "modal fade" id = "ModalAdd" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">Bazaar Registration</h4>
                  </div>
                  <div class="modal-body">



                      <?php echo Form::open(array('url' => '/admin/bazaar','files'=>'true')); ?>

                      <div class = "form-group">
                        <label> Bazaar Name: </label>
                        <?php echo e(Form::text('Bazaar_Name',null,array('placeholder'=>'Enter Bazaar Name','required'=>'required'))); ?>

                      </div>
                      <div class = "form-group">
                        <label> Bazaar Starting Date: </label>
                        <?php echo e(Form::date('Bazaar_DateStart')); ?>

                      </div>
                      <div class="form-group">
                        <label> Bazaar Ending Date: </label>
                        <?php echo e(Form::date('Bazaar_DateEnd')); ?>

                      </div>
                      <div class = "form-group">
                        <label> Bazaar Starting Time: </label>
                        <?php echo e(Form::time('Bazaar_TimeStart')); ?>

                      </div>
                      <div class="form-group">
                        <label> Bazaar Ending Time: </label>
                        <?php echo e(Form::time('Bazaar_TimeEnd')); ?>

                      </div>

          					  <div class = "form-group">
                        <label> Bazaar Venue: </label>
                        <?php echo e(Form::text('Bazaar_Venue',null,array('placeholder'=>'Enter Bazaar Venue','required'=>'required'))); ?>

                      </div>
                      <div class = "form-group">
                        <label> Bazaar Booking Cost: </label>
                        <?php echo e(Form::number('Bazaar_BookingCost',null,array('step'=>'0.01','min'=>'1'))); ?>


                      </div>
                      <div class = "form-group">
                        <label> Bazaar Stall Map: </label>
                        <?php echo e(Form::file('Bazaar_StallMap')); ?>

                      </div>
                      <div class = "form-group">
                        <label> Bazaar Event Poster: </label>
                        <?php echo e(Form::file('Bazaar_EventPoster')); ?>

                      </div>
                      <div class = "form-group">
                        <?php echo e(Form::submit('SubmitAdd')); ?>

                      </div>


              <?php echo Form::close(); ?>

                  </div>

                  <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>

				<!-- This is the Modal that will be called for edit column -->
      <div class = "modal fade" id = "ModalEdit" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">Bazaar Registration </h4>
                  </div>
                  <div class="modal-body">
                    <form style="text-align:center">
                      <div class = "form-group">
                        <label> Bazaar ID: </label>
                        <input type="text" id="EditID" disabled>
                      </div>

                      <div class = "form-group">
                        <label> Bazaar Name: </label>
                        <input type="text" id="EditName" required>
                      </div>
                      <div class = "form-group">
                        <label> Bazaar Starting Date: </label>
                        <input type="date" id="EditStartDate" required>
                      </div>
                      <div class="form-group">
                        <label> Bazaar Ending Date: </label>
                        <input type= "date" id="EditEndDate" required>
                      </div>
                      <div class = "form-group">
                        <label> Bazaar Starting Time: </label>
                        <input type="time" id="EditStartTime" required>
                      </div>
                      <div class="form-group">
                        <label> Bazaar Ending Time: </label>
                        <input type= "time" id="EditEndTime" required>
                      </div>
          					  <div class = "form-group">
                        <label> Bazaar Venue: </label>
                        <input type="text" placeholder="Enter Bazaar Venue" id="EditVenue" required>
                      </div>
                      <div class = "form-group">
                        <label> Bazaar Booking Cost: </label>
                        <input type="number" placeholder="Enter Booking Cost" step ="0.01"  min = "0" id= "EditBookingCost" required>
                      </div>
                      <div class = "form-group">
                        <label> Bazaar Status: </label>
                        <select id= "EditStatus">
                          <option value="Available">Available</option>
                          <option value="Not Available">Not Available</option>
                        </select>
                      </div>


                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitEdit">Edit </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>

        <!-- This is the Modal that will be called for delete column -->
      <div class = "modal fade" id = "ModalDelete" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">Bazaar Registration </h4>
                  </div>
                  <div class="modal-body">


                    <form style="text-align:center">
                      <div class = "form-group">
                        <label> Bazaar ID: </label>
                        <input type="date" id="DeleteID" disabled>
                      </div>

                      <div class = "form-group">
                        <label> Bazaar Name: </label>
                        <input type="date" id="DeleteName" disabled>
                      </div>
                      <div class = "form-group">
                        <label> Bazaar Starting Date: </label>
                        <input type="date" id="DeleteStartDate" required>
                      </div>
                      <div class="form-group">
                        <label> Bazaar Ending Date: </label>
                        <input type= "date" id="DeleteEndDate" required>
                      </div>
                      <div class = "form-group">
                        <label> Bazaar Starting Time: </label>
                        <input type="time" id="DeleteStartTime" required>
                      </div>
                      <div class="form-group">
                        <label> Bazaar Ending Time: </label>
                        <input type= "time" id="DeleteEndTime" required>
                      </div>

                      <div class = "form-group">
                        <label> Bazaar Venue: </label>
                        <input type="text" placeholder="Enter Bazaar Venue" id="DeleteVenue" disabled>
                      </div>
                      <div class = "form-group">
                        <label> Bazaar Booking Cost: </label>
                        <input type="text" placeholder="Enter Booking Cost" step ="0.01"  min = "0" id= "DeleteBookingCost" disabled>
                      </div>
                      <div class = "form-group">
                        <label> Bazaar Status: </label>
                        <select id= "DeleteStatus" disabled>
                          <option value="Available">Available</option>
                          <option value="Not Available">Not Available</option>
                        </select>
                      </div>


                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type="button" class = "btn btn-alert" data-dismiss = "modal" id="SubmitDelete">Delete </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>

        <script type= "text/javascript">

    $(document).ready(function(){
        $(document).on('click','#BtnAdd',function(){
        $('#ModalAdd').modal('show');
        });



        $('.modal-footer').on('click','#SubmitAdd',function(){

          $.ajax({
            type: "POST",
            url: '/admin/bazaar',
            data: {
              '_token': $('input[name=_token]').val(),
              'Bazaar_Name': $('input[name=Bazaar_Name]').val(),
              'Bazaar_DateStart': $('input[name=Bazaar_DateStart]').val(),
              'Bazaar_DateEnd': $('input[name=Bazaar_DateEnd]').val(),
              'Bazaar_TimeStart': $('input[name=Bazaar_TimeStart]').val(),
              'Bazaar_TimeEnd': $('input[name=Bazaar_TimeEnd]').val(),
              'Bazaar_Venue': $('input[name=Bazaar_Venue]').val(),
              'Bazaar_BookingCost': $('input[name=Bazaar_BookingCost]').val(),
              'Bazaar_EventPoster': $('input[name=Bazaar_EventPoster]').val(),
              'Bazaar_StallMap': $('input[name=Bazaar_StallMap]').val()


            },
            success: function(response){

              toastr.success('Successfully Added Bazaar','Success Alert', {timeOut: 5000});
              $('#BazaarTable').prepend("<tr id = 'bazaar"+response.PK_BazaarID + "'><td>" + response.PK_BazaarID + "</td><td>" + response.Bazaar_Name + "</td><td>" + response.Bazaar_DateStart + "</td><td>" + response.Bazaar_DateEnd + "</td><td>" + response.Bazaar_TimeStart + "</td><td>" + response.Bazaar_TimeEnd + "</td><td>" +  response.Bazaar_Venue + "</td><td>" + response.Bazaar_Status + "</td><td>" + response.Bazaar_BookingCost + "</td><td> <button id='BtnEdit'    style = 'background-color:green;float:left;'  class='btn btn-primary'  aria-pressed='false' data-id=' " + response.PK_BazaarID + "' data-name='" + response.Bazaar_Name + "' data-starttime='" + response.Bazaar_TimeStart + "' data-endtime='" + response.Bazaar_TimeEnd + "' data-startdate = '" + response.Bazaar_DateStart + "data-enddate = '" + response.Bazaar_DateEnd + "' data-venue= '" + response.Bazaar_Venue + "' data-status='" + response.Bazaar_Status + "' data-bookingcost='" + response.Bazaar_BookingCost + "'>Edit</button></td><td><button id='BtnDelete' style = 'background-color:red;float:right;'   class='btn btn-primary' aria-pressed='false' data-id= '" + response.PK_BazaarID + "' data-name='" + response.Bazaar_Name + "' data-starttime='" + response.Bazaar_TimeStart + "' data-endtime='" + response.Bazaar_TimeEnd + "' data-startdate = '" + response.Bazaar_DateStart + "data-enddate = '" + response.Bazaar_DateEnd + "' data-venue='" + response.Bazaar_Venue + "' data-status='" + response.Bazaar_Status + "' data-bookingcost='" + response.Bazaar_BookingCost + "'>Delete</button></td><td><button style = 'background-color:#337ab7;float:right;' type='button' class='btn btn-primary' aria-pressed='false'><a href = '/admin/manage_stalls/" + response.PK_BazaarID + "' >Manage Stalls</a></button></td></tr>");
            }
          });
        });

        $(document).on('click','#BtnEdit', function(){
          id = $(this).data('id');
          $('#EditID').val($(this).data('id'));
          $('#EditName').val($(this).data('name'));
          $('#EditEndTime').val($(this).data('endtime'));
          $('#EditStartTime').val($(this).data('starttime'));
          $('#EditEndDate').val($(this).data('enddate'));
          $('#EditStartDate').val($(this).data('startdate'));
          $('#EditVenue').val($(this).data('venue'));
          $('#EditStatus').val($(this).data('status'));
          $('#EditBookingCost').val($(this).data('bookingcost'));
          $('#ModalEdit').modal('show');
        });

        $('.modal-footer').on('click','#SubmitEdit',function(){
          $.ajax({
            type: "PUT",
            url: '/admin/bazaar/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
              'BazaarName': $('#EditName').val(),
              'BazaarStartDate': $('#EditStartDate').val(),
              'BazaarEndDate': $('#EditEndDate').val(),
              'BazaarStartTime': $('#EditStartTime').val(),
              'BazaarEndTime': $('#EditEndTime').val(),
              'BazaarVenue': $('#EditVenue').val(),
              'BazaarBookingCost': $('#EditBookingCost').val(),
              'BazaarStatus': $('#EditStatus').val()
            },
            success: function(response){
              if(response.errors){
                toastr.error("Validation Error","Error Alert", {timeOut:5000});
              }
              else{
                toastr.success('Successfully Edited Bazaar','Success Alert', {timeOut: 5000});
                $('#bazaar'+ response.PK_BazaarID).replaceWith("<tr id = 'bazaar"+response.PK_BazaarID + "'><td>" + response.PK_BazaarID + "</td><td>" + response.Bazaar_Name + "</td><td>" + response.Bazaar_DateStart + "</td><td>" + response.Bazaar_DateEnd + "</td><td>" + response.Bazaar_TimeStart + "</td><td>" + response.Bazaar_TimeEnd + "</td><td>" +  response.Bazaar_Venue + "</td><td>" + response.Bazaar_Status + "</td><td>" + response.Bazaar_BookingCost + "</td><td> <button id='BtnEdit'    style = 'background-color:green;float:left;'  class='btn btn-primary'  aria-pressed='false' data-id=' " + response.PK_BazaarID + "' data-name='" + response.Bazaar_Name + "' data-starttime='" + response.Bazaar_TimeStart + "' data-endtime='" + response.Bazaar_TimeEnd + "' data-startdate = '" + response.Bazaar_DateStart + "'data-enddate = '" + response.Bazaar_DateEnd + "' data-venue= '" + response.Bazaar_Venue + "' data-status='" + response.Bazaar_Status + "' data-bookingcost='" + response.Bazaar_BookingCost + "'>Edit</button></td><td><button id='BtnDelete' style = 'background-color:red;float:right;'   class='btn btn-primary' aria-pressed='false' data-id= '" + response.PK_BazaarID + "' data-name='" + response.Bazaar_Name + "' data-starttime='" + response.Bazaar_TimeStart + "' data-endtime='" + response.Bazaar_TimeEnd + "' data-startdate = '" + response.Bazaar_DateStart + "data-enddate = '" + response.Bazaar_DateEnd + "' data-venue='" + response.Bazaar_Venue + "' data-status='" + response.Bazaar_Status + "' data-bookingcost='" + response.Bazaar_BookingCost + "'>Delete</button></td><td><button style = 'background-color:#337ab7;float:right;' type='button' class='btn btn-primary' aria-pressed='false'><a href = '/admin/manage_stalls/" + response.PK_BazaarID + "' >Manage Stalls</a></button></td></tr>");
              }

            }
          });
        });

        $(document).on('click', '#BtnDelete', function(){
          id = $(this).data('id');
          $('#DeleteID').val($(this).data('id'));
          $('#DeleteName').val($(this).data('name'));
          $('#DeleteEndTime').val($(this).data('endtime'));
          $('#DeleteStartTime').val($(this).data('starttime'));
          $('#DeleteEndDate').val($(this).data('enddate'));
          $('#DeleteStartDate').val($(this).data('startdate'));
          $('#DeleteVenue').val($(this).data('venue'));
          $('#DeleteStatus').val($(this).data('status'));
          $('#DeleteBookingCost').val($(this).data('bookingcost'));
          $('#ModalDelete').modal('show');

        });

        $('.modal-footer').on('click','#SubmitDelete',function()
        {
          $.ajax({
            type:'DELETE',
            url: '/admin/bazaar/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
            },
          success: function(response){
              $('#bazaar' + response.PK_BazaarID).remove();
          }
          });
        });
    });
        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>