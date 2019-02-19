<?php

use App\Cliente;
use App\Endereco;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/clientes', function(){

    $clientes = Cliente::all();
    foreach ($clientes as $c) {
        echo "<p>ID: $c->id <br>";
        echo "Nome: $c->nome <br>";
        echo "Telefone: $c->telefone </p>";
        // $end = Endereco::where('cliente_id', $c->id)->first(); 
        echo "Rua:" .$c->endereco->rua." <br>";
        echo "Numero:". $c->endereco->numero ."<br>";
        echo "Bairro:". $c->endereco->bairro ."<br>";
        echo "Cidade:". $c->endereco->cidade ."<br>";
        echo "UF:". $c->endereco->uf. "<br>";
        echo "CEP:". $c->endereco->cep." ";
        echo "<hr>";
    }
});

Route::get('enderecos', function(){
    
    $endereco = Endereco::all();
    foreach ($endereco as $end){
        echo "<p>ID do Cliente:". $end->cliente_id. "<br>";
        echo "Nome: " .$end->cliente->nome. "<br>";
        echo "Telefone: ". $end->cliente->telefone. "</p>"; 
        echo "Rua: " . $end->rua."<br>";
        echo "Numero: ". $end->numero. "<br>";
        echo "Bairro: ".  $end->bairro.  "<br>";
        echo "Cidade: " . $end->cidade.  "<br>";
        echo "UF: " . $end->uf."<br>";
        echo "CEP: " . $end->cep."<br> ";
        echo "<hr>";
    }

});

Route::get('/inserir', function(){

    $c = new Cliente();
    $c->nome = "kim kaphwan";
    $c->telefone = "1258-9654";
    $c->save();
    
    $e = new Endereco();
    $e->rua = "Piauí";
    $e->numero = 400;
    $e->bairro = "Centro";
    $e->cidade = "Brasilia";
    $e->uf = "AC";
    $e->cep = "87415-985";
    // $e->cliente_id = $c->id;
    $c->endereco()->save($e);
    
    
    $c = new Cliente();
    $c->nome = "Billy Kane";
    $c->telefone = "1258-9654";
    $c->save();
    
    $e = new Endereco();
    $e->rua = "Piauí";
    $e->numero = 400;
    $e->bairro = "Centro";
    $e->cidade = "Brasilia";
    $e->uf = "AC";
    $e->cep = "87415-985";
    // $e->cliente_id = $c->id;
    $c->endereco()->save($e);

});

Route::get('/clientes/json', function(){

    // $clientes = Cliente::all(); //lazy loader
    $clientes = Cliente::with(['endereco'])->get(); //Eager loading
    return $clientes->toJson();

});

Route::get('/enderecos/json', function(){

    // $clientes = Endereco::all();
    $clientes = Endereco::with(['cliente'])->get();
    return $clientes->toJson();

});