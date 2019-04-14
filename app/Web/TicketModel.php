<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{

    protected $connection = 'mysql2';
    protected $table='ticket_message';
    public $timestamps=false;
    protected $fillable = ['id','title','user_id','section','priority','message','datetime','last_login','seen','state','attach'];
}
