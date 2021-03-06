@extends('layouts.app')

@section('content')
<br><br>

  <!-- multistep form -->
<form id="msform" action="/brand/login" method="POST">
  <!-- progressbar
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Brand Profile</li>
    <li>Personal Details</li>
  </ul> -->
    {{ csrf_field()}}
  <div class = "login">
  <!-- fieldsets -->
  <fieldset>
    <br>
    <br>
    <h2 class="fs-title">Login Here</h2>
    <br>
    <P>Username:</P>
    <input type="text" name="txtUserName" placeholder="Enter Username" >
    <P>Password:</P>
    <input id="id_password" type="password" name="txtUserPassword" placeholder="Enter Password" >
    <input style="float:left;display:inline-block;width:15px;height:15px;" name="Show Password" type="checkbox" onclick="showpassword()">
    <label style="float:left;width:150px;display:inline-block;font-weight:normal;margin-top:5px;">Show Password</label><br><br><br>
    <input type="submit" name="login" class="submit action-button" value="Log in" /><br>
    <label class="fpass"><a href="#">Forgot password?</a></label><br>
    <a href = "/signup">Don't have an account? Sign up now!</a><br>
</fieldset>

<img src = "img/sign/pink-icon.png" class = "avatar">
</div>
</form>



 <!-- start forgot password dessa 2018-0926  -->

<!-- modal for forgotpassword reservation -->
<div id="modalForgotPassword" class = "modal fade"  role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header" style="background-color: #ffffa8">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                        <h4 class ="modal-title"> Recover Account Through Email </h4>
                      </div>
                      <div class="modal-body">
                        <form>

                          <div class = "form-group">
                            <label> To recover your account, we will send you an email regarding your account. We advise that you change your password immediately. </label>
                            <br>
                            <br>
                            <br>
                            <input type="text" class = "form-control" placeholder="Input your registered email here." name="Email" id="Email">
                          </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-primary" data-dismiss = "modal" id="SubmitEmail"> SUBMIT </button>
                        <button type ="button" class = "btn btn-default" data-dismiss = "modal">CLOSE </button>
                      </div>
                    </div>
              </div>
            </div>

<!--  end forgot password dessa 2018-0926  -->


<script type="text/javascript">

       function showpassword() {
        var x = document.getElementById("id_password");
          if (x.type === "password") {
              x.type = "text";
          } else {
              x.type = "password";
          }
        }

        $(document).on('click', '.fpass', function(){
          $('#modalForgotPassword').modal('show');
        });


        $('.modal-footer').on('click','#SubmitEmail',function(){
          $.ajax({
            type: 'POST',
            url: '/forgotpassword',
            data: {
              '_token': $('input[name=_token]').val(),
              'Email': $('#Email').val()

            },
            success: function(response){

              toastr.success('Successfully Sent Email to your Account','Success Alert', {timeOut:5000});

            }

          });
        });



</script>
@endsection
