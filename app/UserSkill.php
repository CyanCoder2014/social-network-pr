<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{


    protected $table='users_skill';

    protected $fillable = [
        'users_id', 'title', 'description', 'score',
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }

}
