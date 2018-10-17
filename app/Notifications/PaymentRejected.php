<?php

namespace App\Notifications;

use App\account;
use Carbon\Carbon;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class PaymentRejected extends Notification
{
    use Queueable;

    public $PaymentInformation;
    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($PaymentInformation)
    {
        $this->PaymentInformation=$PaymentInformation;
        $this->message = "Your payment worth of " . $this->PaymentInformation->PaymentAmount . " for Bill ID " . $this->PaymentInformation->FK_BillingID .  " has been rejected. Please resubmit your payment picture. Make sure that you provide the proper details.";
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
            'message' => $this->message
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'repliedTime' => Carbon::now(),
            'PaymentInformation' =>  $this->PaymentInformation,
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
