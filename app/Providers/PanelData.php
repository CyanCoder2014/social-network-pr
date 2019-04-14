<?php

namespace App\Providers;

use App\Web\CommentModel;
use App\Web\MessageModel;
use App\Web\SectionModel;
use App\Web\TicketModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use App\User;

use App\ChatUserData;
use App\Notifications\Newsletter;
use App\Notifications\UserRegister;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;



class PanelData extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $user = User::find(Auth::id());
//       $notifications = $user->notifications ;
       //$messages = $user->unreadNotifications;

        $count_user = User::get()->count();

        $count_comment = CommentModel::get()->count();
        $count_comment_o = CommentModel::where('published','1')->get()->count();

        $count_message =  MessageModel::get()->count();
        $count_message_o =  MessageModel::where('state','1')->get()->count();

        $count_ticket = TicketModel::get()->count();
        if ($count_ticket ==0){$count_ticket = 1;};

        $count_ticket_o = TicketModel::where('state','0')->get()->count();
        $text20 = SectionModel::where('id', '20')->first();


        view()->share(['text20' =>$text20,'count_user' =>$count_user,'count_comment' =>$count_comment, 'count_message' =>$count_message ,'count_ticket' =>$count_ticket ,'count_comment_o' =>$count_comment_o, 'count_message_o' =>$count_message_o ,'count_ticket_o' =>$count_ticket_o]);

//        view()->share([]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
