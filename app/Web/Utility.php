<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{

    protected $connection = 'mysql2';


    public $table='utility';
    protected $casts = [
        'data' => 'array'
    ];
}
