<?php

namespace App\Notifications;

use App\account;
use Carbon\Carbon;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentVerified extends Notification
{
    use Queueable;

    public $PaymentInformation;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($PaymentInformation)
    {
        $this->PaymentInformation=$PaymentInformation;
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
            'PaymentInformation' =>  $this->PaymentInformation       
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'repliedTime' => Carbon::now(),
            'PaymentInformation' =>  $this->PaymentInformation       
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
