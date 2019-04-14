<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['id','users_id','cat_id','title','type','name','size',
        'link','image','image_b','description','like','state'];



    public function cat()
    {
        return $this->belongsTo('App\Contents\FileCat' , 'cat_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }


    public function tag()
    {
        return $this->belongsToMany('App\Contents\Tag', 'files_tag', 'files_id', 'tags_id');
    }





    public function tags()
    {

        return Tag::where('id', '1');

    }


}
