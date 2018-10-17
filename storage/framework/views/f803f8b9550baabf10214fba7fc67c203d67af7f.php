<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



          <!-- #1 Dessa added 08-20-2018 start -->

          <h1 class="header" style = "color:#3ce1e0;">Accounts
            <div style = "float:right;font-size:14px;color:black;margin-top:14px;">
              <!-- <form style = "float:left;">
                    <?php echo e(csrf_field()); ?>

              <input type = "text" placeholder = "Search..." id="SearchWord">
              <button class = "btnSearch">GO</button>
              </form> -->
              <button style = "float:right;background-color:#337ab7;margin:-10px 5px 0 25px;" class="btn btn-primary" id="btnAdd">Add Account</button>
            </div>
          </h1>
        <hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">

      <h2 class="sub-header" style = "color:#f79391;">New Registrations
        <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#newregistrations">

        </button>
      </h2>
      <div id="newregistrations" class="collapse in">
          <div class="table-responsive">

                <table class="table table-striped" id ="AccountForApprovalTable">
                  <thead>
                    <tr>
                      <th>Account ID</th>
                      <th>Account Username</th>
                      <th>Account Status</th>
                      <th>Account Rating</th>
                      <th>Account Access Level</th>
                      <th>Account Email Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $ForApprovalaccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ForApprovalaccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id = "AccountApproval<?php echo e($ForApprovalaccount->PK_AccountID); ?>">
                      <td><?php echo e($ForApprovalaccount->PK_AccountID); ?></td>
                      <td><?php echo e($ForApprovalaccount->Account_UserName); ?></td>
                      <td><?php echo e($ForApprovalaccount->Account_Status); ?></td>
                      <td><?php echo e($ForApprovalaccount->Account_Rating); ?></td>
                      <td><?php echo e($ForApprovalaccount->Account_AccessLevel); ?></td>
                      <td><?php echo e($ForApprovalaccount->GuestBrand_EmailAddress); ?></td>
                      <td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '<?php echo e($ForApprovalaccount->PK_AccountID); ?>' data-name ='<?php echo e($ForApprovalaccount->Account_UserName); ?>' data-password = '<?php echo e($ForApprovalaccount->Account_Password); ?>' data-status='<?php echo e($ForApprovalaccount->Account_Status); ?>' data-rating = '<?php echo e($ForApprovalaccount->Account_Rating); ?>' data-accesslevel = '<?php echo e($ForApprovalaccount->Account_AccessLevel); ?>' id='btnApprove' data-email = <?php echo e($ForApprovalaccount->GuestBrand_EmailAddress); ?>>Approve</button></td>
                      <td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '<?php echo e($ForApprovalaccount->PK_AccountID); ?>' data-name ='<?php echo e($ForApprovalaccount->Account_UserName); ?>' data-password = '<?php echo e($ForApprovalaccount->Account_Password); ?>' data-status='<?php echo e($ForApprovalaccount->Account_Status); ?>' data-rating = '<?php echo e($ForApprovalaccount->Account_Rating); ?>' data-accesslevel = '<?php echo e($ForApprovalaccount->Account_AccessLevel); ?>' id='btnReject' data-email = <?php echo e($ForApprovalaccount->GuestBrand_EmailAddress); ?>>Reject</button></td>
                      <td><button style = 'background-color:#337ab7;float:right;' class='btn btn-primary'><a style = "color:#fff;" href="/admin/brandprofile/<?php echo e($ForApprovalaccount->PK_AccountID); ?>">See Profile</a></button></td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                  </tbody>
                </table>
              </div>
              <br><br>
          </div>
          <hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">

          <!-- #1 Dessa added 08-20-2018 end -->

          <h2 class="sub-header" style = "color:#f79391;">Registered Accounts
            <button style = "background-color:#f79391;font-weight:bold;" class="btn btn-primary" data-toggle="collapse" data-target="#registeredaccounts">
        </button>
          </h2>
          <div id="registeredaccounts" class="collapse in">
          <div class="table-responsive">

            <table class="table table-striped" id ="AccountTable">
              <thead>
                <tr>
                  <th>Account ID</th>
                  <th>Account Username</th>
                  <th>Account Status</th>
                  <th>Account Rating</th>
                  <th>Account Access Level</th>
                  <th></th>
                  <th></th>
                </tr>
                <?php echo e(csrf_field()); ?>

              </thead>
              <tbody>
                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id = "Account<?php echo e($account->PK_AccountID); ?>">
                  <td><?php echo e($account->PK_AccountID); ?></td>
                  <td><?php echo e($account->Account_UserName); ?></td>
                  <td><?php echo e($account->Account_Status); ?></td>
                  <td><?php echo e($account->Account_Rating); ?></td>
                  <td><?php echo e($account->Account_AccessLevel); ?></td>
                  <td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '<?php echo e($account->PK_AccountID); ?>' data-name ='<?php echo e($account->Account_UserName); ?>' data-password = '<?php echo e($account->Account_Password); ?>' data-status='<?php echo e($account->Account_Status); ?>' data-rating = '<?php echo e($account->Account_Rating); ?>' data-accesslevel = '<?php echo e($account->Account_AccessLevel); ?>' id='btnEdit'>Edit</button></td>
                  <?php if($account->Account_AccessLevel != "Admin"): ?>
                    <?php if($account->Account_Rating == "Warning"): ?>
                    <td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '<?php echo e($account->PK_AccountID); ?>' data-name ='<?php echo e($account->Account_UserName); ?>' data-password = '<?php echo e($account->Account_Password); ?>' data-status='<?php echo e($account->Account_Status); ?>' data-rating = 'Banned' data-accesslevel = '<?php echo e($account->Account_AccessLevel); ?>' id='btnDelete'>Ban Account</button></td>
                    <?php elseif($account->Account_Rating == "Normal"): ?>
                    <td><button style = 'background-color:orange;float:right;' class='btn btn-primary' data-id = '<?php echo e($account->PK_AccountID); ?>' data-name ='<?php echo e($account->Account_UserName); ?>' data-password = '<?php echo e($account->Account_Password); ?>' data-status='<?php echo e($account->Account_Status); ?>' data-rating = 'Warning' data-accesslevel = '<?php echo e($account->Account_AccessLevel); ?>' id='btnDelete'>Warn Account</button></td>
                    <?php else: ?>
                    <td><button style = 'background-color:green;float:right;' class='btn btn-primary' data-id = '<?php echo e($account->PK_AccountID); ?>' data-name ='<?php echo e($account->Account_UserName); ?>' data-password = '<?php echo e($account->Account_Password); ?>' data-status='<?php echo e($account->Account_Status); ?>' data-rating = 'Normal' data-accesslevel = '<?php echo e($account->Account_AccessLevel); ?>' id='btnRestore'>Restore Account Rating to Normal</button></td>
                    <?php endif; ?>
                  <?php else: ?>
                  <td></td>
                  <?php endif; ?>
                  <?php if($account->Account_AccessLevel == "Brand"): ?>
                  <td><button style = 'background-color:#337ab7;float:right;' class='btn btn-primary'><a style = "color:#fff;" href="/admin/brandprofile/<?php echo e($account->PK_AccountID); ?>">See Profile</a></button></td>
                  <?php else: ?>
                  <td></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
          </div>
          <br>
          </div>
          <hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0px;margin-left: 0%;height:3px;width:100%;">

        </div>
      </div>
    </div>

    <!-- This is the Modal that will be called for edit column -->
    <div class = "modal fade" id = "ModalAdd" role = "dialog">
      <div class = "modal-dialog">

        <div class="modal-content">
          <div class = "modal-header" style = "background-color:#ffffa8">
            <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                  <h4 class ="modal-title">ACCOUNT REGISTRATION</h4>
                </div>
                <div class="modal-body">
                  <form>

                    <div class = "form-group">
                      <label> ACCOUNT USERNAME: </label>
                      <input class="form-control" type="text" placeholder="Enter Username" id="AddUsername" required>
                    </div>
                    <div class="form-group">
                      <label> ACCOUNT PASSWORD: </label>
                      <input class="form-control" type= "password" placeholder="Enter Password" id="AddPassword" required>
                    </div>

                </form>
                </div>
                <div class = "modal-footer">
                  <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitAdd">ADD ACCOUNT</button>
                  <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                </div>
              </div>
        </div>
      </div>
         <!-- MODAL -->


        <!-- This is the Modal that will be called for edit column -->
        <div class = "modal fade" id = "ModalEdit" role = "dialog">
          <div class = "modal-dialog">

            <div class="modal-content">
              <div class = "modal-header" style = "background-color:#ffffa8">
                <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                      <h4 class ="modal-title">ACCOUNT REGISTRATION </h4>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class = "form-group">
                          <label> ACCOUNT ID: </label>
                          <input type="number" class="form-control" id="EditAccountID" disabled>
                        </div>
                        <div class = "form-group">
                          <label> ACCOUNT USERNAME: </label>
                          <input type="text" class="form-control" placeholder="Enter Username" id="EditUsername" required>
                        </div>
                        <div class="form-group">
                          <label> ACCOUNT PASSWORD: </label>
                          <input type= "password" class="form-control" placeholder="Enter Password" id="EditPassword" required>
                        </div>
                        <div class = "form-group">
                          <label> ACCOUNT STATUS: </label>
                          <select id="EditStatus" class="form-control" disabled>
                            <option value="Activated">Activated</option>
                            <option value="Deactivated">Deactivated</option>
                            <option value="ForApproval">For Approval</option>
                          </select>
                        </div>
  					              <div class = "form-group">
                          <label> ACCOUNT RATING:</label>
                            <select id="EditRating" class="form-control" disabled>
                              <option value="Warning">Warning</option>
                              <option value="Normal">Normal</option>
                              <option value="Banned">Banned</option>
                            </select>
                        </div>
  					              <div class = "form-group">
                          <label> ACCOUNT ACCESS LEVEL: </label>
                          <select id="EditAccessLevel" disabled class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Brand">Brand</option>
                          </select>
                        </div>

                    </form>
                    </div>
                    <div class = "modal-footer">
                      <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitEdit">SAVE CHANGES</button>
                      <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                    </div>
                  </div>
            </div>
          </div>


          <!-- This is the Modal that will be called for delete column -->
          <div class = "modal fade" id = "ModalDelete" role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header" style = "background-color:#ffffa8">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                        <h4 class ="modal-title">ACCOUNT REGISTRATION </h4>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class = "form-group">
                            <label> ACCOUNT ID: </label>
                            <input type="number" class="form-control" id="DeleteAccountID" disabled>
                          </div>
                          <div class = "form-group">
                            <label> ACCOUNT USERNAME: </label>
                            <input type="text" class="form-control" placeholder="Enter Username" id="DeleteUsername" disabled>
                          </div>
                          <div class="form-group">
                            <label> ACCOUNT PASSWORD: </label>
                            <input type= "password" class="form-control" placeholder="Enter Password" id="DeletePassword" disabled>
                          </div>
                          <div class = "form-group">
                            <label> ACCOUNT STATUS: </label>
                            <select id="DeleteStatus" disabled class="form-control">
                              <option value="Activated">Activated</option>
                              <option value="Deactivated">Deactivated</option>
                              <option value="ForApproval">For Approval</option>
                            </select>
                          </div>
    					              <div class = "form-group">
                              <label> ACCOUNT RATING: </label>
                              <select id="DeleteRating" disabled class="form-control">
                                <option value="Warning">Warning</option>
                                <option value="Normal">Normal</option>
                                <option value="Banned">Banned</option>
                              </select>
                          </div>
    					              <div class = "form-group">
                            <label> ACCOUNT ACCESS LEVEL: </label>
                            <select id="DeleteAccessLevel" disabled class="form-control">
                              <option value="Admin">Admin</option>
                              <option value="Brand">Brand</option>
                            </select>
                          </div>
                          <div class = "form-group">
                          <label> Type Of Report: </label>
                          <select id="DeleteReport"  class="form-control">
                            <?php $__currentLoopData = $Penalties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Penalty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($Penalty->PK_PenaltyID); ?>"><?php echo e($Penalty->Penalty_Name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <?php if($PenaltiesCount == 0): ?>
                        <button  type="button" class = "btn btn-Success" data-dismiss = "modal" id="SubmitDelete" disabled>Confirm</button>
                        <?php else: ?>
                        <button type="button" class = "btn btn-Success" data-dismiss = "modal" id="SubmitDelete">Confirm</button>
                        <?php endif; ?>
                        <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                      </div>
                    </div>
              </div>
            </div>

            <!-- This is the Modal that will be called for delete column -->
            <div class = "modal fade" id = "ModalRestore" role = "dialog">
              <div class = "modal-dialog">

                <div class="modal-content">
                  <div class = "modal-header" style = "background-color:#ffffa8">
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                          <h4 class ="modal-title">ACCOUNT REGISTRATION </h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class = "form-group">
                              <label> ACCOUNT ID: </label>
                              <input type="number" class="form-control" id="RestoreAccountID" disabled>
                            </div>
                            <div class = "form-group">
                              <label> ACCOUNT USERNAME: </label>
                              <input type="text" class="form-control" placeholder="Enter Username" id="RestoreUsername" disabled>
                            </div>
                            <div class="form-group">
                              <label> ACCOUNT PASSWORD: </label>
                              <input type= "password" class="form-control" placeholder="Enter Password" id="RestorePassword" disabled>
                            </div>
                            <div class = "form-group">
                              <label> ACCOUNT STATUS: </label>
                              <select id="RestoreStatus" disabled class="form-control">
                                <option value="Activated">Activated</option>
                                <option value="Deactivated">Deactivated</option>
                                <option value="ForApproval">For Approval</option>
                              </select>
                            </div>
                              <div class = "form-group">
                                <label> ACCOUNT RATING: </label>
                                <select id="RestoreRating" disabled class="form-control">
                                  <option value="Warning">Warning</option>
                                  <option value="Normal">Normal</option>
                                  <option value="Banned">Banned</option>
                                </select>
                            </div>
                              <div class = "form-group">
                              <label> ACCOUNT ACCESS LEVEL: </label>
                              <select id="RestoreAccessLevel" disabled class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Brand">Brand</option>
                              </select>
                            </div>


                        </form>
                        </div>
                        <div class = "modal-footer">
                          <button type="button" class = "btn btn-Success" data-dismiss = "modal" id="SubmitRestore">Confirm</button>
                          <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                        </div>
                      </div>
                </div>
              </div>




            <div class = "modal fade" id = "ModalApprove" role = "dialog">
              <div class = "modal-dialog">

                <div class="modal-content">
                  <div class = "modal-header" style = "background-color:#ffffa8">
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                          <h4 class ="modal-title">ACCOUNT APPROVAL </h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class = "form-group">
                              <label> ACCOUNT ID: </label>
                              <input type="number" class="form-control" id="ApprovalAccountID" disabled>
                            </div>
                            <div class = "form-group">
                              <label> ACCOUNT USERNAME: </label>
                              <input type="text" class="form-control" placeholder="Enter Username" id="ApprovalUsername" disabled>
                            </div>
                            <div class="form-group">
                              <label> ACCOUNT PASSWORD: </label>
                              <input type= "password" class="form-control" placeholder="Enter Password" id="ApprovalPassword" disabled>
                            </div>
                            <div class = "form-group">
                              <label> ACCOUNT STATUS: </label>
                              <select id="ApprovalStatus" disabled class="form-control">
                                <option value="Activated">Activated</option>
                                <option value="Deactivated">Deactivated</option>
                                <option value="ForApproval">For Approval</option>
                              </select>
                            </div>
                              <div class = "form-group">
                              <label> ACCOUNT RATING: </label>
                                <select id="ApprovalRating" disabled class="form-control">
                                  <option value="Warning">Warning</option>
                                  <option value="Normal">Normal</option>
                                  <option value="Banned">Banned</option>
                                </select>
                            </div>

                            <div class = "form-group">
                              <label> ACCOUNT EMAIL: </label>
                              <input type="text" class="form-control" placeholder="Enter Username" id="ApprovalEmail" disabled>
                            </div>

                              <div class = "form-group">
                              <label> ACCOUNT ACCESS LEVEL: </label>
                              <select id="ApprovalAccessLevel" disabled class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Brand">Brand</option>
                              </select>
                            </div>


                        </form>
                        </div>
                        <div class = "modal-footer">
                          <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitApprove">APPROVE ACCOUNT </button>
                          <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                        </div>
                      </div>
                </div>
              </div>

              <div class = "modal fade" id = "ModalRejected" role = "dialog">
              <div class = "modal-dialog">

                <div class="modal-content">
                  <div class = "modal-header" style = "background-color:#ffffa8">
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                          <h4 class ="modal-title">ACCOUNT REJECTED </h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class = "form-group">
                              <label> Account ID: </label>
                              <input type="number" class="form-control" id="RejectAccountID" disabled>
                            </div>
                            <div class = "form-group">
                              <label> Account Username: </label>
                              <input type="text" class="form-control" placeholder="Enter Username" id="RejectUsername" disabled>
                            </div>
                            <div class="form-group">
                              <label> Account Password </label>
                              <input type= "password" class="form-control" placeholder="Enter Password" id="RejectPassword" disabled>
                            </div>
                            <div class = "form-group">
                              <label> Account Status </label>
                              <select id="RejectStatus" disabled class="form-control">
                                <option value="Activated">Activated</option>
                                <option value="Deactivated">Deactivated</option>
                                <option value="ForApproval">For Approval</option>
                              </select>
                            </div>
                              <div class = "form-group">
                              <label> Account Rating </label>
                                <select id="RejectRating" disabled class="form-control">
                                  <option value="Warning">Warning</option>
                                  <option value="Normal">Normal</option>
                                  <option value="Banned">Banned</option>
                                </select>
                            </div>

                            <div class = "form-group">
                              <label> Account Email: </label>
                              <input type="text" class="form-control" placeholder="Enter Username" id="RejectEmail" disabled>
                            </div>

                              <div class = "form-group">
                              <label> Account Access Level </label>
                              <select id="RejectAccessLevel" disabled class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Brand">Brand</option>
                              </select>
                            </div>


                        </form>
                        </div>
                        <div class = "modal-footer">
                          <button type="button" class = "btn btn-danger" data-dismiss = "modal" id="SubmitReject">REJECT ACCOUNT </button>
                          <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                        </div>
                      </div>
                </div>
              </div>

