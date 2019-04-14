<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Event extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $url;
    public $postId;
    public $sender;
    public $title;
    public $content;

    public function __construct($id = '0', $sender, $title, $content)
    {
        $this->postId = $id;
        $this->sender = $sender;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //$url = url('/register/activation/'.$this->url);

//        return (new MailMessage)
//            ->success()
//            ->subject('شبکه اجتماعی انرژی')
//                    ->line($this->content)
//                    ->action('button', 'url')
//                    ->line('سپاس از همراهی شما');
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
            'id' => $this->postId,
            'priority' => '0',
            'sender' => $this->sender,
            'title' => $this->title,
            'message' => $this->content,
            'footer' => '',
        ];
    }
}
