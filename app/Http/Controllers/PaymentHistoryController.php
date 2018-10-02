<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\account;
use App\billing;
use Validator;
use Response;
use Session;

class PaymentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index()
    {
        //
        $billings = billing::where([['FK_AccountID','=',Session::get('UserAccountID')],['Billing_Status','<>','Void']])->get();
        $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();
        return view('navigation/brand/paymenthistory', ['currentAccount'=> $currentAccount, 'billings' => $billings]);
    }



}
