<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class EventCat extends Model
{
    protected $table='events_cat';
    public $timestamps=false;
    protected $fillable = ['id','parent_id','title','image','state'];


    public function events()
    {
        return $this->hasMany('App\Contents\Event', 'cat_id');
    }


    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
