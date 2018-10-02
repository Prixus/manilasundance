@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



          <!-- #1 Dessa added 08-20-2018 start -->

          <h1 class="header" style = "color:#3ce1e0;">Accounts
            <div style = "float:right;font-size:14px;color:black;margin-top:14px;">
              <form style = "float:left;">
                    {{ csrf_field()}}
              <input type = "text" placeholder = "Search..." id="SearchWord">
              <button class = "btnSearch">GO</button>
              <!--
              <select id="SearchCategory">
                <option value="Account_UserName">Username</option>
                <option value="PK_AccountID">AccountID</option>
                <option value="Account_Status">Status</option>
                <option value="Account_AccessLevel">Accesslevel</option>
                <option value="Account_Rating">Rating</option>
              </select>
              <button class = "btnSearch">GO</button>
              -->
              <!-- MODAL data toggle data-target-->

              <!-- MODAL data toggle data-target-->
              </form>
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
                    @foreach($ForApprovalaccounts as $ForApprovalaccount)
                    <tr id = "AccountApproval{{$ForApprovalaccount->PK_AccountID}}">
                      <td>{{$ForApprovalaccount->PK_AccountID}}</td>
                      <td>{{$ForApprovalaccount->Account_UserName}}</td>
                      <td>{{$ForApprovalaccount->Account_Status}}</td>
                      <td>{{$ForApprovalaccount->Account_Rating}}</td>
                      <td>{{$ForApprovalaccount->Account_AccessLevel}}</td>
                      <td>{{$ForApprovalaccount->GuestBrand_EmailAddress}}</td>
                      <td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '{{$ForApprovalaccount->PK_AccountID}}' data-name ='{{$ForApprovalaccount->Account_UserName}}' data-password = '{{$ForApprovalaccount->Account_Password}}' data-status='{{$ForApprovalaccount->Account_Status}}' data-rating = '{{$ForApprovalaccount->Account_Rating}}' data-accesslevel = '{{$ForApprovalaccount->Account_AccessLevel}}' id='btnApprove' data-email = {{$ForApprovalaccount->GuestBrand_EmailAddress}}>Approve</button></td>
                      <td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '{{$ForApprovalaccount->PK_AccountID}}' data-name ='{{$ForApprovalaccount->Account_UserName}}' data-password = '{{$ForApprovalaccount->Account_Password}}' data-status='{{$ForApprovalaccount->Account_Status}}' data-rating = '{{$ForApprovalaccount->Account_Rating}}' data-accesslevel = '{{$ForApprovalaccount->Account_AccessLevel}}' id='btnReject' data-email = {{$ForApprovalaccount->GuestBrand_EmailAddress}}>Reject</button></td>
                      <td><button style = 'background-color:#337ab7;float:right;' class='btn btn-primary'><a style = "color:#fff;" href="/admin/brandprofile/{{$ForApprovalaccount->PK_AccountID}}">See Profile</a></button></td>

                    </tr>
                    @endforeach


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
                </tr>
                {{ csrf_field()}}
              </thead>
              <tbody>
                @foreach($accounts as $account)
                <tr id = "Account{{$account->PK_AccountID}}">
                  <td>{{$account->PK_AccountID}}</td>
                  <td>{{$account->Account_UserName}}</td>
                  <td>{{$account->Account_Status}}</td>
                  <td>{{$account->Account_Rating}}</td>
                  <td>{{$account->Account_AccessLevel}}</td>
                  <td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '{{$account->PK_AccountID}}' data-name ='{{$account->Account_UserName}}' data-password = '{{$account->Account_Password}}' data-status='{{$account->Account_Status}}' data-rating = '{{$account->Account_Rating}}' data-accesslevel = '{{$account->Account_AccessLevel}}' id='btnEdit'>Edit</button></td>
                  <td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '{{$account->PK_AccountID}}' data-name ='{{$account->Account_UserName}}' data-password = '{{$account->Account_Password}}' data-status='{{$account->Account_Status}}' data-rating = '{{$account->Account_Rating}}' data-accesslevel = '{{$account->Account_AccessLevel}}' id='btnDelete'>Delete</button></td>
                  @if($account->Account_AccessLevel == "Brand")
                  <td><button style = 'background-color:#337ab7;float:right;' class='btn btn-primary'><a style = "color:#fff;" href="/admin/brandprofile/{{$account->PK_AccountID}}">See Profile</a></button></td>
                  @endif
                </tr>
                @endforeach

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
                          <select id="EditStatus" class="form-control">
                            <option value="Activated">Activated</option>
                            <option value="Deactivated">Deactivated</option>
                            <option value="ForApproval">For Approval</option>
                          </select>
                        </div>
  					              <div class = "form-group">
                          <label> ACCOUNT RATING:</label>
                            <select id="EditRating" class="form-control">
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

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-danger" data-dismiss = "modal" id="SubmitDelete">DELETE ACCOUNT </button>
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
              $('#AccountTable').prepend("<tr id = 'Account" + response.PK_AccountID + "'><td>" + response.PK_AccountID + "</td><td>" + response.Account_UserName +  "</td><td>" + response.Account_Status + "</td><td>" + response.Account_Rating + "</td><td>" + response.Account_AccessLevel + "</td><td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnEdit'>Edit</button></td><td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnDelete'>Delete</button></td></tr>");
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
              $('#Account' + response.PK_AccountID).replaceWith("<tr id = 'Account" + response.PK_AccountID + "'><td>" + response.PK_AccountID + "</td><td>" + response.Account_UserName + "</td><td>"  + response.Account_Status + "</td><td>" + response.Account_Rating + "</td><td>" + response.Account_AccessLevel + "</td><td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnEdit'>Edit</button></td><td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnDelete'>Delete</button></td></tr>");
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
            type:'DELETE',
            url: '/admin/accounts/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
            },
          success: function(response){
              $('#Account' + response.PK_AccountID).remove();
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
        $('#AccountTable').prepend("<tr id = 'Account" + response.PK_AccountID + "'><td>" + response.PK_AccountID + "</td><td>" + response.Account_UserName + "</td><td>"  + response.Account_Status + "</td><td>" + response.Account_Rating + "</td><td>" + response.Account_AccessLevel + "</td><td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnEdit'>Edit</button></td><td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnDelete'>Delete</button></td></tr>");
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

@endsection
