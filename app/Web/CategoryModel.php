<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='category';
    public $timestamps=false;
    protected $fillable = ['id','parent_id','title','title_fa','name','alias','image','created','section','image_position','description','published','checked_out','checked_out_time','editor','ordering'];

    public function link(){
        return route('content.cat',['url' => $this->id ]);
    }

}
