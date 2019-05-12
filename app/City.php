<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table='city';
    protected $searchableColumns = ['name'];

    public function province(){
        return $this->belongsTo(Province::class);
    }

}
