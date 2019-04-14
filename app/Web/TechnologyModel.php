<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class TechnologyModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='technology';
    public $timestamps=false;
    protected $fillable = ['id','title','title_fa','alias','introtext','fulltext','introtext_fa','fulltext_fa','state','mask','catid','created','created_by','author','author_fa','modified','modified_by','images','publish_up','f_page','comment','publish','publish_fa'];
}
