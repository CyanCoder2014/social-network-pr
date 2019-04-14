<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegister extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $url;

    public function __construct($content)
    {
        $this->url = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = url('/register/activation/'.$this->url);

        return (new MailMessage)
            ->success()
            ->subject('تکمیل ثبت نام شبکه اجتماعی انرژی')
                    ->line('مرحله اول ثبت نام شما با موفقیت انجام گرفت.')
                    ->line('لطفا برای فعالسازی اکانت خود روی دکمه زیر کلیک نمایید.')
                    ->action('لینک فعالسازی', $url)
                    ->line('سپاس از همراهی شما');
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
