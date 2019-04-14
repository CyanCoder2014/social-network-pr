<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{

    protected $table='users_activity';

    protected $fillable = [
        'types_id', 'targets_id', 'users_id',
    ];



    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Contents\Post' , 'targets_id');
    }

    public function forumPost()
    {
        return $this->belongsTo('App\Contents\ForumPost' , 'targets_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Contents\Course' , 'targets_id');
    }

    public function userTarget()
    {
        return $this->belongsTo('App\User' , 'targets_id');
    }
}
