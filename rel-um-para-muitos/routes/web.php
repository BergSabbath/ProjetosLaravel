<?php

use App\Produto;
use App\Categoria;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function() {
    
    $cats = Categoria::all();

        foreach($cats as $c){
            echo "<p>".$c->id." - ".$c->nome."</p>";
            $produtos = $c->produto;

                echo "<ul>";
                foreach($produtos as $p){
                    echo "<li>".$p->nome."</li>";
                }
                echo "</ul>";
        }
});

Route::get('/produtos', function(){

    $produtos = Produto::all();
    echo "<table>";
    echo "<thead><tr><td>id</td><td>nome</td><td>preco</td><td>estoque</td><td>categoria</td></tr></thead>";

    foreach($produtos as $prod){
        echo "<tr>";
        echo "<td>".$prod->id."</td>";
        echo "<td>".$prod->nome."</td>";
        echo "<td>".$prod->preco."</td>";
        echo "<td>".$prod->estoque."</td>";
        echo "<td>".$prod->categoria->nome."</td>";
        echo "</tr>";
    }
    echo "</table>";
});

Route::get('/categoriasprodutos/json', function(){

    $categorias = Categoria::all();
    // $categorias = Categoria::with('produto')->get();
    return $categorias->toJson();
    // }

});
Route::get('/categorias/json', function(){

    // $categorias = Categoria::all();
    $categorias = Categoria::with('produto')->get();
    return $categorias->toJson();
    // }

});

Route::get('/adicionarproduto', function(){
    $cat = Categoria::find(3);
    $p = new Produto();
    //fazendo associação
    $p->categoria()->associate($cat);
    //$p->categoria_id = 3; 
    $p->nome = "Contra";
    $p->preco = 100;
    $p->estoque = 10;
    $p->save();
    return $p->toJson();

});

Route::get('/desassociacaoproduto', function(){
    //fazendo a desassociação
    $p = Produto::find(9);
    if(isset($p)){
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
    return "produto nao encontrado";
});

Route::get('/adicionarproduto/{cat}', function($catid){
    $cat = Categoria::with('produto')->find($catid);
//salvar o produto chamando a categoria pelo navegador e fazendo a associação da categoria chamada
    $p = new Produto();
    $p->nome = "sapato";
    $p->preco = 30;
    $p->estoque = 10;

    if(isset($cat)){
        $cat->produto()->save($p);
    }
    $cat->load('produto');//serve para carregar novamente a Categoria
                        //ja atualizando os registros com o produto novo salvo.
                        //se não fizer isso, o $cat carregado será o antes da atualização
    return $cat->toJson();
});
