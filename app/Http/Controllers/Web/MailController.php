<?php

namespace App\Http\Controllers\Web;

use App\Web\MailModel;
use App\User;
use Mail;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;




class MailController extends Controller
{
    public function __construct()
    {
        if ( Auth::check() ) {
            $this->middleware('UserMiddleware');
        }else{
            $this->middleware('auth');
        }
    }



    public function index()
    {
        $users = User::orderby('id', 'desc')->paginate(20);

        return view('admin.mail.sort' , ['users'=>$users]);
    }



    public function mailto(Request $request)
    {
        $content = new MailModel($request->all());
        $content->datetime = date('m-d-Y H:i:s', time());
        $content->user_id = Auth::user()->id;
        $content->save();

        $emails = $request->emails;
        $subject = $request->subject;
        $sender =  $request->sender;
        $content =  $request->content;

        $data = [
            'content' => $content
        ];

        Mail::send('emails.welcome', $data, function($message) use ($emails, $subject, $sender)
        {
            $message->from('system@cyancoder.co', $sender);
            $message->to($emails)->subject($subject);
        });

        //return [$emails, $subject, $sender];
        return redirect('admin/newsletter')->with('message', 'ایمیل شما با موفقیت ارسال شد');

    }

}