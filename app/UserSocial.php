<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Scopes\AgeScope;
//use App\Events\UserSaved;
//use App\Events\UserDeleted;
//use Illuminate\Notifications\Notifiable;


class UserSocial extends Model
{


    protected $table='users_social';

    protected $fillable = [
        'users_id', 'title', 'link', 'google', 'telegram', 'instagram', 'tweeter', 'youtube', 'aparat', 'linkedin', 'facebook', 'karamun', 'other1',
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }



//    protected static function boot()
//    {
//        parent::boot();
//
//        static::addGlobalScope(new AgeScope);
//    }
//
//    public function scopeOfType($query, $type)
//    {
//        return $query->where('type', $type);
//    }

//    use Notifiable;
//
//    protected $dispatchesEvents = [
//        'saved' => UserSaved::class,
//        'deleted' => UserDeleted::class,
//    ];



}
