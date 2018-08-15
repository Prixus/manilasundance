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

      $reservations = DB::table('accounts')
      ->join('reservations','accounts.PK_AccountID', '=', 'reservations.FK_AccountID')
      ->join('billings','reservations.FK_BillingID','=','billings.PK_BillingID')
      ->where('PK_AccountID','=',Session::get('UserAccountID'))
      ->get();
      return view('navigation/brand/reservations', ['reservations' => $reservations]);
    }

    public function showStalls($id){
        $ldate = date('Y-m-d H:i:s');
        $BazaarStalls = stall::where("FK_BazaarID",$id)->get();
        $StallMap = bazaar::where("PK_BazaarID",$id)->first();

        $ReservedStalls = DB::table('stalls')
        ->join('reservations','stalls.FK_ReservationID', '=', 'reservations.PK_ReservationID')
        ->where('FK_AccountID', '=', Session::get('UserAccountID'))
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
          $billing->Billing_AmountPaid = 0;
          $billing->Billing_Status = "Not Paid";
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
                return view("navigation/brand/stalls", ['stalls'=> $BazaarStalls, 'ReservedStalls' => $ReservedStalls]);

    }

    public function reserveStall(Request $request){
              $ldate = date('Y-m-d H:i:s');

              $stall = stall::find($request->id);
              $stall->Stall_Status = "TemporarilyReserved";
              $stall->FK_ReservationID = Session::get('ReservationID');
              $stall->save();

              return response()->json($stall);
    }

    public function viewBill(){
                $TotalCost = 0.00;
                $reservationID = Session::get('ReservationID');
                $reservation = reservation::find($reservationID);

                foreach($reservation->stalls as $stalls){
                                  $TotalCost += $stalls->Stall_RentalCost + $stalls->Stall_BookingCost;
                }

                $billing = billing::find(Session::get('BillingID'));
                $billing->Billing_SubTotal = $TotalCost;
                $billing->Billing_NetTotal = $TotalCost-$billing->Billing_SubTotalDiscount;
                $billing->save();

                $ReservationAccountBrandInformations = DB::table('stalls')
                ->join('reservations','stalls.FK_ReservationID', '=', 'reservations.PK_ReservationID')
                ->join('accounts','reservations.FK_AccountID', '=', 'accounts.PK_AccountID')
                ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
                ->where('PK_ReservationID', '=', $reservationID)
                ->get();

                return view("navigation/brand/bill", ['ReservedStalls'=> $reservation->stalls,'TotalCost' => $TotalCost, 'ReservationAccountBrandInformations' => $ReservationAccountBrandInformations]);


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
      ->get();

        $brand = PDF::loadView("pdf/bill",['ReservedStalls'=> $reservation->stalls,'TotalCost' => $TotalCost, 'ReservationAccountBrandInformations' => $ReservationAccountBrandInformations]);
        return $brand->download('invoice.pdf');
    }
}
