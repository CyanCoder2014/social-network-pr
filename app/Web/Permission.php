<?php

namespace App\Web;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    protected $connection = 'mysql2';

}