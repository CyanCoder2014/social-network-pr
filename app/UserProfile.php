<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

//    protected $connection = 'mysql2';

    protected $table='users_profile';

    protected $fillable = [
        'users_id', 'national_code', 'gender', 'birth', 'country', 'image', 'image_b', 'intro', 'education', 'job', 'tell', 'mobile', 'site', 'introduce',
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }
}
