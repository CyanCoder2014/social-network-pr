<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
    protected $table='course_comments';

    protected $fillable = [
        'id', 'users_id', 'course_id', 'parent_id', 'comment', 'approved', 'ban', 'like', 'view',
    ];




    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class , 'course_id');
    }

    public function comment()
    {
        return $this->belongsTo('App\Course' , 'course_id');
    }
    public function answers()
    {
        return $this->hasMany('App\Contents\CourseComment' , 'parent_id');
    }

}
