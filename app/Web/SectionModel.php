<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class SectionModel extends Model
{

    protected $connection = 'mysql2';

    protected $table='section';
    public $timestamps=false;
    protected $fillable = ['id','title','title_fa','link','link_fa','colored','colored_fa','subtitle','subtitle_fa','description','description_fa','text','text_fa','image_b','image','position','number','ordering','active'];
}
