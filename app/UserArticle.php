<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserArticle extends Model
{

    protected $table='users_article';

    protected $fillable = [
        'users_id', 'title', 'publish_date', 'journal', 'link', 'file','coworker','type',
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }


}
