@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="perrow">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

      <script>
      $(document).ready(function() {
          $("#TinNumber").keydown(function (e) {
              // Allow: backspace, delete, tab, escape, enter and .
              if ($.inArray(e.keyCode, [ 8, 9]) !== -1) {
                       // let it happen, don't do anything
                       return;
              }
              // Ensure that it is a number and stop the keypress
              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                  e.preventDefault();
              }
          });

          $("#mobileNumber").keydown(function (e) {
              // Allow: backspace, delete, tab, escape, enter and .
              if ($.inArray(e.keyCode, [ 8, 9]) !== -1) {
                       // let it happen, don't do anything
                       return;
              }
              // Ensure that it is a number and stop the keypress
              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                  e.preventDefault();
              }
          });
      }

      );

      function check(){
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
        document.getElementById('SubmitUpdate').disabled = false;
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
        document.getElementById('SubmitUpdate').disabled = true;
      }
      }

      </script>

      @foreach($AccountInformation as $Info)
      <form id="AccountForm" name="AccountForm" method="POST" action="/brand/changesettings" enctype="multipart/form-data">
      <h3 class="sub-header subsett">Account Settings<input style = "background-color:#337ab7;margin-right:15px;" type="submit" class="btn btn-primary" id="SubmitUpdate" value="Save Changes"></h3>
      <br>
      {{ csrf_field() }}


        <h5 class="perrow"><div class="lbl">Official Username:</div>    <input class="txtbox" type="text" maxlength="255" value="{{$Info->Account_UserName}}" name="txtBrandUsername" onkeyup="check();" required></h5>
        <h5 class="perrow"><div class="lbl">Password:</div>    <input class="txtbox" type="password" value="{{$Info->Account_Password}}" name="txtBrandPassword" id= "password" onkeyup='check();' required ></h5>
        <h5 class="perrow"><div class="lbl">Retype Password:</div>    <input class="txtbox" type="password" placeholder="Confirm Password" name="txtConfirmBrandPassword" id="confirm_password" maxlength="255"  onkeyup='check();' required> <div class="lbl" id="message"></div></h5>
        <h5 class="perrow"><div class="lbl">Recovery Question/Clue:</div>    <input class="txtbox" type="text" value = "What is the the brandClue?"></h5>
        <h5 class="perrow"><div class="lbl">Recovery Answer:</div>    <input class="txtbox" type="text" value = "brandClue"></h5>
        <h5 class="perrow"><div class="lbl">Profile Photo:</div>    <input class="txtbox" type="file" id="UploadedPic" name="ProfilePic"></h5>
      <br>
      <h3 class="sub-header subsett">Brand Settings</h3>
      <br>
        <h5 class="perrow"><div class="lbl">Brand Name:</div>    <input class="txtbox" type="text" maxlength="255" value="{{$Info->GuestBrand_Name}}" name="txtBrandName" required></h5>
        <h5 class="perrow"><div class="lbl">TIN Number:</div>    <input class="txtbox" type="text" maxlength="9" value="{{$Info->GuestBrand_TinNumber}}" name="txtBrandTinNumber" id="TinNumber" pattern=".{9}"   required></h5>
        <h5 class="perrow"><div class="lbl">Owner Name:</div>    <input class="txtbox" type="text" value="{{$Info->GuestBrand_OwnerName}}" name="txtBrandOwnerName" required></h5>
        <h5 class="perrow"><div class="lbl">Brand Description:</div>    <br><br> <textarea class="txtbox" style="font-weight:normal;width:600px;font-size:15px;height:200px;" rows="10" cols="40" name="txtBrandDescription">{{$Info->GuestBrand_Description}}</textarea></h5>
      <br>
      <h3 class="sub-header subsett">Contact Settings</h3>
      <br>
        <h5 class="perrow"><div class="lbl">Official Brand Website:</div>    <input class="txtbox" value = "{{$Info->GuestBrand_Website}}" type="text" maxlength="255" placeholder="Official Brand Website" name="txtBrandWebsiteName"></h5>

      @foreach($Brand->socialMediaAssets as $socialMediaAsset)
      <h5 class="perrow"><div class="lbl">{{$socialMediaAsset->SocialMediaAsset_Type}}</div>    <input class="txtbox" type="text" value="{{$socialMediaAsset->SocialMediaAsset_Info}}" name="txt{{$socialMediaAsset->SocialMediaAsset_Type}}" maxlength="255"></h5>
      @endforeach



        <h5 class="perrow"><div class="lbl">Official Brand Mobile Number:</div>    <input class="txtbox" type="text" maxlength="11" value="{{$Info->GuestBrand_MobileNumber}}" name="txtBrandMobileNumber" id="mobileNumber" pattern=".{11}" required></h5>
        <h5 class="perrow"><div class="lbl">Official Brand Email Address:</div>    <input class="txtbox" type="email" maxlength="255" value="{{$Info->GuestBrand_EmailAddress}}" name="txtBrandEmailAddress" required></h5>
      <br>
    </form>
    @endforeach
    </div>
  </div>
</div>




@endsection
