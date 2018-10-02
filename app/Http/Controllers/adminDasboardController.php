<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
use App\reservation;
use App\billing;
use Session;
use DB;
use Carbon\Carbon;

class adminDasboardController extends Controller
{
    //
    public function index(){
      $accountRevenue = DB::table('billings')->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get();

      $accountRegistration = DB::table('accounts')->select(DB::raw("COUNT(*) as Users"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->where('Account_AccessLevel','=','brand')->orderBy('created_at','DESC')->groupBy(DB::raw("month(created_at), year(created_at)"))->first();

      //$reservationsCount = billing::where('Billing_SubTotal','>','0')->count();

      $reservationsCount = DB::table('billings')->select(DB::raw("COUNT(*) as NumberOfReservation"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get();

      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();


      $chartRegistration = DB::table('accounts')->select(DB::raw("COUNT(*) as count_row"), DB::raw("month(created_at) as months"))->where("Account_AccessLevel",'=','brand')->whereYear('created_at','=',Carbon::now())->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get(); //to get count number


      $chartReservation = DB::table('billings')->select(DB::raw("COUNT(*) as count_row"), DB::raw("month(created_at) as months"), DB::raw("year(created_at) as years"))->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])->whereYear('created_at','=',Carbon::now())->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get(); //to get count number


      $chartCollection = DB::table('billings')->select(DB::raw("SUM(Billing_SubTotal) as total"), DB::raw("month(created_at) as months"), DB::raw("year(created_at) as years"))->where('Billing_Status', 'Paid')->whereYear('created_at','=',Carbon::now())->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get();

      $yearlyReportsRevenue = DB::table('billings')->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->orderBy("created_at")->where('Billing_Status', 'Paid')->groupBy(DB::raw("month(created_at), year(created_at)"))->get();

      $yearlyReportsRegistration = DB::table('accounts')->select(DB::raw("COUNT(*) as TotalUsers"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get();

      $yearlyReportsReservation = DB::table('billings')->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get();

      return view('navigation/admin/dashboard', ['currentAccount' =>$currentAccount,'AccountRevenue' =>$accountRevenue, 'AccountRegistration' =>$accountRegistration, 'ReservationsCount'=>$reservationsCount, 'chartRegistration'
      =>$chartRegistration, 'chartReservation' =>$chartReservation,  'chartCollection' =>$chartCollection, 'yearlyRevenue' => $yearlyReportsRevenue, 'yearlyRegistration' => $yearlyReportsRegistration, 'yearlyReservation' => $yearlyReportsReservation
      ]);




    }
}
