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


      $accountFirstQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','3')
      ->whereMonth('billings.created_at','>=','1')
      ->first();

      $accountSecondQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','6')
      ->whereMonth('billings.created_at','>=','4')
      ->first();

      $accountThirdQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','9')
      ->whereMonth('billings.created_at','>=','7')
      ->first();

      $accountFourthQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','12')
      ->whereMonth('billings.created_at','>=','10')
      ->first();


      $accountAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->first();

      $accountFirstSemiAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('created_at','=',Carbon::now())
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $accountSecondSemiAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->whereYear('created_at','=',Carbon::now())
      ->first();

      // print_r($accountFirstQuarterRevenue);

      return view('navigation/admin/detailedrevenue', ['currentAccount' => $currentAccount, 'accountRevenue' =>$accountRevenue,'accountRevenuePerBazaar'=>$accountRevenuePerBazaar,'accountFirstQuarterRevenue'=>$accountFirstQuarterRevenue,'accountSecondQuarterRevenue'=>$accountSecondQuarterRevenue,'accountThirdQuarterRevenue'=>$accountThirdQuarterRevenue,'accountFourthQuarterRevenue'=>$accountFourthQuarterRevenue,'accountAnnualRevenue'=>$accountAnnualRevenue,'accountFirstSemiAnnualRevenue'=>$accountFirstSemiAnnualRevenue,'accountSecondSemiAnnualRevenue'=>$accountSecondSemiAnnualRevenue]);
    }



    public function detailedregistrations(){
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();

      $accountRegistration = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"), DB::raw("month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();


      $FirstQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();

      $FirstHalfAnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfAnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $AnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->first();


      return view('navigation/admin/detailedregistrations', ['currentAccount' => $currentAccount, 'accountRegistration' =>$accountRegistration,'FirstQuarterRegistrations'=>$FirstQuarterRegistrations, 'SecondQuarterRegistrations'=>$SecondQuarterRegistrations, 'ThirdQuarterRegistrations'=>$ThirdQuarterRegistrations, 'FourthQuarterRegistrations'=>$FourthQuarterRegistrations,'FirstHalfAnnualRegistrations'=>$FirstHalfAnnualRegistrations,'SecondHalfAnnualRegistrations'=>$SecondHalfAnnualRegistrations,'AnnualRegistrations'=>$AnnualRegistrations]);
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
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
      ->get();

      $reservationsVoidPerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      $bazaarCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $bazaarAnnualCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount"))
      ->whereYear('created_at','=',Carbon::now())
      ->first();

      $AnnualreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->first();

      $FirstHalfAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FirstQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();


      $AnnualVoidreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->first();

      $FirstHalfVoidAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfVoidAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FirstQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();

      return view('navigation/admin/detailedreservations', ['currentAccount' => $currentAccount, 'reservationsCount' => $reservationsCount, 'reservationsVoid' => $reservationsVoid,'bazaarCount'=>$bazaarCount,'reservationsCountPerBazaar'=>$reservationsCountPerBazaar,'reservationsVoidPerBazaar'=>$reservationsVoidPerBazaar,'AnnualreservationsCount'=>$AnnualreservationsCount,'FirstHalfAnnualReservationsCount'=>$FirstHalfAnnualReservationsCount,'SecondHalfAnnualReservationsCount'=>$SecondHalfAnnualReservationsCount,'FirstQuarterReservationsCount'=>$FirstQuarterReservationsCount,'SecondQuarterReservationsCount'=>$SecondQuarterReservationsCount,'ThirdQuarterReservationsCount'=>$ThirdQuarterReservationsCount,'FourthQuarterReservationsCount'=>$FourthQuarterReservationsCount,'AnnualVoidreservationsCount'=>$AnnualVoidreservationsCount,'FirstHalfVoidAnnualReservationsCount'=>$FirstHalfVoidAnnualReservationsCount,'SecondHalfVoidAnnualReservationsCount'=>$SecondHalfVoidAnnualReservationsCount,'FirstQuarterVoidReservationsCount'=>$FirstQuarterVoidReservationsCount,'SecondQuarterVoidReservationsCount'=>$SecondQuarterVoidReservationsCount,'ThirdQuarterVoidReservationsCount'=>$ThirdQuarterVoidReservationsCount,'FourthQuarterVoidReservationsCount'=>$FourthQuarterVoidReservationsCount,'bazaarAnnualCount'=>$bazaarAnnualCount]);
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


      $accountFirstQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','3')
      ->whereMonth('billings.created_at','>=','1')
      ->first();

      $accountSecondQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','6')
      ->whereMonth('billings.created_at','>=','4')
      ->first();

      $accountThirdQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','9')
      ->whereMonth('billings.created_at','>=','7')
      ->first();

      $accountFourthQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','12')
      ->whereMonth('billings.created_at','>=','10')
      ->first();


      $accountAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->first();

      $accountFirstSemiAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('created_at','=',Carbon::now())
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $accountSecondSemiAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->whereYear('created_at','=',Carbon::now())
      ->first();

      $revenue = PDF::loadView('pdf/revenuereport', ['accountRevenue' =>$accountRevenue,'accountRevenuePerBazaar'=>$accountRevenuePerBazaar,'accountFirstQuarterRevenue'=>$accountFirstQuarterRevenue,'accountSecondQuarterRevenue'=>$accountSecondQuarterRevenue,'accountThirdQuarterRevenue'=>$accountThirdQuarterRevenue,'accountFourthQuarterRevenue'=>$accountFourthQuarterRevenue,'accountAnnualRevenue'=>$accountAnnualRevenue,'accountFirstSemiAnnualRevenue'=>$accountFirstSemiAnnualRevenue,'accountSecondSemiAnnualRevenue'=>$accountSecondSemiAnnualRevenue]);
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
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
      ->get();

      $reservationsVoidPerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      $bazaarCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $bazaarAnnualCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount"))
      ->whereYear('created_at','=',Carbon::now())
      ->first();

      $AnnualreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->first();

      $FirstHalfAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FirstQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();


      $AnnualVoidreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->first();

      $FirstHalfVoidAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfVoidAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FirstQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();

      $reservation = PDF::loadView('pdf/reservationreport', ['reservationsCount' => $reservationsCount, 'reservationsVoid' => $reservationsVoid,'bazaarCount'=>$bazaarCount,'reservationsCountPerBazaar'=>$reservationsCountPerBazaar,'reservationsVoidPerBazaar'=>$reservationsVoidPerBazaar,'AnnualreservationsCount'=>$AnnualreservationsCount,'FirstHalfAnnualReservationsCount'=>$FirstHalfAnnualReservationsCount,'SecondHalfAnnualReservationsCount'=>$SecondHalfAnnualReservationsCount,'FirstQuarterReservationsCount'=>$FirstQuarterReservationsCount,'SecondQuarterReservationsCount'=>$SecondQuarterReservationsCount,'ThirdQuarterReservationsCount'=>$ThirdQuarterReservationsCount,'FourthQuarterReservationsCount'=>$FourthQuarterReservationsCount,'AnnualVoidreservationsCount'=>$AnnualVoidreservationsCount,'FirstHalfVoidAnnualReservationsCount'=>$FirstHalfVoidAnnualReservationsCount,'SecondHalfVoidAnnualReservationsCount'=>$SecondHalfVoidAnnualReservationsCount,'FirstQuarterVoidReservationsCount'=>$FirstQuarterVoidReservationsCount,'SecondQuarterVoidReservationsCount'=>$SecondQuarterVoidReservationsCount,'ThirdQuarterVoidReservationsCount'=>$ThirdQuarterVoidReservationsCount,'FourthQuarterVoidReservationsCount'=>$FourthQuarterVoidReservationsCount,'bazaarAnnualCount'=>$bazaarAnnualCount]);
      return $reservation->stream('ReservationReport.pdf');
    }

    public function printregistrationreport(){
      $accountRegistration = DB::table('accounts')->select(DB::raw("COUNT(*) as Users"), DB::raw("month(created_at) as months"))->whereYear('created_at','=',Carbon::now())->where('Account_AccessLevel','=','brand')->orderBy("created_at")->groupBy(DB::raw("month(created_at), year(created_at)"))->get();

      $FirstQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();

      $FirstHalfAnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfAnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $AnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->first();

      $registration = PDF::loadView('pdf/registrationreport', ['accountRegistration' =>$accountRegistration,'FirstQuarterRegistrations'=>$FirstQuarterRegistrations, 'SecondQuarterRegistrations'=>$SecondQuarterRegistrations, 'ThirdQuarterRegistrations'=>$ThirdQuarterRegistrations, 'FourthQuarterRegistrations'=>$FourthQuarterRegistrations,'FirstHalfAnnualRegistrations'=>$FirstHalfAnnualRegistrations,'SecondHalfAnnualRegistrations'=>$SecondHalfAnnualRegistrations,'AnnualRegistrations'=>$AnnualRegistrations]);
      return $registration->stream('RegistrationReport.pdf');
    }

    public function printquarterlyregistrationreport(){
      $FirstQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();

      $AnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->first();

      $registration = PDF::loadView('pdf/quarterlyregistrationreport', ['FirstQuarterRegistrations'=>$FirstQuarterRegistrations, 'SecondQuarterRegistrations'=>$SecondQuarterRegistrations, 'ThirdQuarterRegistrations'=>$ThirdQuarterRegistrations, 'FourthQuarterRegistrations'=>$FourthQuarterRegistrations,'AnnualRegistrations'=>$AnnualRegistrations]);
      return $registration->stream('QuarterlyRegistrationReport.pdf');
    }

    public function printsemiannualregistrationreport(){
      $FirstHalfAnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfAnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $AnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->first();


      $registration = PDF::loadView('pdf/semiannualregistrationreport', ['FirstHalfAnnualRegistrations'=>$FirstHalfAnnualRegistrations,'SecondHalfAnnualRegistrations'=>$SecondHalfAnnualRegistrations,'AnnualRegistrations'=>$AnnualRegistrations]);
      return $registration->stream('SemiAnnualRegistrationReport.pdf');
    }

    public function printmonthlyregistrationreport(){
      $accountRegistration = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"), DB::raw("month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $AnnualRegistrations = DB::table('accounts')
      ->select(DB::raw("COUNT(*) as Users"))
      ->whereYear('created_at','=',Carbon::now())
      ->where('Account_AccessLevel','=','brand')
      ->first();

      $registration = PDF::loadView('pdf/monthlyregistrationreport', ['accountRegistration' =>$accountRegistration,'AnnualRegistrations'=>$AnnualRegistrations]);
      return $registration->stream('MonthlyRegistrationReport.pdf');
    }

    public function printmonthlyrevenuereport(){
      $accountRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"), DB::raw("month(created_at) as months"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();


      $accountAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->first();


      $revenue = PDF::loadView('pdf/monthlyrevenuereport', ['accountRevenue' =>$accountRevenue,'accountAnnualRevenue'=>$accountAnnualRevenue]);
      return $revenue->stream('MonthlyRevenueReport.pdf');
    }

    public function printmonthlyrevenueperbazaarreport(){
      $accountAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->first();


      $accountRevenuePerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();


      $revenue = PDF::loadView('pdf/monthlyrevenueperbazaar', ['accountAnnualRevenue' =>$accountAnnualRevenue,'accountRevenuePerBazaar'=>$accountRevenuePerBazaar]);
      return $revenue->stream('MonthlyRevenuePerBazaarReport.pdf');
    }

    public function printquarterlyrevenuereport(){
      $accountAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->first();


      $accountFirstQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','3')
      ->whereMonth('billings.created_at','>=','1')
      ->first();

      $accountSecondQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','6')
      ->whereMonth('billings.created_at','>=','4')
      ->first();

      $accountThirdQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','9')
      ->whereMonth('billings.created_at','>=','7')
      ->first();

      $accountFourthQuarterRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('billings.Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->whereMonth('billings.created_at','<=','12')
      ->whereMonth('billings.created_at','>=','10')
      ->first();


      $revenue = PDF::loadView('pdf/quaterlyrevenuereport', ['accountFourthQuarterRevenue' =>$accountFourthQuarterRevenue,'accountThirdQuarterRevenue'=>$accountThirdQuarterRevenue,'accountSecondQuarterRevenue'=>$accountSecondQuarterRevenue,'accountFirstQuarterRevenue'=>$accountFirstQuarterRevenue,'accountAnnualRevenue'=>$accountAnnualRevenue]);
      return $revenue->stream('MonthlyQuarterlyRevenueReport.pdf');
    }

    public function printsemiannualrevenuereport(){
      $accountAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->first();


      $accountFirstSemiAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereYear('created_at','=',Carbon::now())
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $accountSecondSemiAnnualRevenue = DB::table('billings')
      ->select(DB::raw("SUM(Billing_SubTotal) as TotalRevenue"),DB::raw("SUM(Billing_AmountToBePaid) as TotalAmountToBePaid"),DB::raw("SUM(Billing_AmountPaid - Billing_BalanceFromPreviousBilling) as TotalAmountPaid"))
      ->where('Billing_Status','<>','Void')
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->whereYear('created_at','=',Carbon::now())
      ->first();


      $revenue = PDF::loadView('pdf/semiannualrevenuereport', ['accountFirstSemiAnnualRevenue' =>$accountFirstSemiAnnualRevenue,'accountSecondSemiAnnualRevenue'=>$accountSecondSemiAnnualRevenue,'accountAnnualRevenue'=>$accountAnnualRevenue]);
      return $revenue->stream('MonthlySemiAnnualRevenueReport.pdf');
    }

    public function printmonthlyreservationreport(){
      $reservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $AnnualreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->first();

      $reservation = PDF::loadView('pdf/monthlyreservations', ['reservationsCount' => $reservationsCount, 'AnnualreservationsCount'=>$AnnualreservationsCount]);
      return $reservation->stream('ReservationReport.pdf');
    }

    public function printmonthlyvoidreservationreport(){

      $reservationsVoid = DB::table('billings')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"))
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
      ->get();

      $AnnualVoidreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->first();

      $reservation = PDF::loadView('pdf/monthlyvoidreservations', ['reservationsVoid' => $reservationsVoid, 'AnnualVoidreservationsCount'=>$AnnualVoidreservationsCount]);
      return $reservation->stream('VoidReservationReport.pdf');
    }

    public function printmonthlyreservationperbazaarreport(){

      $reservationsCountPerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();


      $AnnualreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->first();

      $reservation = PDF::loadView('pdf/monthlyreservationsperbazaar', ['reservationsCountPerBazaar' => $reservationsCountPerBazaar, 'AnnualreservationsCount'=>$AnnualreservationsCount]);
      return $reservation->stream('ReservationsPerBazaarReport.pdf');
    }

    public function printmonthlyvoidreservationperbazaarreport(){
      $reservationsVoidPerBazaar = DB::table('billings')
      ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      ->whereYear('billings.created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->orderBy("billings.created_at")
      ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      ->get();

      $AnnualVoidreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->first();

      $reservation = PDF::loadView('pdf/monthlyvoidreservationsperbazaar', ['reservationsVoidPerBazaar' => $reservationsVoidPerBazaar, 'AnnualVoidreservationsCount'=>$AnnualVoidreservationsCount]);
      return $reservation->stream('VoidReservationsPerBazaarReport.pdf');
    }

    public function printmonthlyBazaarReport(){
      $bazaarCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
      ->whereYear('created_at','=',Carbon::now())
      ->orderBy("created_at")
      ->groupBy(DB::raw("month(created_at), year(created_at)"))
      ->get();

      $bazaarAnnualCount = DB::table('bazaars')
      ->select(DB::raw("COUNT(*) as bazaarCount"))
      ->whereYear('created_at','=',Carbon::now())
      ->first();

      $reservation = PDF::loadView('pdf/monthlybazaarcount', ['bazaarCount' => $bazaarCount, 'bazaarAnnualCount'=>$bazaarAnnualCount]);
      return $reservation->stream('BazaarReport.pdf');
    }

    public function printsemiannualreservationReport(){

      $AnnualreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->first();

      $FirstHalfAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $reservation = PDF::loadView('pdf/semiannualreservationsreport', ['AnnualreservationsCount' => $AnnualreservationsCount, 'FirstHalfAnnualReservationsCount'=>$FirstHalfAnnualReservationsCount,'SecondHalfAnnualReservationsCount'=>$SecondHalfAnnualReservationsCount]);
      return $reservation->stream('SemiAnnualReservationReport.pdf');
    }

    public function printquarterlyreservationReport(){
      // $reservationsCount = DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(created_at) as months"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->orderBy("created_at")
      // ->groupBy(DB::raw("month(created_at), year(created_at)"))
      // ->get();
      //
      // $reservationsCountPerBazaar = DB::table('billings')
      // ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      // ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      // ->whereYear('billings.created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->orderBy("billings.created_at")
      // ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      // ->get();

      // $reservationsVoid = DB::table('billings')
      // ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"))
      // ->whereYear('billings.created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      // ->orderBy("billings.created_at")
      // ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
      // ->get();

      // $reservationsVoidPerBazaar = DB::table('billings')
      // ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      // ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      // ->whereYear('billings.created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      // ->orderBy("billings.created_at")
      // ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      // ->get();

      // $bazaarCount = DB::table('bazaars')
      // ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->orderBy("created_at")
      // ->groupBy(DB::raw("month(created_at), year(created_at)"))
      // ->get();
      //
      // $bazaarAnnualCount = DB::table('bazaars')
      // ->select(DB::raw("COUNT(*) as bazaarCount"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->first();
      //
      $AnnualreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->first();

      // $FirstHalfAnnualReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->whereMonth('created_at','<=','6')
      // ->whereMonth('created_at','>=','1')
      // ->first();
      //
      // $SecondHalfAnnualReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->whereMonth('created_at','<=','12')
      // ->whereMonth('created_at','>=','7')
      // ->first();

      $FirstQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();


      // $FirstQuarterVoidReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      // ->whereMonth('created_at','<=','3')
      // ->whereMonth('created_at','>=','1')
      // ->first();
      //
      // $SecondQuarterVoidReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      // ->whereMonth('created_at','<=','6')
      // ->whereMonth('created_at','>=','4')
      // ->first();
      //
      // $ThirdQuarterVoidReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      // ->whereMonth('created_at','<=','9')
      // ->whereMonth('created_at','>=','7')
      // ->first();
      //
      // $FourthQuarterVoidReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      // ->whereMonth('created_at','<=','12')
      // ->whereMonth('created_at','>=','10')
      // ->first();
      //
      $reservation = PDF::loadView('pdf/quarterlyreservationsreport', ['AnnualreservationsCount' => $AnnualreservationsCount, 'FirstQuarterReservationsCount'=>$FirstQuarterReservationsCount,'SecondQuarterReservationsCount'=>$SecondQuarterReservationsCount,'ThirdQuarterReservationsCount'=>$ThirdQuarterReservationsCount,'FourthQuarterReservationsCount'=>$FourthQuarterReservationsCount]);
      return $reservation->stream('QuarterlyReservationReport.pdf');
    }

    public function printsemiannualvoidreservationReport(){
      $AnnualVoidreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->first();

      $FirstHalfVoidAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfVoidAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();


      $reservation = PDF::loadView('pdf/semiannualvoidreservationsreport', ['AnnualVoidreservationsCount' => $AnnualVoidreservationsCount, 'SecondHalfVoidAnnualReservationsCount'=>$SecondHalfVoidAnnualReservationsCount,'FirstHalfVoidAnnualReservationsCount'=>$FirstHalfVoidAnnualReservationsCount]);
      return $reservation->stream('SemiAnnualVoidReservationReport.pdf');
    }

    public function printquarterlyvoidreservationReport(){
      // $reservationsCount = DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(created_at) as months"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->orderBy("created_at")
      // ->groupBy(DB::raw("month(created_at), year(created_at)"))
      // ->get();
      //
      // $reservationsCountPerBazaar = DB::table('billings')
      // ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      // ->select(DB::raw("COUNT(*) as TotalReservation"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      // ->whereYear('billings.created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->orderBy("billings.created_at")
      // ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      // ->get();

      // $reservationsVoid = DB::table('billings')
      // ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"))
      // ->whereYear('billings.created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      // ->orderBy("billings.created_at")
      // ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at)"))
      // ->get();

      // $reservationsVoidPerBazaar = DB::table('billings')
      // ->join('bazaars','bazaars.PK_BazaarID','=','billings.FK_BazaarID')
      // ->select(DB::raw("COUNT(*) as VoidReservations"), DB::raw("month(billings.created_at) as months"),'Bazaar_Name as BazaarName')
      // ->whereYear('billings.created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      // ->orderBy("billings.created_at")
      // ->groupBy(DB::raw("month(billings.created_at), year(billings.created_at),FK_BazaarID,Bazaar_Name"))
      // ->get();

      // $bazaarCount = DB::table('bazaars')
      // ->select(DB::raw("COUNT(*) as bazaarCount,month(created_at) as months"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->orderBy("created_at")
      // ->groupBy(DB::raw("month(created_at), year(created_at)"))
      // ->get();
      //
      // $bazaarAnnualCount = DB::table('bazaars')
      // ->select(DB::raw("COUNT(*) as bazaarCount"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->first();
      //
      // $AnnualreservationsCount = DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->first();

      // $FirstHalfAnnualReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->whereMonth('created_at','<=','6')
      // ->whereMonth('created_at','>=','1')
      // ->first();
      //
      // $SecondHalfAnnualReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->whereMonth('created_at','<=','12')
      // ->whereMonth('created_at','>=','7')
      // ->first();
      //
      // $FirstQuarterReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->whereMonth('created_at','<=','3')
      // ->whereMonth('created_at','>=','1')
      // ->first();
      //
      // $SecondQuarterReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->whereMonth('created_at','<=','6')
      // ->whereMonth('created_at','>=','4')
      // ->first();
      //
      // $ThirdQuarterReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->whereMonth('created_at','<=','9')
      // ->whereMonth('created_at','>=','7')
      // ->first();
      //
      // $FourthQuarterReservationsCount= DB::table('billings')
      // ->select(DB::raw("COUNT(*) as TotalReservation"))
      // ->whereYear('created_at','=',Carbon::now())
      // ->where([['Billing_SubTotal','>','0'],['Billing_Status','<>','Void']])
      // ->whereMonth('created_at','<=','12')
      // ->whereMonth('created_at','>=','10')
      // ->first();


      $AnnualVoidreservationsCount = DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->first();

      $FirstHalfVoidAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondHalfVoidAnnualReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FirstQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','3')
      ->whereMonth('created_at','>=','1')
      ->first();

      $SecondQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','6')
      ->whereMonth('created_at','>=','4')
      ->first();

      $ThirdQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','9')
      ->whereMonth('created_at','>=','7')
      ->first();

      $FourthQuarterVoidReservationsCount= DB::table('billings')
      ->select(DB::raw("COUNT(*) as TotalReservation"))
      ->whereYear('created_at','=',Carbon::now())
      ->where([['Billing_SubTotal','>','0'],['Billing_Status','=','Void']])
      ->whereMonth('created_at','<=','12')
      ->whereMonth('created_at','>=','10')
      ->first();

      $reservation = PDF::loadView('pdf/quarterlyvoidreservationsreport', ['AnnualVoidreservationsCount' => $AnnualVoidreservationsCount, 'FirstQuarterVoidReservationsCount'=>$FirstQuarterVoidReservationsCount,'SecondQuarterVoidReservationsCount'=>$SecondQuarterVoidReservationsCount,'ThirdQuarterVoidReservationsCount'=>$ThirdQuarterVoidReservationsCount,'FourthQuarterVoidReservationsCount'=>$FourthQuarterVoidReservationsCount]);
      return $reservation->stream('QuarterlyVoidReservationReport.pdf');
    }
}
