<?php

namespace App\Http\Controllers\Web;

use App\Web\Delegate;
use Illuminate\Http\Request;

class FrontDelegateController extends Controller
{
    public function Show($id){
        $del= Delegate::find($id);
        if($del){
            return view('delegates.delegate',compact('del'));
        }
        else
            return view('errors.404');
    }
}
