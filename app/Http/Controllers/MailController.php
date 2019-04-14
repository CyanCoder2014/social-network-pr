<?php

namespace App\Http\Controllers;

use App\Contents\Post;
use App\Notifications\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class MailController extends Controller
{







    public function mailto($content)
    {
//        $content = new MailModel($request->all());
//        $content->datetime = date('m-d-Y H:i:s', time());
//        $content->user_id = Auth::user()->id;
//        $content->save();

//        $emails = $request->emails;
//        $subject = $request->subject;
//        $sender =  $request->sender;
//        $content =  $request->text;

//        $data = [
//            'content' => $content
//        ];
//
//        Mail::send('emails.welcome', $data, function($message)
//        {
//            $message->from('system@cyancoder.co', 'cyan');
//            $message->to('msmaghsoud@gmail.com')->subject('test');
//        });
//
//        //return [$emails, $subject, $sender];
//        return redirect('/')->with('message', 'ایمیل شما با موفقیت ارسال شد');

        $invoice = 'test-mail-1212';
        //$user = Auth::user();
        $user = \App\User::first();

        $user->notify(new UserRegister($invoice));
        //Notification::send( Auth::user(), new UserRegister($invoice));


    }
}
