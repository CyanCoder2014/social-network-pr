<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $connection = 'mysql2';

    protected $table='products';
    protected $casts=[
        'title'=>'array',
        'description'=>'array',
        'meta'=>'array',
        'images'=>'array',
        ];
    public function category(){

        return $this->hasOne('App\ProductsCats','id','cat');
    }
}
