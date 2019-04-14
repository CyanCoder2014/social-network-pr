<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatConnection extends Model
{
    protected $table='chat_connections';

    protected $fillable = [
        'user_id', 'connection_id',
    ];


    public $timestamps = false;
}
