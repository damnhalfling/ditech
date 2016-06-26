<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Input;

use View;
use DB;
use Auth;
use Redirect;

use \App\Reserva;

class ReservaController extends Controller
{

    public function criar() {

        $inputs = Input::all();
        $date   = $inputs['data']."  ".$inputs['horaInicio'];

        $exists = Reserva::where('id_sala',$inputs['sala'])->where('datahora',$date)->first();

        if (!$exists) {
            $reserva = new Reserva();
            $reserva->id_usuario = Auth::user()->id;
            $reserva->id_sala = $inputs['sala'];
            $reserva->datahora = $date;
            $reserva->save();
        }

        return Redirect::back();
 

	}
   
}
