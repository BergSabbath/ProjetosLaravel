<?php

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacoes;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedor_projetos', function () {
    
    $devs = Desenvolvedor::with('projetos')->get();

    foreach ($devs as $key => $dev) {
        echo $dev->id. " - ";
        echo "Desenvolvedor: ".$dev->nome."<br>";
        echo "Cargo: ".$dev->cargo."<br>";
        if (count($dev->projetos) > 0 ){
        echo "Projetos:";
        echo "<ul>";
            foreach ($dev->projetos as $key => $p) {
                echo "<li>$p->nome | ";
                echo "Horas do projeto: $p->estimativa_horas | ";
                echo "Horas semanais: ".$p->pivot->horas_semanais."</li>";
            }
        echo "</ul>";
        }
        echo "<hr>";
    }

    // return $devs->toJson();
});

Route::get('/projeto_desenvolvedores', function(){
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach ($projetos as $key => $proj) {
        echo "Projeto $proj->id: <br> "; 
        echo "Nome: ".$proj->nome. "<br>"; 
        echo "Horas do projeto: ". $proj->estimativa_horas. "<br>"; 

        if(count($proj->desenvolvedores) > 0){
            echo "<ul>";
            foreach ($proj->desenvolvedores as $key => $p) {
                echo "<li>Nome: $p->nome | Cargo: $p->cargo | Horas por semana: ".$p->pivot->horas_semanais."</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }

});