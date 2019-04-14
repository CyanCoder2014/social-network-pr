<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;
use App\Contents\Post;

class PostComment extends Model
{
    protected $table='post_comments';

    protected $fillable = [
        'id', 'users_id', 'post_id', 'parent_id', 'comment', 'approved', 'ban', 'like', 'view',
    ];




    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Contents\Post', 'post_id');
    }

    public function comment()
    {
        return $this->belongsTo('App\Post' , 'post_id');
    }
    public function answers()
    {
        return $this->hasMany('App\Contents\PostComment' , 'parent_id');
    }



}
