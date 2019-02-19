<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/nome','MeuControlador@getNome');
Route::get('/idade/{idade}','MeuControlador@getIdade');
Route::get('/multiplicar/{n1}/{n2}','MeuControlador@multiplicar');
Route::get('/posicao/{n}','MeuControlador@posicao')->where('n','[0-9]+');


Route::resource('cliente','ClienteControlador');
