<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Illuminate\Support\Str;
Use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use View;
use Auth;

class Controller extends BaseController {

    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getArrayProperties($arr, $class, $relations = null) {
		
		$result = Array();

		if( sizeof($arr) > 0 ) {
		
			foreach ($arr as $key => $value) {

				if ( !is_array($value) ) {

					if( $key != "updated_at" && $key != "deleted_at" && $key != "remember_token" && $key != "created_at" && $key != "senha" && !preg_match("/id_*/",$key)) {
						if($key == "id") $result[$key."_".$class] = $value;
						else $result[$key."_".$class] = $value;
					}  else if( $key == "id" && $class == "usuario" ) {
						$result[$key."_".$class] = $value;
					}

				}

			}

		}

		return $result;

	}

	public function listar($class, $filtro = null, $condicao = null) {

		$model = 'App\\'.Str::studly($class);
		$colunas = null;
		$usuatios = null;
		$objs = null;
		$inputs = Input::all();
		$isOrdem = false;

		$obj = $model::first();
		if ($obj) $colunas = $obj->getColumns();

		if (sizeof($colunas) > 0) {

			foreach ($colunas as $coluna){

				if ($coluna['campo'] == 'ordem') $isOrdem = true;
			}
        
        	if($filtro) {

                if (!preg_match("/b_/",$filtro)) $filtro = "id_".$filtro;

        		if($condicao) $objs = $model::where($filtro,$condicao)->orderBy('created_at','desc')->paginate(50);
        		else $objs = $model::where($filtro,1)->orderBy('created_at','desc')->paginate(50);

        	} else {
                if ($class != "user")
        		    $objs = $model::orderBy('created_at','desc')->paginate(50);
                else 
        	        $objs = $model::orderBy('created_at','desc')->paginate(50);
            }

	    }

		return View::make('admin.crud.lista')
				->with('nome', $model)
					->with('class', $class)
					->with('colunas', $colunas)
					->with('usuatios', $usuatios)
					->with('obj', $objs);

	}

	public function editar($class, $id = null) {

		$model = 'App\\'.Str::studly($class);
		$multipart = false;
		$relacoes = null;
		$relacaoSelecionada = null;
		$result = null;
		$imagens = null;

		if ($id) {
			$obj = $model::find($id);
                   $imagens = GbImagem::get();
                   $multipart = true;

			return View::make('admin.crud.form')
						->with('relacoes', $relacoes)
						->with('class', $class)
						->with('multipart', $multipart)
						->with('bancoImagens', $imagens)
						->with('relacionados', $result)
						->with('nome', $model)
						->with('colunas', $obj->getColumns())
						->with('obj', $obj);
		} else {

			$obj = new $model();

			foreach ($obj->getColumns() as $row) {
				if ( $row['campo'] == 'id_gb_imagem' ) {
                                        $imagens = GbImagem::get();
                                        $multipart = true;
                                }
			}

			return View::make('admin.crud.add')
						->with('class', 	$class)
						->with('multipart', $multipart)
						->with('nome', 		$model)
						->with('colunas', 	$obj->getColumns())
			            ->with('bancoImagens', $imagens)			
						->with('relacoes', 	$relacoes)
						->with('imagens', 	$imagens)
						->with('relacionados', $result)
						->with('obj', $obj);

		}

	}

	public function persistir($class) {

		$model = 'App\\'.Str::studly($class);
		$menssagem = null;

		$inputs = Input::all();

		if (sizeof($inputs) > 0){

			if ($inputs['id'] == 0) $obj = new $model();
			else $obj = $model::find($inputs['id']);

			try {

				foreach ($obj->getColumns() as $key => $value){

					if ( !preg_match("/id_/i", $value['campo']) && preg_match("/b_/i", $value['campo']) ){

						if (isset($inputs[$value['campo']])) $obj->$value['campo'] = 1;
						else $obj->$value['campo'] = 0;

					} 

				}

				foreach ($inputs as $key => $value){

					if ( !preg_match("/dt_/i", $key) && !preg_match("/_token/i", $key) && !preg_match("/b_/i", $key) && $key != 'id' && $key != 'id_gb_imagem' && $key != 'imagem' && $key != 'imagem_mobile' && $key != "_wysihtml5_mode" ) {

						$obj->$key  = $value;

					} else if ( preg_match("/dt_/i", $key) ) {
			
						$date = DateTime::createFromFormat('d/m/Y', $value);
						$usableDate = $date->format('Y-m-d H:i:s');

						$obj->$key  = $usableDate;

                    }

				}

				$obj->save();

				$menssagem['obj'] = $obj;
				$menssagem['tipo'] = "success";
				$menssagem['msg']  = "Dados salvos com sucesso";


			} catch (Exception $e) {
				
				$menssagem['tipo'] = "danger";
				$menssagem['msg']  = "Houve um problema na criação do cadastro <br/>".$e->getMessage();

			}

		    return $menssagem;

		}

	}

	public function salvar($class) {

		self::persistir($class);

		return Redirect::to('/listar/'.$class);

	}

	public function excluir($class) {

		$model = 'App\\'.Str::studly($class);
		$msg  = "Houve um problema ao excluir a o item";
	
		$id = Input::get("id");

		if ($id != 0) {
			
			$model::destroy($id);
			$msg  = "Item excluido com sucesso";

		}

	    return Redirect::back()->with('msg',$msg);

	}
    
}
