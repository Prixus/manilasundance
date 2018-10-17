<?php

namespace App\Notifications;

use App\account;
use Carbon\Carbon;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ExcessPayment extends Notification
{
    use Queueable;

    public $PaymentInformation;
    public $paymentExcess;
    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($PaymentInformation)
    {
        $account = account::find($PaymentInformation->FK_AccountID);
        $this->PaymentInformation = $PaymentInformation;
        $this->paymentExcess = $account->Account_Balance * -1; //converts the negative account balance to positive number
        $this->message = "Your payment worth of " . $this->PaymentInformation->PaymentAmount . " for Bill ID " . $this->PaymentInformation->FK_BillingID .  " has exeeded your bill by "  .  $this->paymentExcess . "php. You may choose to liquidate your excess payment theough making another reservation or by refunding through our office";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
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
            'PaymentInformation' =>  $this->PaymentInformation,
            'ExcessPayment' => $this->paymentExcess,
            'message' => $this->message
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'repliedTime' => Carbon::now(),
            'PaymentInformation' =>  $this->PaymentInformation,
            'ExcessPayment' => $this->paymentExcess,
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
