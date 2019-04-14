<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='message';
    public $timestamps=false;
    protected $fillable = ['id','name','email','message','datetime','reply','reply_user','state'];
}