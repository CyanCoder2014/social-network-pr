<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class ProductsCats extends Model
{

    protected $connection = 'mysql2';

    protected $fillable=['title','title_fa'];
    protected $table='products_cat';


    public function products($numer = 0){
        if($numer == 0)
            return $this->hasMany('App\Products','cat')->orderBy('id','desc');
        else
            return $this->hasMany('App\Products','cat')->orderBy('id','desc')->take($numer)->get();

    }

}
