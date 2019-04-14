<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class PrCategoryModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='pr_category';
    public $timestamps=false;
    protected $fillable = ['id','title','title_fa'];

    public function link(){
        return route('project.cat',['url' => $this->id ]);
    }
}
