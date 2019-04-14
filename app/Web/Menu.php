<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $connection = 'mysql2';

    protected $table='menus';
    protected $fillable = ['id','parent_id','name','type','paginate','type','link','active','deletable'];
    protected $casts=[
        'name'=> 'array',
        'link'=> 'array'
    ];
    public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id', 'id')->where('active',1);
    }

    public function items(){
        if($this->type == 2)
            return CategoryModel::orderby('id',$this->sort)->paginate($this->paginate);
        elseif($this->type == 3)
            return PrCategoryModel::orderby('id',$this->sort)->paginate($this->paginate);
        else
            return [];
    }

    public function link_maker($lang){

        if($this->type == 1)
            return $this->link[$lang];
        elseif($this->type == 4)
            return route('content.cat',['id' => $this->link[$lang]]);
        elseif($this->type == 5)
            return route('project.cat',['id' => $this->link[$lang]]);
        else
            return '#';

    }
}
