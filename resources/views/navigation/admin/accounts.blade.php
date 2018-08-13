@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Brand Accounts
		  <div style = "float:right;font-size:14px;">
          <form>
                {{ csrf_field()}}
					<input type = "text" placeholder = "Search..." id="SearchWord">
          <select id="SearchCategory">
            <option value="Account_UserName">Username</option>
            <option value="PK_AccountID">AccountID</option>
            <option value="Account_Status">Status</option>
            <option value="Account_AccessLevel">Accesslevel</option>
            <option value="Account_Rating">Rating</option>
          </select>
          </form>
					</div>
		  </h2>
          <div class="table-responsive">
		  <div style = "float:right;font-size:19px;">

		  <!-- MODAL data toggle data-target-->
		  <button style = "background-color:#337ab7;float:right;" class="btn btn-primary" id="btnAdd">Add Account</button><!-- MODAL data toggle data-target-->
		  </div>
            <table class="table table-striped" id ="AccountTable">
              <thead>
                <tr>
                  <th>Account ID</th>
                  <th>Account Username</th>
                  <th>Account Password</th>
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
                  <td>{{$account->Account_Password}}</td>
                  <td>{{$account->Account_Status}}</td>
                  <td>{{$account->Account_Rating}}</td>
                  <td>{{$account->Account_AccessLevel}}</td>
                  <td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '{{$account->PK_AccountID}}' data-name ='{{$account->Account_UserName}}' data-password = '{{$account->Account_Password}}' data-status='{{$account->Account_Status}}' data-rating = '{{$account->Account_Rating}}' data-accesslevel = '{{$account->Account_AccessLevel}}' id='btnEdit'>Edit</button></td>
                  <td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '{{$account->PK_AccountID}}' data-name ='{{$account->Account_UserName}}' data-password = '{{$account->Account_Password}}' data-status='{{$account->Account_Status}}' data-rating = '{{$account->Account_Rating}}' data-accesslevel = '{{$account->Account_AccessLevel}}' id='btnDelete'>Delete</button></td>

                </tr>
                @endforeach

                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- This is the Modal that will be called for edit column -->
    <div class = "modal fade" id = "ModalAdd" role = "dialog">
      <div class = "modal-dialog">

        <div class="modal-content">
          <div class = "modal-header">
            <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                  <h4 class ="modal-title">Account Registration </h4>
                </div>
                <div class="modal-body">
                  <form style="text-align:center">

                    <div class = "form-group">
                      <label> Account Username: </label>
                      <input type="text" placeholder="Enter Username" id="AddUsername" required>
                    </div>
                    <div class="form-group">
                      <label> Account Password </label>
                      <input type= "password" placeholder="Enter Password" id="AddPassword" required>
                    </div>

                </form>
                </div>
                <div class = "modal-footer">
                  <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitAdd">Add Account </button>
                  <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                </div>
              </div>
        </div>
      </div>
         <!-- MODAL -->


        <!-- This is the Modal that will be called for edit column -->
        <div class = "modal fade" id = "ModalEdit" role = "dialog">
          <div class = "modal-dialog">

            <div class="modal-content">
              <div class = "modal-header">
                <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                      <h4 class ="modal-title">Account Registration </h4>
                    </div>
                    <div class="modal-body">
                      <form style="text-align:center">
                        <div class = "form-group">
                          <label> Account ID: </label>
                          <input type="number"  id="EditAccountID" disabled>
                        </div>
                        <div class = "form-group">
                          <label> Account Username: </label>
                          <input type="text" placeholder="Enter Username" id="EditUsername" required>
                        </div>
                        <div class="form-group">
                          <label> Account Password </label>
                          <input type= "password" placeholder="Enter Password" id="EditPassword" required>
                        </div>
                        <div class = "form-group">
                          <label> Account Status </label>
                          <select id="EditStatus">
                            <option value="Activated">Activated</option>
                            <option value="Deactivated">Deactivated</option>
                          </select>
                        </div>
  					              <div class = "form-group">
                            <select id="EditRating">
                              <option value="Warning">Warning</option>
                              <option value="Normal">Normal</option>
                              <option value="Banned">Banned</option>
                            </select>
                        </div>
  					              <div class = "form-group">
                          <label> Account Access Level </label>
                          <select id="EditAccessLevel" disabled>
                            <option value="Admin">Admin</option>
                            <option value="Brand">Brand</option>
                          </select>
                        </div>

                    </form>
                    </div>
                    <div class = "modal-footer">
                      <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitEdit">Add Account </button>
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
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                        <h4 class ="modal-title">Account Registration </h4>
                      </div>
                      <div class="modal-body">
                        <form style="text-align:center">
                          <div class = "form-group">
                            <label> Account ID: </label>
                            <input type="number"  id="DeleteAccountID" disabled>
                          </div>
                          <div class = "form-group">
                            <label> Account Username: </label>
                            <input type="text" placeholder="Enter Username" id="DeleteUsername" disabled>
                          </div>
                          <div class="form-group">
                            <label> Account Password </label>
                            <input type= "password" placeholder="Enter Password" id="DeletePassword" disabled>
                          </div>
                          <div class = "form-group">
                            <label> Account Status </label>
                            <select id="DeleteStatus" disabled>
                              <option value="Activated">Activated</option>
                              <option value="Deactivated">Deactivated</option>
                            </select>
                          </div>
    					              <div class = "form-group">
                              <select id="DeleteRating" disabled>
                                <option value="Warning">Warning</option>
                                <option value="Normal">Normal</option>
                                <option value="Banned">Banned</option>
                              </select>
                          </div>
    					              <div class = "form-group">
                            <label> Account Access Level </label>
                            <select id="DeleteAccessLevel" disabled>
                              <option value="Admin">Admin</option>
                              <option value="Brand">Brand</option>
                            </select>
                          </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitDelete">Delete Account </button>
                        <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
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
              $('#AccountTable').prepend("<tr id = 'Account" + response.PK_AccountID + "'><td>" + response.PK_AccountID + "</td><td>" + response.Account_UserName + "</td><td>" + response.Account_Password + "</td><td>" + response.Account_Status + "</td><td>" + response.Account_Rating + "</td><td>" + response.Account_AccessLevel + "</td><td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnEdit'>Edit</button></td><td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnDelete'>Delete</button></td></tr>");
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
              $('#Account' + response.PK_AccountID).replaceWith("<tr id = 'Account" + response.PK_AccountID + "'><td>" + response.PK_AccountID + "</td><td>" + response.Account_UserName + "</td><td>" + response.Account_Password + "</td><td>" + response.Account_Status + "</td><td>" + response.Account_Rating + "</td><td>" + response.Account_AccessLevel + "</td><td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnEdit'>Edit</button></td><td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '" + response.PK_AccountID + "' data-name ='" + response.Account_UserName + "' data-password = '" + response.Account_Password + "' data-status='" + response.Account_Status + "' data-rating = '" + response.Account_Rating + "' data-accesslevel = '" + response.Account_AccessLevel + "' id='btnDelete'>Delete</button></td></tr>");
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

</script>

@endsection
