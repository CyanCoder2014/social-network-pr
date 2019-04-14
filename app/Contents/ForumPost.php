<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $table='forums_posts';


    protected $fillable = [
        'id', 'users_id', 'forums_id', 'parent_id','title', 'image', 'image_b', 'intro', 'text', 'view', 'like', 'comment', 'ban',
        'state', 'news', 'users_id', 'content',
    ];



    public function forum()
    {
        return $this->belongsTo('App\Contents\Forum' , 'forums_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }


    public function comments()
    {
        return $this->hasMany('App\Contents\ForumComment' , 'post_forum_id')->where('parent_id','0')->orderby('id', 'desc')->take(1);
    }


    public static function publish($title ,$intro ,$text, $image, $image_b, $users_id, $news, $state)
    {
        $feed = new static(compact('title', 'intro', 'text', 'image','image_b', 'users_id', 'news', 'state'));

        return $feed;
    }

    public function commentNumber($postId)
    {
        return ForumComment::where('post_forum_id', $postId)->get()->count();
    }

    public function answered($post)
    {
        return $this->where('id', $post)->first();
        //return $this->hasMany('App\Contents\ForumPost' , 'parent_id');
    }
}
