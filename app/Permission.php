<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'id', 'name', 'label', 'state',
    ];




        public function rule()
    {
        return $this->belongsToMany('App\Role');
    }



}
