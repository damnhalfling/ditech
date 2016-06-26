<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Core extends Model {

   public function getColumns() {

		$saida = null;
		$conteudo = null;
		$colunas = DB::select('SHOW COLUMNS FROM '.$this->table);

		foreach ($colunas as $col) {

			if ( !preg_match("/senha/",$col->Field,$m) && !preg_match("/ed_at/",$col->Field,$m)  && !preg_match("/remember_token/",$col->Field,$m) ) {
				$t = explode("(",$col->Type);
				if( isset($t[1]) ) $op = explode(")",$t[1])[0];

				$conteudo['campo'] = $col->Field;
				$conteudo['null']  = $col->Null;
				$conteudo['tipo']  = $t[0];
				if( isset($op) ) $conteudo['opcoes'] = explode(",", str_replace("'","",$op) );

				$saida[] = $conteudo;
			}

		}

		return $saida;

    }

    public function salvar($values){

    	foreach ($values as $key => $value) {
			$this->$key = $value;
		}

		$this->save();

    }

    public function log($value){

        $myfile = fopen(base_path()."/doc/log", "w");
        fwrite($myfile, $value);
        fclose($myfile);  

    }
}
