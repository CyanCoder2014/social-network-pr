<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\ContentModel;
use App\Http\Controllers\Controller;


class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

//public $content = ContentModel::paginate(50);

    public function __construct()
    {
//        $this->middleware('auth');


//        // Auth::user()->lastvisitDate = date('m-d-Y H:i:s', time());
//        //$user = new User(Auth::user()->lastvisitDate);
//        // $user->save();
//
//        if ( Auth::check() ) {
//            $this->middleware('BaseMiddleware');
//        }
//        $this->middleware('auth');

    }

    public function content(BaseController $content)
    {

    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
