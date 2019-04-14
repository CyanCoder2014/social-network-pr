<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class PostCat extends Model
{
    protected $table='forums_cat';
    public $timestamps=false;
    protected $fillable = ['id','parent_id','title','image','state'];
}
