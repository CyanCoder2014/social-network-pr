<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class SlideModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='f_page';
    public $timestamps=false;
    protected $fillable = ['id','reply_id','user_id','message_id','reply_message','datetime','seen','state','attach'];
}