<script type= "text/javascript">
      $(document).ready(function(){

        $(document).on('click','#btnAdd',function(){
          $('#ModalAdd').modal('show');
        });

        $('.modal-footer').on('click','#SubmitAdd',function(){
          $.ajax({
            type: 'POST',
            url: '/admin/accounts',
            data: {
              '_token': $('input[name=_token]').val(),
              'name': $('#AddUsername').val(),
              'password': $('#AddPassword').val(),

            },
            success: function(response){
              if(response.errors){
                toastr.error("Validation Error","Error Alert", {timeOut:5000});
              }
              else{

              toastr.success('Successfully Added Account','Success Alert', {timeOut:5000});
              // $('#AccountTable').prepend("<tr id = 'Account" + response.PK_AccountID + "'><td>" + response.PK_AccountID + "</td><td>" + response.Account_UserName +  "</td><td>" + response.Account_Status + "</td><td>" + response.Account_Rating + "</td><td>" + response.Account_AccessLevel + "</td><td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnEdit'>Edit</button></td><td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnDelete'>Delete</button></td></tr>");
              window.location.reload();
              }
            }

          });
        });

        $(document).on('click','#btnEdit',function(){
          id = $(this).data('id');
          $('#EditAccountID').val($(this).data('id'));
          $('#EditUsername').val($(this).data('name'));
          $('#EditPassword').val($(this).data('password'));
          $('#EditStatus').val($(this).data('status'));
          $('#EditRating').val($(this).data('rating'));
          $('#EditAccessLevel').val($(this).data('accesslevel'));
          $('#ModalEdit').modal('show');
        });

        $('.modal-footer').on('click','#SubmitEdit',function(){
          $.ajax({
            type: 'PUT',
            url: '/admin/accounts/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
              'name': $('#EditUsername').val(),
              'password': $('#EditPassword').val(),
              'status': $('#EditStatus').val(),
              'rating': $('#EditRating').val(),
              'accesslevel': $('#EditAccessLevel').val()
            },
            success: function(response){
              if(response.errors){
                toastr.error("Validation Error","Error Alert", {timeOut:5000});
              }
              else{
              toastr.success('Successfully Added Account','Success Alert', {timeOut:5000});
              window.location.reload();
              }
            }
          });
        });

        $(document).on('click', '#btnDelete', function(){
          id = $(this).data('id');
          $('#DeleteAccountID').val($(this).data('id'));
          $('#DeleteUsername').val($(this).data('name'));
          $('#DeletePassword').val($(this).data('password'));
          $('#DeleteStatus').val($(this).data('status'));
          $('#DeleteRating').val($(this).data('rating'));
          $('#DeleteAccessLevel').val($(this).data('accesslevel'));
          $('#ModalDelete').modal('show');
        });

        $('.modal-footer').on('click','#SubmitDelete',function()
        {
          $.ajax({
            type:'PUT',
            url: '/admin/accounts/updateStatus/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
              'name': $('#DeleteUsername').val(),
              'password': $('#DeletePassword').val(),
              'status': $('#DeleteStatus').val(),
              'rating': $('#DeleteRating').val(),
              'accesslevel': $('#DeleteAccessLevel').val(),
              'penaltyID': $('#DeleteReport').val()
            },
          success: function(response){
            toastr.success('Successfully Changed Brand Status','Success',{timeOut:5000})
            window.location.reload();

          }
          });
        });

        $(document).on('click', '#btnRestore', function(){
          id = $(this).data('id');
          $('#RestoreAccountID').val($(this).data('id'));
          $('#RestoreUsername').val($(this).data('name'));
          $('#RestorePassword').val($(this).data('password'));
          $('#RestoreStatus').val($(this).data('status'));
          $('#RestoreRating').val($(this).data('rating'));
          $('#RestoreAccessLevel').val($(this).data('accesslevel'));
          $('#ModalRestore').modal('show');
        });

        $('.modal-footer').on('click','#SubmitRestore',function()
        {
          $.ajax({
            type:'PUT',
            url: '/admin/accounts/updateStatusRestore/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
              'name': $('#RestoreUsername').val(),
              'password': $('#RestorePassword').val(),
              'status': $('#RestoreStatus').val(),
              'rating': $('#RestoreRating').val(),
              'accesslevel': $('#RestoreAccessLevel').val(),
            },
          success: function(response){
            toastr.success('Successfully Changed Brand Status','Success',{timeOut:5000})
            window.location.reload();

          }
          });
        });


        $(document).on('keyup','#SearchWord',function()
        {
          var delay =2000;
          $.ajax({
            type:'POST',
            url: '/admin/accounts/search',
            data: {
              '_token': $('input[name=_token]').val(),
              'category':$('#SearchCategory').val(),
              'word':$('#SearchWord').val()
            },
            beforeSend: function () {
              $("#AccountTable").replaceWith('<div class="wrap" id="AccountTable"><div class="loading"><div class="bounceball"></div><div class="text">NOW LOADING</div></div></div>');

            },
          success: function(response){
              setTimeout(function(){
              $('#AccountTable').replaceWith(response);
            },delay);

          }
          });
        });


      });

      $(".btn[data-target='#newregistrations']").text('Collapse');
      $(".btn[data-target='#newregistrations']").click(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#newregistrations']").dblclick(function() {
        if ($(this).text() == 'Expand') {
            $(this).text('Collapse');
        } else {
            $(this).text('Expand');
        }
    });
    $(".btn[data-target='#registeredaccounts']").text('Collapse');
  $(".btn[data-target='#registeredaccounts']").click(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });
  $(".btn[data-target='#registeredaccounts']").dblclick(function() {
      if ($(this).text() == 'Expand') {
          $(this).text('Collapse');
      } else {
          $(this).text('Expand');
      }
  });

  $(document).on('click','#btnApprove',function(){
    id = $(this).data('id');
    $('#ApprovalAccountID').val($(this).data('id'));
    $('#ApprovalUsername').val($(this).data('name'));
    $('#ApprovalPassword').val($(this).data('password'));
    $('#ApprovalStatus').val($(this).data('status'));
    $('#ApprovalRating').val($(this).data('rating'));
    $('#ApprovalAccessLevel').val($(this).data('accesslevel'));
    $('#ApprovalEmail').val($(this).data('email'));
    $('#ModalApprove').modal('show');
  });

  $('.modal-footer').on('click','#SubmitApprove',function(){
    $.ajax({
      type: 'PUT',
      url: '/admin/accounts/approve/' +id,
      data: {
        '_token': $('input[name=_token]').val(),
        'name': $('#ApprovalUsername').val(),
        'password': $('#ApprovalPassword').val(),
        'status': $('#ApprovalStatus').val(),
        'rating': $('#ApprovalRating').val(),
        'accesslevel': $('#ApprovalAccessLevel').val(),
        'email': $('#ApprovalEmail').val()

      },
      success: function(response){
        if(response.errors){
          toastr.error("Validation Error","Error Alert", {timeOut:5000});
        }
        else{

        toastr.success('Successfully Approved Account','Success Alert', {timeOut:5000});
        $('#AccountApproval' + response.PK_AccountID).remove();
        // $('#AccountTable').prepend("<tr id = 'Account" + response.PK_AccountID + "'><td>" + response.PK_AccountID + "</td><td>" + response.Account_UserName + "</td><td>"  + response.Account_Status + "</td><td>" + response.Account_Rating + "</td><td>" + response.Account_AccessLevel + "</td><td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnEdit'>Edit</button></td><td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnDelete'>Delete</button></td></tr>");
        window.location.reload();
        }
      }

    });
  });

    $(document).on('click','#btnReject',function(){
    id = $(this).data('id');
    $('#RejectAccountID').val($(this).data('id'));
    $('#RejectUsername').val($(this).data('name'));
    $('#RejectPassword').val($(this).data('password'));
    $('#RejectStatus').val($(this).data('status'));
    $('#RejectRating').val($(this).data('rating'));
    $('#RejectAccessLevel').val($(this).data('accesslevel'));
    $('#RejectEmail').val($(this).data('email'));
    $('#ModalRejected').modal('show');
  });

  $('.modal-footer').on('click','#SubmitReject',function(){
    $.ajax({
      type: 'PUT',
      url: '/admin/accounts/reject/' +id,
      data: {
        '_token': $('input[name=_token]').val(),
        'name': $('#RejectUsername').val(),
        'password': $('#RejectPassword').val(),
        'status': $('#RejectStatus').val(),
        'rating': $('#RejectRating').val(),
        'accesslevel': $('#RejectAccessLevel').val(),
        'email': $('#RejectEmail').val()

      },
      success: function(response){
        if(response.errors){
          toastr.error("Validation Error","Error Alert", {timeOut:5000});
        }
        else{
        toastr.warning('Account has been rejected','Reject Alert', {timeOut:5000});
        $('#AccountApproval' + response.PK_AccountID).remove();

        }
      }

    });
  });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>