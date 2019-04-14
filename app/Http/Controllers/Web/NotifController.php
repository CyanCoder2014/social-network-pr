<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ContactusReq;
use App\Http\Requests\NewsletterReq;
use App\Notifications\Newsletter;
use App\Notifications\Notify;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Web\NewsletterModel;

class NotifController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){

        $users = User::get();

        return view('admin.notification.index', compact('users'));

    }
    public function send(ContactusReq $request)
    {
        $content = new MessageModel($request->all());
        $content->datetime = date('m-d-Y H:i:s', time());

        $content->save();

        return redirect('/#tf-contact')->with('message', 'پیام شما با موفقیت ارسال شد');
    }


    public function inbox()
    {
        $notifications = Auth::user()->notifications->take(400);
        $notifications->where('type', 'App\Notifications\Notify')->take(400)->markAsRead();

        return view('admin.notification.inbox', compact('notifications', 'notificationId'));
    }

    public function markasread($id)
    {


        if($id !== '0'){
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        if(isset($notification->id))
            $notification->markAsRead();
        }
        return redirect()->back()->with('message','نوتیفیکشین خوانده شد');
    }


    public function subscribe(NewsletterReq $request){
        $sub = new NewsletterModel($request->all());
        $sub->save();
        return redirect()->back()->with('message','ثبت نام شما در خبر نامه با موفقیت انجام شد');
    }




    public function notify(Request $request)
    {
        $sender = Auth::id();

        $ids = $request->id;
        $url='#';

        if ($request->all == '1') {
            $users = User::get();
        } elseif ($request->all == '2') {
            $users = User::whereIn('network', '1')->get();
        } else {
            $users = User::whereIn('id', $ids)->get();
        }


        if ($request->type == '1') {
            Notification::send($users, new Notify($sender, $request->title, $request->message,$request->priority,$url));
        } elseif ($request->type == '2') {
            Notification::send($users, new Newsletter($sender, $request->title, $request->message));
        } else {
            Notification::send($users, new Notify($sender, $request->title, $request->message,$request->priority,$url));
            Notification::send($users, new Newsletter($sender, $request->title, $request->message));
        }

        return back()->with('message', 'پیام شما با موفقیت ارسال شد');
    }


    public function message(Request $request, $userId)
    {
        $sender = Auth::id();

        $users = User::where('id', $userId)->get();

        if ($request->type == '1') {
            Notification::send($users, new Notify($sender, $request->title, $request->message));
        } elseif ($request->type == '2') {
            Notification::send($users, new Newsletter($sender, $request->title, $request->message));
        } else {
            Notification::send($users, new Notify($sender, $request->title, $request->message));
            Notification::send($users, new Newsletter($sender, $request->title, $request->message));
        }

        return back()->with('message', 'پیام شما با موفقیت ارسال شد');
    }


    public function getUsernames()
    {
        $users = User::get()->pluck('username');

        return json_encode($users);
    }


    public function email($message, $userId)
    {
        $users = User::where('id', $userId)->get();
//        Notification::send($users, new Newsletter($message));
    }

    public function newsletter($message, $userIds)
    {
        $userIds = [1, 2, 3, 4, 5];

        $users = User::whereIn('id', $userIds)->get();
//        Notification::send($users, new Newsletter($message));
    }


}
