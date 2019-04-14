<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class MailModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='mail';
    public $timestamps=false;
    protected $fillable = ['id','subject','user_id','section','emails','content','datetime','last_login','seen','sender','attach'];
}
