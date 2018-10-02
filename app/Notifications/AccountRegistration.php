<?php

namespace App\Notifications;

use App\account;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AccountRegistration extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public accountRegistrations;
    public function __construct($accountRegistrations)
    {
        $this->accountRegistrations = $accountRegistrations;
    }

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
            'accountRegistrations' =>  $this->accountRegistrations       
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'repliedTime' => Carbon::now(),
            'accountRegistrations' =>  $this->accountRegistrations       
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
