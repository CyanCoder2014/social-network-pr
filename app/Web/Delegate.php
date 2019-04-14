<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{

    protected $connection = 'mysql2';

    protected $table='delegates';
    protected $fillable=['name','address','tel','lng','lat','city'];
    protected $casts=['name'=>'array','address'=>'array'];
}
