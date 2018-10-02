<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
use Session;
use DB;
use Carbon\Carbon;

class adminReportController extends Controller
{
    //
    public function form(){
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
      return view('navigation/admin/reportform', ['currentAccount' => $currentAccount]);
    }

    public function view(){
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
      return view('navigation/admin/viewreport', ['currentAccount' => $currentAccount]);
    }

    public function detailedrevenue(){
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();

      $accountRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"), DB::raw("month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      return view('navigation/admin/detailedrevenue', ['currentAccount' => $currentAccount, 'accountRevenue' =>$accountRevenue]);
    }

    public function detailedregistrations(){
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();

      $accountRegistration = DB::table('accounts')->select(DB::raw("COUNT(*) as Users"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->where('Account_AccessLevel','=','brand')->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get();

      return view('navigation/admin/detailedregistrations', ['currentAccount' => $currentAccount, 'accountRegistration' =>$accountRegistration]);
    }

    public function detailedreservations(){
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();

      $reservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Billing_SubTotal','>','0')
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $reservationsVoid = DB::table('billings')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"))
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where('Billing_Status','=','void')
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
      ->get();

      $bazaarCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      return view('navigation/admin/detailedreservations', ['currentAccount' => $currentAccount, 'reservationsCount' => $reservationsCount, 'reservationsVoid' => $reservationsVoid,'bazaarCount'=>$bazaarCount]);
    }

}
