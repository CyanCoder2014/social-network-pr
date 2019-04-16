<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Bus\Queueable;
use App\Jobs\Post\CreatePostJob;


class Post extends Model
{

    protected $fillable = [
        'id', 'users_id', 'cat_id', 'title', 'image', 'image_b', 'intro', 'text', 'view', 'like','share', 'comment','report','ban',
        'state', 'news', 'users_id', 'content',
    ];



    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }


    public function comments()
    {
        return $this->hasMany('App\Contents\PostComment' , 'post_id')->where('parent_id','0')->orderby('id', 'desc')->take(1);
    }


    public static function publish($title ,$intro ,$text, $image, $image_b, $users_id, $news, $state)
    {
        $feed = new static(compact('title', 'intro', 'text', 'image','image_b', 'users_id', 'news', 'state'));

        return $feed;
    }

    public function commentNumber($postId)
    {
        return PostComment::where('post_id', $postId)->get()->count();
    }


//    public function share($postId)
//    {
//
//        return Post::where('id', $postId)->first();
//    }
}
