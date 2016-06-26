<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use tinkerbell\Http\Requests;
Use Illuminate\Support\Facades\Input;

use Redirect;
use DB;
use View;
use Auth;
use Validator;
use Hash;
use \App\User;

class UsuarioController extends Controller
{
 
    public function dashboard() {

        return View::make('admin.dashboard');
    
    }

    public function criar() {
    
        $inputs = Input::all();

        $regras = [
                    'email' => 'required|email|unique:usuarios',
                    'senha' => 'required|confirmed'
                ];

        $validacao = Validator::make(array('email' => $inputs['email'],'senha' => $inputs['senha'],'senha_confirmation' => $inputs['senha_confirmation']), $regras);
    
        if ($validacao->fails())
            return Redirect::back()->with("mensagem_erro","Houve um problema ao criar o usuário. Favor verifique os campos obrigatórios. ".$validacao->messages());

        $usuario = new User(); 
        $usuario->email = Input::get('email');
        $usuario->senha = Hash::make( Input::get('senha') );
        $usuario->save();

        Auth::login($usuario);
        
        return Redirect::to('/');
 
    }

    public function verificar() {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('senha')))) {
            return Redirect::to('/');
        } else {
            return Redirect::back();
        }
    }


}
