<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Bus\Queueable;
use App\Jobs\Post\CreatePostJob;


class Content extends Model
{
    protected $table='contents_p';

    protected $fillable = [
        'id', 'users_id', 'title', 'intro', 'text',
    ];



    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }




}
