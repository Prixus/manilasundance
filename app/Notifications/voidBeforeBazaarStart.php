<?php

namespace App\Notifications;
use App\billing;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
class voidBeforeBazaarStart extends Notification
{
use Queueable;
public $billing;
public $message;
/**
 * Create a new notification instance.
 *
 * @return void
 */
public function __construct($billing)
{
    $this->billing = $billing;
    $this->message = "Your bill " . $billing->PK_BillingID . " has been void due to failure to make full payment before the bazaar starts.";
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
        'billing' =>  $this->billing,
        'message'=> $this->message
    ];
}

public function toBroadcast($notifiable)
{
    return new BroadcastMessage([
        'repliedTime' => Carbon::now(),
        'billing' =>  $this->billing
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
