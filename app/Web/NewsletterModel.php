<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class NewsletterModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='newsletter';
    public $timestamps=false;
    protected $fillable = ['id','name','email','crated_at'];
}
