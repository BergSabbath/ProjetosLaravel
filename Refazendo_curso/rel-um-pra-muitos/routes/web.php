<?php

use App\Categoria;
use App\Produto;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    $cats = Categoria::all();

    if (count($cats) > 0){
        foreach ($cats as $c) {
            echo "<p>".$c->id ."-"." Categoria: ". $c->nome . "</p>";
        }
    }else {
        echo "<p>Voce não possui categorias</p>";
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if (isset($prods) > 0) {
        echo "<table>";
        echo "<thead><tr><td>id</td><td>nome</td><td>preco</td><td>estoque</td><td>categoria_id</tr></thead>";
        foreach ($prods as $p) {
            echo "<tr>";
            echo "<td>".$p->id. "</td>";
            echo "<td>".$p->nome."</td>";
            echo "<td>".$p->preco."</td>";
            echo "<td>".$p->estoque."</td>";
            echo "<td>".$p->categoria->nome. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "<p>Voce não possui produtos</p>";
    }
});


Route::get('/categoriasprodutos', function () {
    $cats = Categoria::all();

    if (count($cats) > 0){
        foreach ($cats as $c) {
            echo "<p>".$c->id ."-"." Categoria: ". $c->nome . "</p>";
            $produtos = $c->produtos;
            if (count($produtos) > 0) {
                echo "<ul>";
                foreach ($produtos as $p){
                    echo "<li>$p->nome</li>";
                }
                echo "</ul>";
            }
        }
    }else {
        echo "<p>Voce não possui categorias</p>";
    }
});

Route::get('categorias/json', function() {
    // dessa forma ocorre lazyloading..
    //não carrega os produtos
    // $cats = Categoria::all();
    // return $cats->toJson();
    
    //dessa forma carrega os produtos
    //eagerloading
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();

});

Route::get('/adicionarproduto', function() {
    // $p = new Produto();
    // $p->nome = "Meu Novo Produto";
    // $p->estoque = 31;
    // $p->preco = 100;
    // $p->categoria_id = 1;
    // $p->save();
    // return $p->toJson();

$cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = "Meu Novo Produto";
    $p->estoque = 31;
    $p->preco = 100;
    $p->categoria()->associate($cat);// associa o produto a categoria
    $p->save();
    return $p->toJson();
});


Route::get('/removercategoriadoproduto', function() {

    $p = Produto::find(10);
    if (isset($p)) {
        $p->categoria()->dissociate(); //remove a categoria do produto
        $p->save();
        return $p->toJson();
    }
    return "";
});


Route::get('/adicionar/produto/{cat}', function($cat) {
    $cat = Categoria::with('produtos')->find($cat);// retorna a categoria selecionada com os seus produtos
    
    $p = new Produto();
    $p->nome = "de novo produto";
    $p->estoque = 32;
    $p->preco = 121;

    if (isset($cat)) {
        $cat->produtos()->save($p);// ja salva o produto direto na categoria
    }
    $cat->load('produtos');// para carregar todos os produtos apos a mudança/adicão do produto novo
    return $cat->toJson();
    
});