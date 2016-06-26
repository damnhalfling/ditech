<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use tinkerbell\Http\Requests;
Use Illuminate\Support\Facades\Input;

use Redirect;
use DB;
use View;
use Auth;

Use App\CmpConfig;

class UsuarioController extends Controller
{
 
    public function dashboard() {

        return View::make('admin.dashboard')
            ->with('campanhasAtivas', CmpConfig::with('frequencia')->where('b_ativo',1)->where('id_usr_usuario',Auth::user()->id)->get() )
            ->with('campanhasInAtivas', CmpConfig::with('frequencia')->where('b_ativo',0)->where('id_usr_usuario',Auth::user()->id)->get() );
	}

    public function criar() {
    
            $inputs = Input::all();
    
            $regras = [
                        'email' => 'required|email|unique:usr_usuarios',
                        'senha' => 'required|confirmed'
                    ];
    
            $validacao = Validator::make(array('email' => $inputs['email'],'senha' => $inputs['senha'],'senha_confirmation' => $inputs['senha_confirmation']), $regras);
             
            $usuario = new UsrUsuario(); 
     
            if ($validacao->fails())
                return Redirect::back()->with("mensagem_erro","Houve um problema ao criar o usuário. Favor verifique os campos obrigatórios. ".$validacao->messages());
    
            $usuario->email = Input::get('email');
            $usuario->senha = Hash::make( Input::get('senha') );
            $usuario->save();
            
            return Redirect::back();
            
        }
    }

    public function credencial() {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('senha')))) {
            return Redirect::to('/');
        } else {
            return Redirect::back();
        }
    }


}
