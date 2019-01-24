<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function getNome(){
        return "João da Silva";
    }

    public function getIdade($idade){
        return "$idade anos";
    }
    
    public function multiplicar($n1, $n2){
        // $n3 = $n1 * $n2;
        return "a multiplicação de $n1 x $n2 é igual a ".$n1 * $n2. " anos";
    }
    
    public function posicao($n){
        $v = ['Clark', 'Ralf','Leona','Heiden'];   
        if($n > 0 && $n <= count($v)){
            return $v[--$n];
        }else{
            return "não existem pessoas";
        }
    }
}
