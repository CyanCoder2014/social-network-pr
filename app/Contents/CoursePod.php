<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class CoursePod extends Model
{
    protected $table='courses_pod';
    public $timestamps=false;
    protected $fillable = [
        'id', 'courses_id', 'title', 'image', 'link', 'author',
    ];



    public function course()
    {
        return $this->belongsTo('App\Contents\Course' , 'courses_id');
    }

}
