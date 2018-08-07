@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


      @foreach($AccountInformation as $Info)
      <form id="AccountForm" name="AccountForm" method="POST" action="/brand/changesettings" enctype="multipart/form-data">
      <h2 class="sub-header">Account Settings<input style = "background-color:#337ab7;margin-left:5px;" type="submit" class="btn btn-primary" id="SubmitUpdate" value="Save"></h2>
      <br>
      {{ csrf_field() }}

        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Brand Name:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="text" maxlength="255" value="{{$Info->GuestBrand_Name}}" name="txtBrandName" required></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">TIN Number:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="text" maxlength="9" value="{{$Info->GuestBrand_TinNumber}}" name="txtBrandTinNumber" id="TinNumber" pattern=".{9}"   required></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Owner Name:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="text" value="{{$Info->GuestBrand_OwnerName}}" name="txtBrandOwnerName" required></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Official Brand Website:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" value="{{$Info->GuestBrand_Website}}" type="text" maxlength="255" placeholder="Official Brand Website" name="txtBrandWebsiteName"></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Social Media Assets:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="text" value="{{$Info->GuestBrand_SocialMediaAssets}}" name="txtBrandSocialMediaAssets" maxlength="255"></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Official Brand Mobile Number:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="text" maxlength="11" value="{{$Info->GuestBrand_MobileNumber}}" name="txtBrandMobileNumber" id="mobileNumber" pattern=".{11}" required></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Official Brand Email Address:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="email" maxlength="255" value="{{$Info->GuestBrand_EmailAddress}}" name="txtBrandEmailAddress" required></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Official Username:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="text" maxlength="255" value="{{$Info->Account_UserName}}" name="txtBrandUsername" required></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Password:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="password" value="{{$Info->Account_Password}}" name="txtBrandPassword" id= "password" required ></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Retype Password:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="password" placeholder="Confirm Password" name="txtConfirmBrandPassword" id="confirm_password" maxlength="255"  required></h5> <p id="message"></p>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Recovery Question/Clue:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="text" value = "What is the the brandClue?"></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Recovery Answer:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="text" value = "brandClue"></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Profile Photo:    <input style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;" type="file" id="UploadedPic" name="ProfilePic"></h5>
        <h5 style="font-weight:bold;width:820px;padding-bottom:8px;">Brand Description:    <br><br> <textarea style="font-weight:normal;width:600px;padding-right:0px;float:right;font-size:15px;height:200px;" rows="10" cols="40" name="txtBrandDescription">{{$Info->GuestBrand_Description}}</textarea></h5>
      <br>
    </form>
    @endforeach
    </div>
  </div>
</div>




@endsection
