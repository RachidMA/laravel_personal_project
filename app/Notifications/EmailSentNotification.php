<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailSentNotification extends Notification
{
    use Queueable;
    protected $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $handyman_name = $this->data['handyman']->full_name;
        $message_send = $this->data['message'];
        return (new MailMessage)
                    ->line('Email Sent Notification.')
                    ->greeting('Hello There')
                    ->line('You have sent an email to '.$handyman_name . ' with email: '. $this->data['handyman']->user->email)
                    ->line($message_send)
                    ->action('Notification Action', url('/job/details/' . $this->data['handyman']->id))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
