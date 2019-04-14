<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
class BaseMiddleware
{

    public function handle($request, Closure $next)
    {
//        if ( $request->user()->usertype == 'Registered' ) {
//            return redirect('/');
//        }
//        return $next($request);
    }
}
