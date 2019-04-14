<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class ManagerModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='manager';
    public $timestamps=false;
    protected $fillable = ['id','name','title','description','ordering','active','created','images'];
}
