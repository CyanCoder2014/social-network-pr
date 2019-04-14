<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='project';
    public $timestamps=false;
    protected $fillable = ['id','title','text','content','valency','registered','link','startDate','hour','price','publish','images'];
}
