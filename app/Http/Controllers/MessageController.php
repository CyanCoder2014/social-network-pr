<?php

namespace App\Http\Controllers;

use App\Notifications\Newsletter;
use App\Notifications\Notify;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function inbox($id)
    {
        $notifications = Auth::user()->notifications->take(400);
        $notificationId = $id;




        if($id !== '0'){
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        $notification->markAsRead();
        }
        $notifications->where('type', 'App\Notifications\Event')->take(400)->markAsRead();


        return view('message.inbox', compact('notifications', 'notificationId'));
    }


    public function notify(Request $request)
    {
        $sender = Auth::id();

        $ids = explode(',', $request->usernames);


        if ($request->all == '1') {
            $users = User::get();
        } elseif ($request->all == '2') {
            $users = User::whereIn('network', '1')->get();
        } else {
            $users = User::whereIn('username', $ids)->get();
        }


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
