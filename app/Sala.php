<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Core
{
    
    use SoftDeletes;
    
    protected $table = 'salas';
    protected $softDelete = true;

}
