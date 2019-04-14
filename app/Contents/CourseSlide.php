<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class CourseSlide extends Model
{
    protected $table='courses_slide';
    public $timestamps=false;
    protected $fillable = [
        'id', 'courses_id', 'title', 'image', 'link', 'description','effect',
    ];



    public function course()
    {
        return $this->belongsTo('App\Contents\Course' , 'courses_id');
    }

}
