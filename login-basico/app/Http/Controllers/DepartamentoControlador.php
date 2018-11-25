<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;//para fazer a verificação da autenticação//pode ser feito em qlq lugar do codigo

class DepartamentoControlador extends Controller
{
    public function index() {
        echo "<h4> Lita de Categorias</h4>";
        echo "<ul>";
        echo "<li>Alimentos</li>";
        echo "<li>Eletrônicos</li>";
        echo "<li>Móveis</li>";
        echo "<li>Informática</li>";
        echo "</ul>";
        echo "<hr>";
        if(Auth::check()){// verificar se está ou não logado
            $user = Auth::user();//se estiver logado.. isso vai mostrar o usuário logado
            echo "<h4>Você está logado!</h4>";
            echo "<p>".$user->name."</p>";
            echo "<p>".$user->email."</p>";
            echo "<p>".$user->id."</p>";
        }else{
            echo "<h4>Você não está logado!</h4>";
        }

    }
}
