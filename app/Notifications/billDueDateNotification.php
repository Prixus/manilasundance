<?php

namespace App\Notifications;

use DateTime;
use App\account;
use App\reservation;
use App\stall;
use App\bazaar;
use DB;
use Carbon\Carbon;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class billDueDateNotification extends Notification
{
    use Queueable;

    public $Billinginformation;
    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($billing)
    {
        $this->Billinginformation = $billing;
        if($billing->Billing_Status == "Half Paid"){
          $reservation = reservation::find($billing->PK_BillingID);
          $stallwithreservations = stall::where('FK_ReservationID','=',$reservation->PK_ReservationID)->get();
          foreach ($stallwithreservations as $stallwithreservation) {
            // code...
            $bazaar = bazaar::find($stallwithreservation->FK_BazaarID);
            $this->message = "You have pending balance to be paid. Your balance to be paid is". $billing->Billing_AmountToBePaid ."php it must be paid before". $bazaar->Bazaar_DateStart. ". You have only " . $bazaar->Bazaar_DateStart - Carbon::now() . "to pay your remaining balance";
          }
        }
        elseif($billing->Billing_Status == "Not Paid"){
          $deadline = $billing->created_at->addDays(5);
          $datetoday = Carbon::now();
          $deadline1 = new DateTime($deadline);
          $datetoday = new DateTime($datetoday);
          $days=$deadline1->diff($datetoday);
          $days = $days->format('%a');
          $reservation = reservation::find($billing->PK_BillingID);
          $stallwithreservations = stall::where('FK_ReservationID','=',$reservation->PK_ReservationID)->get();
          foreach ($stallwithreservations as $stallwithreservation) {
            // code...
            $bazaar = bazaar::find($stallwithreservation->FK_BazaarID);
            $this->message = "You have pending balance to be paid to make a half payment. Your Total balance to be paid is ". ($billing->Billing_SubTotal+$billing->Billing_BalanceFromPreviousBilling)/2 ."php it must be paid before ". $deadline . ". You have only ".$days. " to pay your remaining balance";
          }

        }
        else{
          $this->message = "Error";
        }
    }

    /**
    */
   public function via($notifiable)
   {
       return ['database','broadcast'];
       // return ['database'];
   }


   /**
    * Get the array representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return array
    */
   public function toDatabase($notifiable)
   {
       return [
           'repliedTime' => Carbon::now(),
           'Billinginformation' =>  $this->Billinginformation,
           'message' => $this->message
       ];
   }

   public function toBroadcast($notifiable)
   {
       return new BroadcastMessage([
         'repliedTime' => Carbon::now(),
         'Billinginformation' =>  $this->Billinginformation,
         'message' => $this->message
       ]);
   }

   /**
    * Get the array representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return array
    */
   public function toArray($notifiable)
   {
       return [
           //
       ];
   }
}
