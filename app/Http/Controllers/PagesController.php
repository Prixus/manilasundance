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
            $AccountInformation = DB::table('accounts')
            ->join('guest_brands', 'accounts.FK_GuestBrandID', '=', 'guest_brands.PK_GuestBrandID')
            ->where('PK_AccountID', '=', Session::get('UserAccountID'))
            ->get();
            $Brand = guestBrand::find(Session::get('BrandID'));
            $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();
            
          return view('navigation/brand/settings', ['AccountInformation'=> $AccountInformation,'Brand'=>$Brand,'currentAccount'=>$currentAccount]);
    }

    public function adminbilling(){
                $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
                return view('navigation/admin/billing',['currentAccount'=>$currentAccount]);
    }

}
