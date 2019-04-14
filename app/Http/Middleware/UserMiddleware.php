<?php

namespace App\Http\Middleware;

use App\Http\Controllers\PostController;
use Closure;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UserMiddleware
{

    public function handle($request, Closure $next)
    {

        //if (Auth::user()->can('manager', PostController::class)) {
        if (!Auth::user()->can('admin', \App\Contents\Post::class)) {
            return redirect('/home/intro')->with('message', 'دسترسی شما به بخش مورد نظر محدود شده است');
        }
        return $next($request);


    }
}
