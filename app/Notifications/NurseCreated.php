<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NurseCreated extends Notification
{
    use Queueable;

    public $nurse;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($nurse)
    {
        $this->nurse = $nurse;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->nurse->user_id,
            'name' => $this->nurse->user->name,
        ];
    }
}
