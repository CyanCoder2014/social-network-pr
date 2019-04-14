<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table='connection_users';

    protected $fillable = [
        'followers_id', 'followings_id', 'connections_id', 'user_id'
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function following($followings_id)
    {
        return User::where('id', $followings_id)->first();
    }

    public function follower($followers_id)
    {
        return User::where('id', $followers_id)->first();
    }


}
