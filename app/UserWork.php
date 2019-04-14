<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{

    protected $table='users_work';

    protected $fillable = [
        'users_id', 'title', 'start_date', 'finish_date', 'major', 'place',
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
