<?php

namespace App;

use App\Contents\ForumCat;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'family', 'username', 'activation_code', 'actived', 'network', 'state',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function roleLabel()
    {
        return $this->roles()->orderby('id', 'asc')->take(1);
    }

    public function label()
    {
        return "کاربر سایت";
    }

    public function profile()
    {
        return $this->hasOne('App\UserProfile', 'users_id');
    }

    public function social()
    {
        return $this->hasOne('App\UserSocial', 'users_id');
    }

    public function educations()
    {
        return $this->hasMany('App\UserEdu', 'users_id');
    }

    public function works()
    {
        return $this->hasMany('App\UserWork', 'users_id');
    }

    public function skills()
    {
        return $this->hasMany('App\UserSkill', 'users_id');
    }

    public function articles()
    {
        return $this->hasMany('App\UserArticle', 'users_id');
    }

    public function forums()
    {
        return $this->belongsToMany('App\Contents\Forum')->wherePivot('register', '1');
    }

    public function forumsGetRegister()
    {
        return $this->forums()->pluck('id')->all();
    }

    public function forumsReq()
    {
        return $this->belongsToMany('App\Contents\Forum');
    }

    public function forumsRequested()
    {
        return $this->forumsReq()->pluck('id')->all();
    }


    public function activities()
    {
        return $this->hasMany('App\UserActivity', 'users_id');
    }

    public function tags()
    {
        return $this->hasMany('App\Contents\Tag', 'users_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Contents\Post', 'users_id');
    }


    public function courses()
    {
        return $this->hasMany('App\Contents\Course', 'users_id');
    }

    public function post()
    {
        return $this->hasMany('App\Contents\Post')->latest();
    }




    public function forumCat()
    {
        return $this->belongsToMany('App\Contents\ForumCat');
    }

    public function forumCatTitle()
    {
        return $this->forumCat()->orderby('id', 'asc')->take(2);
    }




    public function connections()
    {
        return $this->hasMany('App\Follow', 'user_id');
    }


    public function connectionsIds($user)
    {
//        ->wherePivotIn('priority', [1, 2])
        if (Auth::check()) {
            $result = $this->where('id', $user)->first()->connections()->pluck('followings_id')->toArray();
        } else {
            $result = $this->all()->toArray();
        }
        return $result;
    }


    public function admin()
    {

        return $this->roles->pluck('name')->contains('admin');
    }

    public function manager()
    {

        return $this->roles->pluck('name')->contains('manager');
    }

    public function director()
    {

        return $this->roles->pluck('name')->contains('director');
    }




    public function followers()
    {

        return $this->connections()->where('connections_id', '10');

    }




    public function rolesList()
    {
        return $roles = Role::orderby('id','desc')->paginate(10);
    }

    public function forumCatList()
    {
        return  $cats12 = ForumCat::where('parent_id', '0')->get();
    }
}
