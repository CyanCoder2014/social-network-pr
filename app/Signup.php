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
}
