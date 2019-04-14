<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['id','users_id','title','intro','view'];




    public function file()
    {
        return $this->belongsToMany('App\Contents\File', 'files_tag', 'tags_id', 'files_id');
    }

    public function post()
    {
        return $this->belongsToMany('App\Contents\Post');
    }

    public function forum()
    {
        return $this->belongsToMany('App\Contents\Forum');
    }


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }


}
