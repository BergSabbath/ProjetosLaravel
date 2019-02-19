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
            foreach ($proj->desenvolvedores as $key => $d) {
                echo "<li>Nome: $d->nome | Cargo: $d->cargo | Horas por semana: ".$d->pivot->horas_semanais."</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }

});

Route::get('/alocar', function() {//alocar os desenvolvedores

    $proj = Projeto::find(4);

    if(isset($proj)){

        // $proj->desenvolvedores()->attach(1, ['horas_semanais' => 20]);//adicionando um
        $proj->desenvolvedores()->attach([
            2 => ['horas_semanais' => 30],
            3 => ['horas_semanais' => 40], 
        ]);//adicionando varios
    }
});

Route::get('/desalocar', function() {// desalocar os desenvolvedores

    $proj = Projeto::find(4);
    if(isset($proj)){
        $proj->desenvolvedores()->detach([1,2,3]);//varios ao msm tempo
        $proj->desenvolvedores()->detach(1);//somente um
    }

});