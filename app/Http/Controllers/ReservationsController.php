<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
use App\guestBrand;
use App\socialMediaAssets;
use Session;
class UpdateAccountSettings extends Controller
{
    //
    public function updateBrand(Request $request){
      $this->validate($request,[
        'txtBrandName' => 'required|max:255',
        'txtBrandTinNumber' => 'required|digits:9',
        'txtBrandOwnerName' => 'required|max:255',
        'txtBrandWebsiteName' => 'max:255|nullable',
        'txtBrandSocialMediaAssets' => 'max:255|nullable',
        'txtBrandMobileNumber' => 'required|digits:11',
        'txtBrandEmailAddress' => 'required|max:255',
        'txtBrandUsername' => 'required|max:255',
        'txtBrandPassword' => 'required|max:255',
        'txtBrandDescription' => 'required|max:1028'
      ]);
          /*
                $message = new Message;
                  $message->name =  $request->input('name');
                  $message->email =  $request->input('email');
                  $message->message =  $request->input('message');
                  $message->save();

                  return redirect('/');
          */
      $Brand =  guestBrand::find(Session::get('BrandID'));
      $Brand->GuestBrand_Name = $request->input('txtBrandName');
      $Brand->GuestBrand_Description = $request->input('txtBrandDescription');
      $Brand->GuestBrand_OwnerName = $request->input('txtBrandOwnerName');
      $Brand->GuestBrand_TinNumber = $request->input('txtBrandTinNumber');
      $Brand->GuestBrand_Website = $request->input('txtBrandWebsiteName');
      $Brand->GuestBrand_MobileNumber = $request->input('txtBrandMobileNumber');
      $Brand->GuestBrand_EmailAddress = $request->input('txtBrandEmailAddress');
      $Brand->save();


      foreach($Brand->socialMediaAssets as $socialMediaAsset){
                if($socialMediaAsset->SocialMediaAsset_Type=="Facebook"){
                  $socialMediaAsset->SocialMediaAsset_Info = $request->input('txtFacebook');
                }
                else if($socialMediaAsset->SocialMediaAsset_Type=="Twitter"){
                  $socialMediaAsset->SocialMediaAsset_Info = $request->input('txtTwitter');
                }
                else if($socialMediaAsset->SocialMediaAsset_Type=="Instagram"){
                  $socialMediaAsset->SocialMediaAsset_Info = $request->input('txtInstagram');
                }
                else{
                    $socialMediaAsset->SocialMediaAsset_Info = "";
                }
                      $socialMediaAsset->save();
        }

      $Account = account::find(Session::get('UserAccountID'));
      $Account->Account_UserName = $request->input('txtBrandUsername');
      $Account->Account_Password = $request->input('txtBrandPassword');
      $Account->FK_GuestBrandID = Session::get('BrandID');

      $fileName = md5(rand());
      $fileName = $fileName.".jpg"; // generates file name
      $target = "profilepicture/";
      $fileTarget = $target.$fileName;
      $tempFileName = $_FILES['ProfilePic']['tmp_name'];
      $result = move_uploaded_file($tempFileName,$fileTarget);
      $Account->Account_ProfilePicture = $fileTarget;

      $Account->save();

      return redirect('/brand/settings');

    }
}
