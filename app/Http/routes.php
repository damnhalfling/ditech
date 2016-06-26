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

Route::get('login', function () {
    return view('admin.login')->with('feedInsta','');
});

Route::post('usuario/cadastrar', 'UsuarioController@criar');
Route::post('usuario/verificar', 'UsuarioController@verificar');

Route::group(['middleware' => 'auth'], function() {

        Route::get('logout', function() {
            Auth::logout();
            return Redirect::to('login');
        });
        
        Route::get('/', 'UsuarioController@dashboard');

        Route::post('reserva/salvar', 'ReservaController@criar');

       //---------------- Rotas para  CRUD --------------------//

        Route::get('listar/{model}/{filtro?}/{condicao?}',	'Controller@listar' );
        Route::get('editar/{model}/{id}',	    			'Controller@editar' );
        Route::get('novo/{model}/',			    			'Controller@editar' );

        Route::post('salvar/{model}',       	'Controller@salvar' );
        Route::post('excluir/{model}', 			'Controller@excluir' );

});


