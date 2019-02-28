<?php

namespace App\Notifications;

namespace App\Notifications;
use App\billing;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class WarningsNotification extends Notification
{
  use Queueable;


  public $message;
  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($Penalty)
  {
      $this->message = "Your account has been reported and your Account Rating has been set to warn due to :". $Penalty->Penalty_Description;
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

          'message' => $this->message
      ];
  }

  public function toBroadcast($notifiable)
  {
      return new BroadcastMessage([
          'repliedTime' => Carbon::now(),
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
