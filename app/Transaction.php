<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function status(){
        switch ($this->status){
            case 'INIT': return 'پرداخت نشده';
            case 'SUCCEED': return 'موفق';
            case 'FAILED': return 'ناموفق';
        }
    }
}
