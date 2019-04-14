<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = [
        'id', 'name', 'label', 'state',
    ];


    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function permission()
    {
        return $this->hasMany('App\Permission');
    }



}
