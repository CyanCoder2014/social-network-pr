<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';
    protected function redirectTo()
    {

        if (Auth::user()->actived != 1) {


            return '/home/profile/edit';


//            return redirect('/home/profile/edit');
//                ->with('alert', "لطفا جهت دسترسی کامل <a href='home/profile/edit'> پروفایل </a> خود را تکمیل نمایید.");
        }else{
//            return back()->with('message', Auth::user()->username."  خوش آمدید  ");
            return '/home/intro';
        }

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }


    /**
     * Additional condition for auth.
     *
     */
    public function authenticated(Request $request, $user)
    {
        $network = $user->network;
        $state = $user->state;

        if ($network == 0) {
            auth()->logout();
            return redirect('/home/intro')->with('alert', 'لطفا برای ورود ابتدا ایمیل فعالسازی ارسال شده را تایید نمایید.');
        }
        //elseif($state == 0){
        //return redirect()->with('alert', 'لطفا برای ورود ابتدا ایمیل فعالسازی ارسال شده را تایید نمایید.');

        // }
    }


}
