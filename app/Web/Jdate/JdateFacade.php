<?php
namespace App\Jdate;

use Illuminate\Support\Facades\Facade;

class JdateFacade extends Facade{
    protected static function getFacadeAccessor() { return 'jdate'; }
}