<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Input;

use Redirect;
use DB;
use View;
use Auth;
use Validator;
use Hash;
use \App\User;
use \App\Sala;
use \App\Reserva;

class UsuarioController extends Controller
{
 
    public function dashboard() {

        $salas = Sala::all();
        $minhasReservas = Reserva::with('sala')->where('id_usuario',Auth::user()->id)->orderBy('data','ASC')->orderBy('hora','ASC')->get();
        $todasReservas = [];
        $horas = [];    
        $sala = new Reserva();
        $colunas = $sala->getColumns();

        foreach($colunas as $coluna){
            if($coluna['campo'] == 'hora'){
                $horas = $coluna;
            }
        }

        foreach(Reserva::with('sala')->get() as $reserva){
        
            $reservaAtual['title'] = $reserva->sala->nome;
            $reservaAtual['start'] = $reserva->data."T".$reserva->hora.":00";
            $reservaAtual['end'] = "";
            
            if($reserva->id_usuario == Auth::user()->id) {
                $reservaAtual['color'] = '#00aca';
            } else {
                $reservaAtual['color'] = '#ff5b57';
            }

            $todasReservas[] = $reservaAtual;   

        }

        $todasReservas = json_encode($todasReservas);

        return View::make('admin.dashboard')
            ->with('todasReservas',$todasReservas)
            ->with('minhasReservas',$minhasReservas)
            ->with('horas',$horas)
            ->with('salas',$salas);
    
    }

    public function criar() {
    
        $inputs = Input::all();

        $regras = [
                    'email' => 'required|email|unique:usuarios',
                    'password' => 'required|confirmed'
                ];

        $validacao = Validator::make(array('email' => $inputs['email'],'password' => $inputs['password'],'password_confirmation' => $inputs['password_confirmation']), $regras);
    
        if ($validacao->fails())
            return Redirect::back()->with("mensagem_erro","Houve um problema ao criar o usuário. Favor verifique os campos obrigatórios. ".$validacao->messages());

        $usuario = new User(); 
        $usuario->email = Input::get('email');
        $usuario->password = Hash::make( Input::get('password') );
        $usuario->save();

        Auth::login($usuario);
        
        return Redirect::to('/');
 
    }

    public function verificar() {
        $teste  = Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('senha')));

        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('senha')))) {
            return Redirect::to('/');
        } else {
            return Redirect::back();
        }
    }


}
