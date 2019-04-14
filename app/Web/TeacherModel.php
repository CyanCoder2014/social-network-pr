<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='f_page';
    public $timestamps=false;
    protected $fillable = ['id','name','title','description','ordering','active','images'];
}
