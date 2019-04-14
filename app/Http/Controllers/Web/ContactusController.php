<?php

namespace App\Http\Controllers\Web;

use App\Web\MessageModel;
use App\Web\NewsletterModel;
use App\User;
use App\Web\Utility;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactusController extends Controller
{
    public function admin()
    {
        if ( Auth::check() ) {
            $this->middleware('UserMiddleware');
        }else{
            $this->middleware('auth');
        }
    }

    public function form()
    {
        $setting=Utility::where('type',"setting")->orderBy('id', 'desc')->first();
        $contact=Utility::where('type',"contact")->orderBy('id', 'desc')->first();


        return View('contactus/form',compact('setting','contact'));
    }
    public function send(Request $request)
    {
        $this->validate($request,
            [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'tell' => 'size:11|numeric',
            'message' => 'required',
            ],
            [
                'name.required' => 'وارد کردن نام الزامی است',
                'email.required' => 'وارد کردن ایمیل الزامی است',
                'subject.required' => 'وارد کردن عنوان الزامی است',
                'tell.size' => 'شماره تلفن وارد شده صحیح نیست',
                'tell.numeric' => 'وشماره تلفن وارد شده صحیح نیست',
                'message.required' => 'وارد کردن پیام الزامی است',

            ]);
        $content = new MessageModel($request->all());
        $content->datetime = date('m-d-Y H:i:s', time());

        $content->save();

        return redirect('/')->with('message', 'پیام شما با موفقیت ارسال شد');
    }
    public function subscribe(Request $request){
        $sub = new NewsletterModel($request->all());
        $sub->save();
        return redirect()->back()->with('message','ثبت نام شما در خبر نامه با موفقیت انجام شد');
    }


    public function reply(Request $request , $id)
    {
        $this->admin();
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


        return redirect()->back()->with('message','جواب شما با موفقیت انجام شد');
    }


    public function index()
    {
        $this->admin();


        //$id = Auth::user()->id;

        $messages = MessageModel::orderby('id', 'desc')->paginate(20);

        return View('admin/contactus/messages', ['messages' => $messages]);
    }


    public function store(Request $request)
    {
        $this->admin();
        $content = new MessageModel($request->all());
        $content->datetime = date('m-d-Y H:i:s', time());
        $content->user_id = Auth::user()->id;

        $content->save();

        return redirect()->back()->with('message','پیام شما با موفقیت ارسال شد');
    }


    public function destroy($id)
    {
        $delete = MessageModel::find($id)->delete();
        return redirect('/admin/message');
    }

    public function mail(Request $request,$id)
    {
        Mail::send('emails.welcome', $request->reply_message, function ($message,$tt) {
            $message->from('system@pii.ir', 'انجمن حرفه ای بیمه');
            $message->to('info@cyancoder.com')->cc('system@pii.ir');
        });
    }

}
