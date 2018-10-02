<?php

namespace App\Http\Controllers;
use App\stall;
use App\bazaar;
use App\reservation;
use App\billing;
use App\account;
use PDF;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservationsController extends Controller
{
    //
    public function index(){
      /*$reservations = DB::table('accounts')
      ->join('reservations','accounts.PK_AccountID', '=', 'reservations.FK_AccountID')
      ->join('stalls','reservations.PK_ReservationID', '=', 'stalls.FK_ReservationID')
      ->join('bazaars','stalls.FK_BazaarID', '=', 'bazaars.PK_BazaarID')
      ->join('billings','reservations.FK_BillingID','=','billings.PK_BillingID')
      ->where('PK_AccountID','=',Session::get('UserID'))
      ->get();
      */
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();
      $reservations = DB::table('accounts')
      ->join('reservations','accounts.PK_AccountID', '=', 'reservations.FK_AccountID')
      ->join('billings','reservations.FK_BillingID','=','billings.PK_BillingID')
      ->where([['PK_AccountID','=',Session::get('UserAccountID')]])
      ->where([['Billing_SubTotal','>', 0],['Billing_Status','<>','Void']])
      ->get();

      return view('navigation/brand/reservations', ['reservations' => $reservations , 'currentAccount'=>$currentAccount,'SucessAlert'=>'forindex']);
    }

    public function showStalls($id){
        $ldate = date('Y-m-d H:i:s'); //gets current date
        $BazaarStalls = stall::where("FK_BazaarID",$id)->get(); //gets all stalls for a specific bazaar
        $BazaarVenue = bazaar::where("PK_BazaarID",$id)->pluck("Bazaar_Venue")->first();

        //Query to get the reserved Stalls
        $ReservedStalls = DB::table('stalls')
        ->join('reservations','stalls.FK_ReservationID', '=', 'reservations.PK_ReservationID')
        ->where([['FK_AccountID', '=', Session::get('UserAccountID')],['FK_BazaarID','=',$id]])
        ->get();


        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        if($pageWasRefreshed ) {
        //do something because page was refreshed;
        }
        else {
          //do nothing;
          $billing = new billing;
          $billing->Billing_SubTotalDiscount = 0;
          $billing->Billing_SubTotal = 0;
          $billing->Billing_NetTotal = 0;
          $billing->Billing_AmountToBePaid = 0;
          $billing->Billing_AmountPaid = 0;
          $billing->Billing_BalanceFromPreviousBilling = 0;
          $billing->Billing_Status = "Not Paid";
          $billing->FK_AccountID = Session::get('UserAccountID');
          $billing->save();
          Session::put('BillingID', $billing->PK_BillingID);
          $reservation = new reservation;
          $reservation->Reservation_DateTime = $ldate;
          $reservation->FK_BillingID = $billing->PK_BillingID;
          $reservation->Reservation_Cost = 0.00;
          $reservation->FK_AccountID = Session::get('UserAccountID');
          $reservation->save();


          Session::put('ReservationID', $reservation->PK_ReservationID);



        }
        $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();

                return view("navigation/brand/stalls", ['stalls'=> $BazaarStalls, 'ReservedStalls' => $ReservedStalls, 'BazaarVenue' =>$BazaarVenue, 'currentAccount'=>$currentAccount]);

    }

    public function reserveStall(Request $request){
              $ldate = date('Y-m-d H:i:s');

              $stall = stall::find($request->id);
              $stall->Stall_Status = "TemporarilyReserved";
              $stall->FK_ReservationID = Session::get('ReservationID');
              $stall->save();

              return response()->json($stall);
    }

    public function cancelReserveStall(Request $request){
      $ldate = date('Y-m-d H:i:s');

      $stall = stall::find($request->id);
      $stall->Stall_Status = "Available";
      $stall->FK_ReservationID = null;
      $stall->save();

      return response()->json($stall);
    }

    public function viewBill(){
      $TotalCost = 0.00;
      $reservationID = Session::get('ReservationID');
      $reservation = reservation::find($reservationID);

       $account = account::find(Session::get('UserAccountID'));
      // ADD ACCOUNT BALANCE SECTION

      foreach($reservation->stalls as $stalls){
                        $TotalCost += $stalls->Stall_RentalCost + $stalls->Stall_BookingCost;
      }

              $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        if($pageWasRefreshed ) {
        //do something because page was refreshed;
        }
        else {
 $billing = billing::find(Session::get('BillingID'));
      // $BillAmountSum = billing::where('FK_AccountID','=',Session::get('UserAccountID'))->sum('Billing_SubTotal');
      // $BillAmountPaidSum = billing::where('FK_AccountID','=',Session::get('UserAccountID'))->sum('Billing_AmountPaid');
      $billing->Billing_BalanceFromPreviousBilling = $account->Account_Balance;


      $billing->Billing_SubTotal = $TotalCost;
      $billing->Billing_AmountToBePaid = $TotalCost + $billing->Billing_BalanceFromPreviousBilling - $billing->Billing_SubTotalDiscount; //computes the total amount to be paid with respect to previous balance
      $billing->Billing_NetTotal =  $TotalCost + $billing->Billing_BalanceFromPreviousBilling - $billing->Billing_SubTotalDiscount;

      if($billing->Billing_AmountToBePaid == 0){ //checks if the balance from previous billing will decrease the Amount to be paid and bring out a negative number
      $account->Account_Balance = 0; //pass the negative vakue to the account balance
      $billing->Billing_AmountToBePaid = 0.00; //sets the Amount to be paid to zero due to excess payment from last billing
      $billing->Billing_Status = "Paid";
        foreach($reservation->stalls as $stalls){
                          $stalls = stall::find($stalls->PK_StallID);
                          $stalls->Stall_Status = "Reserved";
                          $stalls->save();
        }
      }
      else if($billing->Billing_AmountToBePaid < 0){
        $account->Account_Balance = $billing->Billing_AmountToBePaid;
        $billing->Billing_AmountToBePaid = 0.00;
        $billing->Billing_Status = "Paid";
        foreach($reservation->stalls as $stalls){
                          $stalls = stall::find($stalls->PK_StallID);
                          $stalls->Stall_Status = "Reserved";
                          $stalls->save();
        }
      }
      else if($billing->Billing_AmountToBePaid >= ($billing->Billing_SubTotal/2)){
        $account->Account_Balance = $billing->Billing_AmountToBePaid;
        $billing->Billing_Status ="Not Paid";
        foreach($reservation->stalls as $stalls){
                          $stalls = stall::find($stalls->PK_StallID);
                          $stalls->Stall_Status = "TemporarilyReserved";
                          $stalls->save();
        }
      }
      else if($billing->Billing_BalanceFromPreviousBilling==0){
        $account->Account_Balance = $billing->Billing_AmountToBePaid;
        $billing->Billing_Status ="Not Paid";
        foreach($reservation->stalls as $stalls){
                          $stalls = stall::find($stalls->PK_StallID);
                          $stalls->Stall_Status = "TemporarilyReserved";
                          $stalls->save();
        }
      }
      else{
        $account->Account_Balance = $billing->Billing_AmountToBePaid;
        if($billing->Billing_AmountTobePaid <= ($billing->Billing_SubTotal/2)){
          $billing->Billing_Status ="Half Paid";
          foreach($reservation->stalls as $stalls){
                            $stalls = stall::find($stalls->PK_StallID);
                            $stalls->Stall_Status = "TemporarilyReserved";
                            $stalls->save();
          }
        }
      }
      $account->save();
      $billing->save();

        }
      

      

      $ReservationAccountBrandInformations = DB::table('stalls')
      ->join('reservations','stalls.FK_ReservationID', '=', 'reservations.PK_ReservationID')
      ->join('accounts','reservations.FK_AccountID', '=', 'accounts.PK_AccountID')
      ->join('billings', 'reservations.FK_BillingID', '=', 'billings.PK_BillingID')
      ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
      ->where('PK_ReservationID', '=', $reservationID)
      ->first();

      if($ReservationAccountBrandInformations == null){
        return back()->with('status', 'You must reserve a stall before viewing bill');
      }

      $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();


      return view("navigation/brand/bill", ['ReservedStalls'=> $reservation->stalls,'TotalCost' => $TotalCost, 'ReservationAccountBrandInformations' => $ReservationAccountBrandInformations,'currentAccount' => $currentAccount, 'billing' => $billing]);


    }

    public function downloadPDF(){
      $TotalCost = 0.00;
      $reservationID = Session::get('ReservationID');
      $reservation = reservation::find($reservationID);

      foreach($reservation->stalls as $stalls){
        $TotalCost += $stalls->Stall_RentalCost + $stalls->Stall_BookingCost;
      }


      $ReservationAccountBrandInformations = DB::table('stalls')
      ->join('reservations','stalls.FK_ReservationID', '=', 'reservations.PK_ReservationID')
      ->join('accounts','reservations.FK_AccountID', '=', 'accounts.PK_AccountID')
      ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
      ->where('PK_ReservationID', '=', $reservationID)
      ->first();

        $brand = PDF::loadView("pdf/bill",['ReservedStalls'=> $reservation->stalls,'TotalCost' => $TotalCost, 'ReservationAccountBrandInformations' => $ReservationAccountBrandInformations]);
        return $brand->download('invoice.pdf');
    }
}
