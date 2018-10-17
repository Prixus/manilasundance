<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\account;
use Session;
use DB;
use PDF;
use Response;
use Validator;
use Carbon\Carbon;

class adminReportController extends Controller
{
    protected $rules =
   [

   ];

    public function form(){
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
      return view('navigation/admin/reportform', ['currentAccount' => $currentAccount]);
    }

    public function view(Request $request){
      $this->validate($request,[
        'TypeOfReport' => 'required',
        'StartDate' => 'required|before_or_equal:EndDate',
        'EndDate' => 'required',
      ]);

      $StartDate = $request->StartDate;
      $typeOfReport = $request->TypeOfReport;
      $EndDate = $request->EndDate;

      if($typeOfReport=="Revenue"){
        $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();

        $accountRevenue = DB::table('billings')
        ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"), DB::raw("month(created_at) as months"))
        ->where([['Billing_Status','<>','Void'],['billings.created_at','>=',$request->StartDate],['billings.created_at','<=',$request->EndDate]])
        ->whereYear('created_at','=',Carbon::now())
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at), year(created_at)"))
        ->get();

        $accountRevenuePerBazaar = DB::table('billings')
        ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
        ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
        ->where([['billings.Billing_Status','<>','Void'],['billings.created_at','>=',$request->StartDate],['billings.created_at','<=',$request->EndDate]])
        ->whereYear('billings.created_at','=',Carbon::now())
        ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
        ->get();
        $revenue = PDF::loadView('pdf/customreport', ['currentAccount' => $currentAccount, 'accountRevenue' =>$accountRevenue,'accountRevenuePerBazaar'=>$accountRevenuePerBazaar,'StartDate'=>$StartDate,'EndDate'=>$EndDate,'TypeOfReport'=>$typeOfReport]);
        return $revenue->stream('RevenueReport.pdf');
      }
      elseif ($typeOfReport=="User Registrations") {
        $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();

        $accountRegistration = DB::table('accounts')
        ->select(DB::raw("COUNT(*) as Users"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())
        ->where([['Account_AccessLevel','=','brand'],['billings.created_at','>=',$request->StartDate],['billings.created_at','<=',$request->EndDate]])
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at), year(created_at)"))
        ->get();
        $registration = PDF::loadView('pdf/customreport', ['currentAccount' => $currentAccount, 'accountRegistration' =>$accountRegistration,'StartDate'=>$StartDate,'EndDate'=>$EndDate,'TypeOfReport'=>$typeOfReport]);
        return $registration->stream('RegistrationReport.pdf');
      }
      else{
        $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();

        $reservationsCount = DB::table('billings')
        ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(created_at) as months"))
        ->whereYear('created_at','=',Carbon::now())
        ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void'],['billings.created_at','>=',$request->StartDate],['billings.created_at','<=',$request->EndDate]])
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at), year(created_at)"))
        ->get();

        $reservationsCountPerBazaar = DB::table('billings')
        ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
        ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
        ->whereYear('billings.created_at','=',Carbon::now())
        ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void'],['billings.created_at','>=',$request->StartDate],['billings.created_at','<=',$request->EndDate]])
        ->orderBy("billings.created_at")
        ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
        ->get();

        $reservationsVoid = DB::table('billings')
        ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"))
        ->whereYear('billings.created_at','=',Carbon::now())
        ->where([['Billing_Status','=','void'],['billings.created_at','>=',$request->StartDate],['billings.created_at','<=',$request->EndDate]])
        ->orderBy("billings.created_at")
        ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
        ->get();

        $reservationsVoidPerBazaar = DB::table('billings')
        ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
        ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
        ->whereYear('billings.created_at','=',Carbon::now())
        ->where([['Billing_Status','=','void'],['billings.created_at','>=',$request->StartDate],['billings.created_at','<=',$request->EndDate]])
        ->orderBy("billings.created_at")
        ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
        ->get();

        $bazaarCount = DB::table('bazaars')
        ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
        ->whereYear('created_at','=',Carbon::now())
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at), year(created_at)"))
        ->get();
        $reservation = PDF::loadView('pdf/customreport', ['currentAccount' => $currentAccount, 'reservationsCount' => $reservationsCount, 'reservationsVoid' => $reservationsVoid,'bazaarCount'=>$bazaarCount,'reservationsCountPerBazaar'=>$reservationsCountPerBazaar,'reservationsVoidPerBazaar'=>$reservationsVoidPerBazaar,'StartDate'=>$StartDate,'EndDate'=>$EndDate,'TypeOfReport'=>$typeOfReport]);
        return $reservation->stream('ReservationReport.pdf');
      }


    }

    public function detailedrevenue(){
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();

      $accountRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"), DB::raw("month(created_at) as months"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $accountRevenuePerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      // print_r($accountRevenuePerBazaar);

      return view('navigation/admin/detailedrevenue', ['currentAccount' => $currentAccount, 'accountRevenue' =>$accountRevenue,'accountRevenuePerBazaar'=>$accountRevenuePerBazaar]);
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
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $reservationsCountPerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      $reservationsVoid = DB::table('billings')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"))
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where('Billing_Status','=','Void')
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
      ->get();

      $reservationsVoidPerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where('Billing_Status','=','void')
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      $bazaarCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      return view('navigation/admin/detailedreservations', ['currentAccount' => $currentAccount, 'reservationsCount' => $reservationsCount, 'reservationsVoid' => $reservationsVoid,'bazaarCount'=>$bazaarCount,'reservationsCountPerBazaar'=>$reservationsCountPerBazaar,'reservationsVoidPerBazaar'=>$reservationsVoidPerBazaar]);
    }


    public function printrevenuereport(){
      $accountRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"), DB::raw("month(created_at) as months"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $accountRevenuePerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
        ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      $revenue = PDF::loadView('pdf/revenuereport', ['accountRevenue' =>$accountRevenue, 'accountRevenuePerBazaar'=>$accountRevenuePerBazaar]);
      return $revenue->stream('RevenueReport.pdf');
    }

    public function printreservationreport(){


      $reservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $reservationsCountPerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      $reservationsVoid = DB::table('billings')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"))
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where('Billing_Status','=','Void')
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
      ->get();

      $reservationsVoidPerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where('Billing_Status','=','Void')
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      $bazaarCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();
      $reservation = PDF::loadView('pdf/reservationreport', ['reservationsCount' => $reservationsCount, 'reservationsVoid' => $reservationsVoid,'bazaarCount'=>$bazaarCount,'reservationsCountPerBazaar'=>$reservationsCountPerBazaar,'reservationsVoidPerBazaar'=>$reservationsVoidPerBazaar]);
      return $reservation->stream('ReservationReport.pdf');
    }

    public function printregistrationreport(){
      $accountRegistration = DB::table('accounts')->select(DB::raw("COUNT(*) as Users"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->where('Account_AccessLevel','=','brand')->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get();
      $registration = PDF::loadView('pdf/registrationreport', ['accountRegistration' =>$accountRegistration]);
      return $registration->stream('RegistrationReport.pdf');
    }
}
