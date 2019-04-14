<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserForum extends Model
{


    protected $table='users_edu';

    protected $fillable = [
        'users_id', 'title', 'start_date', 'finish_date', 'major', 'place',
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }

}
