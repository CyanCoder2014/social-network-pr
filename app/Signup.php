<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $casts=[
      'education' => 'array',
      'career' => 'array',
      'science' => 'array',
    ];
    protected $statuses = [
      0 => 'تایید نشده',
      1 => 'تایید شده توسط',
    ];

    public function transaction(){
        if (isset($this->transaction_id))
            return $this->belongsTo(Transaction::class);
        return $this->morphOne(Transaction::class,'refrence');
    }
    public function gender(){
        if ($this->gender == 0)
            return 'زن';
        return 'مرد';
    }
    public function personality(){
        if ($this->personality == 0)
            return 'حقیق';
        return 'حقوقی';
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function getStatuses(){
        return $this->statuses;
    }
    public function status(){
        return $this->statuses[$this->status]??'نامعلوم';
    }
    public function active(){
        if ($this->active== 0)
            return 'اینترنتی';
        return 'دستی';
    }

}
