<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{

    protected $connection = 'mysql2';


    protected $table='project';
    public $timestamps=false;
    protected $fillable = ['id','title','title_fa','mask','attribs ','alias','introtext','fulltext','introtext_fa','fulltext_fa','state','mask','catid','created','created_by','author','author_fa','modified','modified_by','images','publish_up','f_page','comment','publish','publish_fa'];
    protected $casts=['pimages'=>'array'];
    public function category(){

        return $this->hasOne('App\PrCategoryModel','id','catid');
    }
}
