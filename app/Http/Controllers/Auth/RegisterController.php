<?php

namespace App\Http\Controllers\Auth;

use App\ChatUserData;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use App\Notifications\UserRegister;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;







    public function activateUser($emailConfirm)
    {
        $user = User::where('activation_code', $emailConfirm)->first();

        if($user !== null){
        $user->update(array(
            //'actived'    =>  '1',
            'network'    =>  '1',
        ));
            $role = \App\Role::find(4);
            $role->user()->save($user);

        $this->guard()->login($user);


            $users = User::where('id', $user->id)->get();
            Notification::send($users, new \App\Notifications\Event('1', '80', 'خوش آمدگویی', 'به جامعه انرژی خوش آمدید'));


        return redirect('/home/intro')->with('message', 'ثبت نام شما با موفقیت انجام شد');
        }else{
            return redirect('/home/intro')->with('error', 'خطا در فعالسازی اکانت!');
        }
    }





    protected function registered(Request $request, $user)
    {
        $user->notify(new UserRegister($user->activation_code));
        return redirect('/home/intro')->with('alert', '   مرحله اول ثبت نام با موفقیت انجام شد. لطفا برای تکمیل ثبت نام </b> لینک فعالسازی ارسال شده به ایمیلتان </b> را تایید نمایید. (در صورت عدم دریافت ایمیل فولدر spam خود را چک فرمایید)');
    }



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //    protected $redirectTo = '/';
    protected function redirectTo()
    {
        return  redirect('/home/intro')->with('alert', 'لطفا برای تکمیل ثبت نام لینک فعالسازی ارسال شده به ایمیلتان را تایید نمایید.');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'activation_code' => $this->getActivationCode(),
        ]);


        $chatUser = new ChatUserData;
        $profile = $chatUser->create([
            'id' => $user->id,
            'username' => $data['username'],
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'country' => 'IN',
            'last_active_timestamp' => date('Y-m-d H:i:s'),
            'joined' => date('Y-m-d H:i:s'),

        ]);

        return $user;



    }
}
