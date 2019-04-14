<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = [
        'id', 'users_id', 'cat_id', 'group_id', 'title', 'image', 'image_b', 'text', 'view', 'like', 'comment', 'ban',
        'state',
    ];


    public function forumPost()
    {
        return $this->hasMany('App\Contents\ForumPost');
    }


    public function postNumber($id)
    {
        return ForumPost::where('forums_id' ,$id)->get()->count();
    }


    public function userNumber($id)
    {

        return ForumPost::where('forums_id' ,$id)->get()->pluck('users_id')->unique()->count();
    }


    public function cat()
    {
        return $this->belongsTo('App\Contents\ForumCat' , 'cat_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Contents\ForumGroup' , 'group_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }


    public static function publish($title ,$intro ,$text, $image, $image_b, $users_id, $news, $state)
    {
        $feed = new static(compact('title', 'intro', 'text', 'image','image_b', 'users_id', 'news', 'state'));

        return $feed;
    }



    public function users()
    {
        return $this->belongsToMany('App\User')->wherePivot('register', '1');
    }

    public function usersReq()
    {
        return $this->belongsToMany('App\User')->wherePivot('register', '0');
    }


}
