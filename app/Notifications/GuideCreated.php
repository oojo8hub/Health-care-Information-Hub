<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GuideCreated extends Notification
{
    use Queueable;

    public $guide;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($guide)
    {
        $this->guide = $guide;
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
            'guide_id' => $this->guide->id,
            'topic' => $this->guide->topic,
            'slug' => $this->guide->slug,
            'published' => $this->guide->published,
            'user_id' => $this->guide->user_id,
        ];
    }
}
