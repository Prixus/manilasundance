<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordEmail;
use Illuminate\Http\Request;
use App\guestBrand;
use App\account;
use App\socialMediaAssets;


class RegistrationsController extends Controller
{
    //
    public function submit(Request $request){
      /*sample validation
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required']);
      */
      $this->validate($request,[
        'txtBrandName' => 'required|unique:guest_brands,GuestBrand_OwnerName|max:255',
        'txtBrandTinNumber' => 'required|unique:guest_brands,GuestBrand_TinNumber|digits:9',
        'txtBrandOwnerName' => 'required|max:255',
        'txtFacebook' => 'max:255|nullable',
        'txtTwitter' => 'max:255|nullable',
        'txtInstagram' => 'max:255|nullable',
        'txtBrandMobileNumber' => 'required|digits:11',
        'txtBrandEmailAddress' => 'required|max:255',
        'txtBrandUsername' => 'required|unique:accounts,Account_UserName|max:255',
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
          $GuestBrands = DB::table('guest_brands')->join('accounts','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')->get();
          foreach ($GuestBrands as $GuestBrand) {
            if(($request->txtBrandEmailAddress == $GuestBrand->GuestBrand_EmailAddress) && ($GuestBrand->Account_Status =="Activated")){
              return back()->with('status', 'An account with the same email address has already been activated.');
            }
    }

      $Brand = new guestBrand;
      $Brand->GuestBrand_Name = $request->input('txtBrandName');
      $Brand->GuestBrand_Description = $request->input('txtBrandDescription');
      $Brand->GuestBrand_OwnerName = $request->input('txtBrandOwnerName');
      $Brand->GuestBrand_TinNumber = $request->input('txtBrandTinNumber');
      $Brand->GuestBrand_Website = $request->input('txtBrandWebsiteName');
      $Brand->GuestBrand_MobileNumber = $request->input('txtBrandMobileNumber');
      $Brand->GuestBrand_EmailAddress = $request->input('txtBrandEmailAddress');
      $Brand->save();

      $socialMediaAssetsFacebook = new socialMediaAssets;
      $socialMediaAssetsFacebook->SocialMediaAsset_Type = "Facebook";
      $socialMediaAssetsFacebook->FK_GuestBrandID = $Brand->PK_GuestBrandID;
      $socialMediaAssetsFacebook->SocialMediaAsset_Info = $request->input('txtFacebook');
      $socialMediaAssetsFacebook->save();
      $socialMediaAssetsTwitter = new socialMediaAssets;
      $socialMediaAssetsTwitter->SocialMediaAsset_Type = "Twitter";
      $socialMediaAssetsTwitter->FK_GuestBrandID = $Brand->PK_GuestBrandID;
      $socialMediaAssetsTwitter->SocialMediaAsset_Info = $request->input('txtTwitter');
      $socialMediaAssetsTwitter->save();
      $socialMediaAssetsInstagram = new socialMediaAssets;
      $socialMediaAssetsInstagram->SocialMediaAsset_Type = "Instagram";
      $socialMediaAssetsInstagram->FK_GuestBrandID = $Brand->PK_GuestBrandID;
      $socialMediaAssetsInstagram->SocialMediaAsset_Info = $request->input('txtInstagram');
      $socialMediaAssetsInstagram->save();





      $GuestBrandID = DB::table('guest_brands')->where([
                                           ['GuestBrand_Name','=',$request->input('txtBrandName')],
                                           ['GuestBrand_TinNumber','=', $request->input('txtBrandTinNumber')],
                                           ])->value('PK_GuestBrandID');

      $Account = new account;
      $Account->Account_UserName = $request->input('txtBrandUsername');
      $Account->Account_Status = "ForApproval";
      $Account->Account_Password = $request->input('txtBrandPassword');
      $Account->Account_Rating = "Normal";
      $Account->Account_AccessLevel = "Brand";
      $Account->FK_GuestBrandID = $GuestBrandID;
      $Account->Account_Balance = 0.00;
      $Account->save();

      $AdminAccounts = account::where('Account_AccessLevel','=','Admin');
      foreach($AdminAccounts as $AdminAccount){
        $AdminAccounts->notify(new AccountRegistration($Account));
      }

      return redirect('/');
    }

    public function login(Request $request){
     $username = $request->input('txtUserName');
     $password = $request->input('txtUserPassword');

     $checkLoginCount = DB::table('accounts')->where(['Account_UserName' => $username,'Account_Password'=> $password,'Account_Status'=>'Activated',['Account_Rating','<>','Banned']])->count();



     if($checkLoginCount > 0){
       $checkLogin = DB::table('accounts')->where(['Account_UserName' => $username,'Account_Password'=> $password,'Account_Status'=>'Activated'])->get();
       $checkLoginBrand = DB::table('guest_brands')->where(['PK_GuestBrandID' => $checkLogin[0]->FK_GuestBrandID])->get();
       if($checkLogin[0]->Account_AccessLevel == "Brand"){
       Session::put('UserAccountID', $checkLogin[0]->PK_AccountID);
       Session::put('BrandID', $checkLoginBrand[0]->PK_GuestBrandID);
       return redirect('/brand/bazaars');
        }
       else if($checkLogin[0]->Account_AccessLevel == "Admin"){
         Session::put('UserID', $checkLogin[0]->PK_AccountID);
         return redirect('/admin/dashboard');
       }
       else{
          return redirect('/login');
       }
     }
     else{
       return redirect('/login')->with('status','No Existing Account or Account for Confirmation');
     }
    }

    public function logout($id){
      if($id == "Admin"){
        Session::put("UserID",null);
      }
      else{
        Session::put("UserAccountID",null);
      }

      return redirect('/');
    }

    public function forgotpassword(Request $request){
      $accountandguestbrand = DB::table('accounts')
                 ->join('guest_brands','PK_GuestBrandID','=','FK_GuestBrandID')
                 ->where('guest_brands.GuestBrand_EmailAddress','=',$request->Email)
                 ->get();

        foreach ($accountandguestbrand as $accountID) {
              $account = account::find($accountID->PK_AccountID);
        }


        Mail::to($request->Email)->send(new ForgotPasswordEmail($account));

        return response($accountandguestbrand);
    }
}
