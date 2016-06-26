<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('admin.login')->with('feedInsta','');
});

Route::get('social/login',  'SocialController@validaLogin');
Route::post('usuario/credencial', 'UsuarioController@credencial');

Route::group(['middleware' => 'auth'], function() {

        Route::get('logout', function() {
            Auth::logout();
            return Redirect::to('login');
        });

       //---------------- Rotas para  CRUD --------------------//

        Route::get('listar/{model}/{filtro?}/{condicao?}',	'Core@listar' );
        Route::get('editar/{model}/{id}',	    			'Core@editar' );
        Route::get('novo/{model}/',			    			'Core@editar' );

        Route::post('salvar/{model}',       	'Core@salvar' );
        Route::post('salvar/{model}/imagem',    'Core@addImagem' );
        Route::post('excluir/{model}', 			'Core@excluir' );

});


