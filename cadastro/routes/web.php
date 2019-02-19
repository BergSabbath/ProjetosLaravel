<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/categorias', 'CategoriaControlador@index');
Route::get('/categorias/novo', 'CategoriaControlador@create');
Route::post('/categorias', 'CategoriaControlador@store');
Route::get('/categorias/editar/{id}','CategoriaControlador@edit');
Route::post('/categorias/{id}','CategoriaControlador@update');
Route::get('/categorias/apagar/{id}','CategoriaControlador@destroy');


Route::get('/produtos', 'ProdutoControlador@index');
Route::get('/produtos/novo', 'ProdutoControlador@create');
Route::post('/produtos', 'ProdutoControlador@store');
Route::get('/produtos/editar/{id}', 'ProdutoControlador@edit');
Route::post('/produtos/{id}', 'ProdutoControlador@update');
Route::get('/produtos/apagar/{id}', 'ProdutoControlador@destroy');