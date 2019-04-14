<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEdu extends Model
{


    protected $table='users_edu';

    protected $fillable = [
        'users_id', 'title', 'start_date', 'start_month', 'start_year', 'finish_date', 'finish_month','finish_year', 'major', 'place',
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }

}
