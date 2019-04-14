<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['id','users_id','cat_id','title','place','start','start_time ',
        'finish','finish_time','image','description','like','state'];



    public function cat()
    {
        return $this->belongsTo('App\Contents\EventCat' , 'cat_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }
}
