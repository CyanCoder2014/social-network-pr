<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class FileCat extends Model
{
    protected $table='files_cat';
    public $timestamps=false;
    protected $fillable = ['id','parent_id','title','image','state'];


    public function subs($parentId)
    {
        return $this->where('parent_id' ,$parentId )->get();
    }

    public function cat()
    {
        return $this->where('parent_id' ,0 )->get();
    }


    public function files()
    {
        return $this->hasMany('App\Contents\File', 'cat_id');
    }


    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
