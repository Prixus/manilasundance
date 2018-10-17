<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bazaar;
use App\account;
use session;

class BrandCalendarController extends Controller
{
    //
    public function index()
    {
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();
      $bazaars = bazaar::where('Bazaar_Status','=','Available')->get();
      return view('navigation/admin/calendar', ['bazaars' => $bazaars, 'currentAccount'=>$currentAccount]);
    }
}
