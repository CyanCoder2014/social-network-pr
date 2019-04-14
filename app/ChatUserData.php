<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUserData extends Model
{
    protected $table='chat_userdata';

    protected $fillable = [
        'id', 'username', 'password', 'email', 'name', 'country', 'about','sex', 'dob', 'picname', 'online', 'last_active_timestamp', 'joined',
    ];


    public $timestamps = false;
}
