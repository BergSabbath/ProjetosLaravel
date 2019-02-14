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
        echo "Nome: $c->telefone </p>";
        // $end = Endereco::where('cliente_id', $c->id)->first(); 
        echo "Nome:" .$c->endereco->rua." <br>";
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
        echo "<p>ID do Cliente: $end->cliente_id <br>";
        echo "Nome: $end->rua <br>";
        echo "Numero: $end->numero <br>";
        echo "Bairro: $end->bairro <br>";
        echo "Cidade: $end->cidade <br>";
        echo "UF: $end->uf <br>";
        echo "CEP: $end->cep ";
        echo "<hr>";
    }

});

