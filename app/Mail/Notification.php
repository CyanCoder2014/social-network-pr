<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
//    public function __construct(Order $order)
//    {
//        $this->order = $order;
//    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {



        return $this->from('example@example.com')
            ->view('emails.orders.shipped') ->text('emails.orders.shipped_plain');


        //return $this->view('view.name');








//
//
//        return $this->view('emails.orders.shipped')
//            ->with([
//                'orderName' => $this->order->name,
//                'orderPrice' => $this->order->price,
//            ]);
//
//        ->attach('/path/to/file');




//
//
//        Mail::to($request->user())
//            ->cc($moreUsers)
//            ->bcc($evenMoreUsers)
//            ->send(new OrderShipped($order));
//
//
//        Mail::to($request->user())
//            ->cc($moreUsers)
//            ->bcc($evenMoreUsers)
//            ->queue(new OrderShipped($order));

    }


//
//    public function mailto(Request $request)
//    {
//        $content = new MailModel($request->all());
//        $content->datetime = date('m-d-Y H:i:s', time());
//        $content->user_id = Auth::user()->id;
//        $content->save();
//
//        $emails = $request->emails;
//        $subject = $request->subject;
//        $sender =  $request->sender;
//        $content =  $request->content;
//
//        $data = [
//            'content' => $content
//        ];
//
//        Mail::send('emails.welcome', $data, function($message) use ($emails, $subject, $sender)
//        {
//            $message->from('system@cyancoder.co', $sender);
//            $message->to($emails)->subject($subject);
//        });
//
//        //return [$emails, $subject, $sender];
//        return redirect('admin/newsletter')->with('message', 'ایمیل شما با موفقیت ارسال شد');
//
//    }

}
