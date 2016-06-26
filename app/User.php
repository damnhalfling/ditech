<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{

    protected $table = 'usuarios';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'senha',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

}
