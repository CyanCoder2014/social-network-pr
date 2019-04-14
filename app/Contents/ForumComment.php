<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    protected $table='forum_comments';

    protected $fillable = [
        'id', 'users_id', 'post_forum_id', 'parent_id', 'comment', 'approved', 'ban', 'like', 'view',
    ];




    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }

    public function post()
    {
        return $this->belongsTo(ForumPost::class , 'post_forum_id');
    }

    public function comment()
    {
        return $this->belongsTo('App\ForumPost' , 'post_forum_id');
    }
    public function answers()
    {
        return $this->hasMany('App\Contents\ForumComment' , 'parent_id');
    }


}
