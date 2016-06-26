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
        $reservas = Reserva::with('sala')->get();

        return View::make('admin.dashboard')
            ->with('reservas',$reservas)
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
