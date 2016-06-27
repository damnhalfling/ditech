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
        $data   = $inputs['data'];
        $hora   = $inputs['horaInicio'];
        $msg    = "";

        $salaReservada = Reserva::where('id_sala',$inputs['sala'])->where('data',$data)->where('hora',$hora)->first();
        $reserveiEsteHorario = Reserva::where('id_usuario',Auth::user()->id)->where('data',$data)->where('hora',$hora)->first();

        if (!$salaReservada && !$reserveiEsteHorario) {
            $reserva = new Reserva();
            $reserva->id_usuario = Auth::user()->id;
            $reserva->id_sala    = $inputs['sala'];
            $reserva->data       = $data;
            $reserva->hora       = $hora;
            $reserva->save();
        }

        if($salaReservada) $msg = "Sala já reservada";
        if($reserveiEsteHorario) $msg .= " Você já possui reservas neste horário";

        return Redirect::back()->with('msg',$msg);
 

	}
   
}
