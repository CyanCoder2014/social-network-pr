<?php

namespace App\Http\Controllers\Web;

use App\Signup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSignupController extends Controller
{
    public function index(){
        $signups = Signup::OrderBy('id','desc')->paginate(10);
        return view('admin.signup.manage',compact('signups'));
    }
}
