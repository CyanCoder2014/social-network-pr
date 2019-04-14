<?php
//
//namespace App;
//
//use Illuminate\Database\Eloquent\Model;
//
//class CommentModel extends Model
//{
//    protected $table='comment';
//    public $timestamps=false;
//    protected $fillable = ['id','parent_id','post_id','userid','name','email','comment','date','published'];
//
//    public function children()
//    {
//        return $this->hasMany('App\CommentModel', 'parent_id', 'id');
//    }
//}


namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='comment';
    public $timestamps=false;
    protected $fillable = ['id','parent_id','post_id','userid','name','username','email','comment','date','published'];

    public function user()
    {
        return $this->BelongsTo('App\User' , 'userid');
    }

    public function reply()
    {
        return $this->hasMany('App\CommentModel' , 'post_id')->where('published',1);
    }
    public function adminreply()
    {
        return $this->hasMany('App\CommentModel' , 'post_id');
    }

    public function post()
    {

        return $this->BelongsTo('App\ContentModel' , 'parent');
    }
}
