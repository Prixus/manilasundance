<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\guestBrand;
use App\account;
use App\billing;
use App\Mail\RegistrationRejected;
use App\Mail\RegistrationApproved;
use Validator;
use Response;
use Session;

class BrandProfileController extends Controller
{
  protected $rules =
 [
   'name' => 'required|unique:accounts,Account_UserName|max:255',
   'password' => 'required|max:255',
 ];
 protected $rules2 =
[
  'name' => 'required|max:255',
  'password' => 'required|max:255',
  'status' => 'required',
  'rating' => 'required',
  'accesslevel' => 'required',
];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function brandprofile($id)
    {
        	//

            $AccountInformation = DB::table('accounts')
            ->join('guest_brands', 'accounts.FK_GuestBrandID', '=', 'guest_brands.PK_GuestBrandID')
            ->where('PK_AccountID', '=', $id)
            ->first();

            $Brand = guestBrand::find($AccountInformation->PK_GuestBrandID);

            $billings = billing::where([['FK_AccountID','=',$id],['Billing_Status','<>','Void'],['Billing_SubTotal','>','0']])->get();

       		$currentAccount = account::where('PK_AccountID','=',$id)->first();
          	return view('navigation/admin/brandprofile', ['AccountInformation'=> $AccountInformation,'Brand'=>$Brand,'currentAccount'=>$currentAccount,'Brand'=>$Brand,'billings'=>$billings]);
    }


}
