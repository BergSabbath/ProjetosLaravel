<?php

use App\Cliente;
use App\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach($clientes as $c){
        echo "(".$c->id. " ";
        echo $c->nome. " ";
        echo $c->telefone. ")";
        echo "<br>";
        //$e = Endereco::where('cliente_id', $c->id)->first();
        echo  " rua: ". $c->endereco->rua;
        echo " numero: ". $c->endereco->numero;
        echo " bairro: ". $c->endereco->bairro;
        echo " cidade: ". $c->endereco->cidade;
        echo " UF: ". $c->endereco->uf;
        echo " cep: ". $c->endereco->cep;
        echo "<hr>";
    }
});

Route::get('/enderecos', function (){
    $enderecos = Endereco::all();
    foreach($enderecos as $e){
        echo " Nome ". $e->Cliente->nome;
        echo " Telefone ". $e->Cliente->telefone;
        echo " id do cliente: ". $e->cliente_id;
        echo  " rua: ". $e->rua;
        echo " numero: ". $e->numero;
        echo " bairro: ". $e->bairro;
        echo " cidade: ". $e->cidade;
        echo " UF: ". $e->uf;
        echo " cep: ". $e->cep;
        echo "<hr>";
    }
});

Route::get('/inserir', function(){
    
    $c = new Cliente();
    $c->nome = "Iori Yagami";
    $c->telefone = "3211-4565";
    $c->save();
    
    $e = new Endereco();
    $e->rua = "Av. do Estado";
    $e->numero = 400;
    $e->bairro = "Centro";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "01103-320";
    
    $c->endereco()->save($e);
    
    $c = new Cliente();
    $c->nome = "Iori Yagami";
    $c->telefone = "3211-4565";
    $c->save();
    
    $e = new Endereco();
    $e->rua = "Av. do Brasil";
    $e->numero = 1400;
    $e->bairro = "Jardim ";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "02453-320";
    
    $c->Endereco()->save($e);
});

Route::get('/clientes/json', function()
{
    //$clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});

Route::get('/enderecos/json', function()
{
    //$clientes = Cliente::all();
    $end = Endereco::with(['cliente'])->get();
    return $end->toJson();
});