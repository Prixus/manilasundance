<?php

namespace App\Http\Middleware;

use Closure;
use App\reservation;
use App\billing;
use App\bazaar;
use App\stallsarchive;
use App\stall;
use App\account;
use DB;
use Carbon\Carbon;

class checkPaymentDeadLine
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // $ReservationsAnBill = DB::table('reservations')
      // ->joins('billings','billings.PK_BillingID', '=', 'reservations.FK_BillingID')
      // ->get();

      // $billing = billing::where('Billing_Status','=','Not Paid')->get();

      // $bazaars = bazaar::all();

      $StallsBazaarBillingReservationInformations = DB::table('bazaars')
                                                    ->join('stalls','stalls.FK_BazaarID','=','bazaars.PK_BazaarID')
                                                    ->join('reservations','stalls.FK_ReservationID','=','reservations.PK_ReservationID')
                                                    ->join('billings','billings.PK_BillingID','=','reservations.FK_BillingID')
                                                    ->where('billings.Billing_Status','=','Not Paid')
                                                    ->orWhere('billings.Billing_Status','=','Half Paid')
                                                    ->get();


      foreach ($StallsBazaarBillingReservationInformations as $StallsBazaarBillingReservationInformation) {
        $bill = billing::find($StallsBazaarBillingReservationInformation->PK_BillingID);
        $reservation = reservation::find($StallsBazaarBillingReservationInformation->PK_ReservationID);

        if(((Carbon::now() > $StallsBazaarBillingReservationInformation->Bazaar_DateStart) && ($StallsBazaarBillingReservationInformation->Billing_Status =="Half Paid"))){ // if full payment has not been received after Bazaar start date then reservation is void.
          $reservation = reservation::find($StallsBazaarBillingReservationInformation->PK_BillingID);
          $currentBill = billing::find($StallsBazaarBillingReservationInformation->PK_BillingID);
          $currentBill->Billing_Status = "Void";
          $currentBill->save();
          $stallWithReservation = stall::find($StallsBazaarBillingReservationInformation->PK_StallID);

              foreach ($reservation->stalls as $stall) {
              $stallWithReservation = stall::find($stall->PK_StallID);
              $stallWithReservation->Stall_Status = "Available";
              $stallWithReservation->FK_ReservationID = null;
              $stallWithReservation->save();
      
              $stallArchived = new stallsarchive();
              $stallArchived->FK_BillingID = $currentBill->PK_BillingID;
              $stallArchived->FK_StallID = $stallWithReservation->PK_StallID;
              $stallArchived->save();
      
              
            }

           $accountToBeRefunded = account::find($currentBill->FK_AccountID);             //voiding of reservation
              $accountToBeRefunded->Account_Balance -= ($currentBill->Billing_SubTotal);    // the subtotal will be deducted
              $accountToBeRefunded->save(); 

        }

        else if((Carbon::now() > $bill->created_at->addDays(5))&&(($bill->Billing_Status == "Not Paid"))){ // if no payment has been  received after 5 days from reservation the reservation will be void
          $reservation = reservation::find($StallsBazaarBillingReservationInformation->PK_BillingID);
          $currentBill = billing::find($StallsBazaarBillingReservationInformation->PK_BillingID);
          $currentBill->Billing_Status = "Void";
          $currentBill->save();

            foreach ($reservation->stalls as $stall) {
              $stallWithReservation = stall::find($stall->PK_StallID);
              $stallWithReservation->Stall_Status = "Available";
              $stallWithReservation->FK_ReservationID = null;
              $stallWithReservation->save();
      
              $stallArchived = new stallsarchive();
              $stallArchived->FK_BillingID = $currentBill->PK_BillingID;
              $stallArchived->FK_StallID = $stallWithReservation->PK_StallID;
              $stallArchived->save();
      
              
            }

           $accountToBeRefunded = account::find($currentBill->FK_AccountID);             //voiding of reservation
              $accountToBeRefunded->Account_Balance -= ($currentBill->Billing_SubTotal);    // the subtotal will be deducted
              $accountToBeRefunded->save(); 
        }

        else{

        }
      }

      // foreach ($billing as $bill) {
      //   foreach ($bazaars as $bazaar) {
      //     if(((Carbon::now() > $bazaar->Bazaar_DateStart)&&($bill->Billing_Status != "Paid"))){ // if full payment has not been received after Bazaar start date then reservation is void.
      //       $reservation = reservation::find($bill->PK_BillingID);
      //       $currentBill = billing::find($bill->PK_BillingID);
      //       $currentBill->Billing_Status = "Void";
      //       $currentBill->save();
            // foreach ($reservation->stalls as $stall) {
            //   $stallWithReservation = stall::find($stall->PK_StallID);
            //   $stallWithReservation->Stall_Status = "Available";
            //   $stallWithReservation->FK_ReservationID = null;
            //   $stallWithReservation->save();
      
            //   $stallArchived = new stallsarchive();
            //   $stallArchived->FK_BillingID = $currentBill->PK_BillingID;
            //   $stallArchived->FK_StallID = $stallWithReservation->PK_StallID;
            //   $stallArchived->save();
      
            //   $accountToBeRefunded = account::find($currentBill->FK_AccountID);             //voiding of reservation
            //   $accountToBeRefunded->Account_Balance -= ($currentBill->Billing_SubTotal);    // the subtotal will be deducted
            //   $accountToBeRefunded->save();
            // }
      //
      //     }
      //
      //     else if((Carbon::now() > $bill->created_at->addDays(5))&&(($bill->Billing_Status == "Not Paid"))){ // if no payment has been  received after 5 days from reservation the reservation will be void
      //       $reservation = reservation::find($bill->PK_BillingID);
      //       $currentBill = billing::find($bill->PK_BillingID);
      //       $currentBill->Billing_Status = "Void";
      //       $currentBill->save();
      //
      //       foreach ($reservation->stalls as $stall) {
      //         $stallWithReservation = stall::find($stall->PK_StallID);
      //         $stallWithReservation->Stall_Status = "Available";
      //         $stallWithReservation->FK_ReservationID = null;
      //         $stallWithReservation->save();
      //
      //         $stallArchived = new stallsarchive();
      //         $stallArchived->FK_BillingID = $currentBill->PK_BillingID;
      //         $stallArchived->FK_StallID = $stallWithReservation->PK_StallID;
      //         $stallArchived->save();
      //
      //         $accountToBeRefunded = account::find($currentBill->FK_AccountID);             //voiding of reservation
      //         $accountToBeRefunded->Account_Balance -= $currentBill->Billing_SubTotal;    // the subtotal will be deducted
      //         $accountToBeRefunded->save();
      //       }
      //     }
      //
      //     else{
      //
      //     }
      //   }
      //
      // }


        return $next($request);
    }
}
