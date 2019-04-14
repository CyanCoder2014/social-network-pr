<?php

namespace App\Http\Controllers\Web;

use App\Web\MessageModel;
use App\Web\NewsletterModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function __construct()
    {
        if ( Auth::check() ) {
            $this->middleware('UserMiddleware');
        }else{
            $this->middleware('auth');
        }
    }

    public function send(Request $request)
    {
        $content = new MessageModel($request->all());
        $content->datetime = date('m-d-Y H:i:s', time());

        $content->save();

        return redirect('/#tf-contact')->with('message', 'پیام شما با موفقیت ارسال شد');
    }
    public function subscribe(Request $request){
        $sub = new NewsletterModel($request->all());
        $sub->save();
        return redirect()->back()->with('message','ثبت نام شما در خبر نامه با موفقیت انجام شد');
    }


    public function reply(Request $request , $id)
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');

        MessageModel::where('id', $id)->update(array(
            'reply'    =>  $request->reply_message,
            'reply_user'    =>  Auth::user()->id,
            'state'    =>  '1',
            'datetime'    =>  date('m-d-Y H:i:s', time()),
        ));


        return redirect('admin/message');
    }


    public function index()
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');

        //$id = Auth::user()->id;

        $messages = MessageModel::orderby('id', 'desc')->paginate(20);

        return View('web.admin.message.messages', ['messages' => $messages]);
    }


    public function store(Request $request)
    {
        $content = new MessageModel($request->all());
        $content->datetime = date('m-d-Y H:i:s', time());
        $content->user_id = Auth::user()->id;

        $content->save();

        return redirect('admin/message');
    }


    public function destroy($id)
    {
        $delete = MessageModel::find($id)->delete();
        return redirect('/admin/message');
    }

    public function mail(Request $request,$id)
    {
        Mail::send('emails.welcome', $request->reply_message, function ($message,$tt) {
            $message->from('system@iraneec.ir', '');
            $message->to('info@cyancoder.com')->cc('system@iraneec.ir');
        });
    }

}
