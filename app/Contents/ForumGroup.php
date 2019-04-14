<?php

namespace App\Contents;

use Illuminate\Database\Eloquent\Model;

class ForumGroup extends Model
{
    protected $table='forums_group';
    public $timestamps=false;
    protected $fillable = ['id','parent_id', 'cat_id', 'title', 'image', 'state'];


    public function subs($parentId)
    {
        return $this->where('parent_id' ,$parentId )->get();
    }

    public function forums()
    {
        return $this->hasMany('App\Contents\Forum', 'group_id');
    }

    public function cat()
    {
        return $this->belongsTo('App\Contents\ForumCat' , 'cat_id');
    }
}
