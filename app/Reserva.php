<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Core
{
    
    use SoftDeletes;
    
    protected $table = 'reservas';
    protected $softDelete = true;

    public function sala(){
        return $this->belongsTo('App\Sala', 'id_sala');
    }

}
