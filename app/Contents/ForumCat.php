<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class ForumCat extends Model
{
    protected $table='forums_cat';
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


    public function forums()
    {
        return $this->hasMany('App\Contents\Forum', 'cat_id');
    }

    public function groups()
    {
        return $this->hasMany('App\Contents\ForumGroup', 'cat_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }



}
