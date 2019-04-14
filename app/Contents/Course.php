<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'id', 'users_id', 'cat_id', 'title', 'image', 'image_b', 'intro', 'text', 'view', 'like', 'comment', 'ban',
        'state',
    ];


    public function pods()
    {
        return $this->hasMany('App\Contents\CoursePod', 'courses_id');
    }

    public function slides()
    {
        return $this->hasMany('App\Contents\CourseSlide', 'courses_id');
    }




    public function cat()
    {
        return $this->belongsTo('App\Contents\CourseCat' , 'cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }


    public function comments()
    {
        return $this->hasMany('App\Contents\CourseComment' , 'course_id')->where('parent_id','0')->orderby('id', 'desc')->take(1);
    }


    public function commentNumber($postId)
    {
        return CourseComment::where('course_id', $postId)->get()->count();
    }


}
