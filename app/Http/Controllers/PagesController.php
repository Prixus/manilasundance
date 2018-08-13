<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\account;
use App\guestBrand;

class PagesController extends Controller
{
    //
    public function brandsettings(){
      if(Session::get('UserAccountID') != null){
          $Account = account::find(Session::get('UserAccountID'));
          if($Account->Account_AccessLevel == "Brand"){
            $AccountInformation = DB::table('accounts')
            ->join('guest_brands', 'accounts.PK_AccountID', '=', 'guest_brands.PK_GuestBrandID')
            ->where('PK_AccountID', '=', Session::get('UserAccountID'))
            ->get();
            $Brand = guestBrand::find(Session::get('BrandID'));

          return view('navigation/brand/settings', ['AccountInformation'=> $AccountInformation,'Brand'=>$Brand]);
          }
          else{
            return redirect('/bazaar');
          }
      }
      else{
        return redirect('/login');
      }
    }

}
