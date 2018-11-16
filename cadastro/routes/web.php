<?php

Route::get('/', function () {
    return view('index');
});
//a diferença de passar pelo controlador e não mandar direto para view
//é que no controlador possui outras funçoes mais completas (index,create, edit, store, show, update, destroy)


Route::get('/categorias','ControladorCategoria@index');
Route::get('/categorias/novo','ControladorCategoria@create');
Route::post('/categorias','ControladorCategoria@store');
Route::get('/categorias/apagar/{id}','ControladorCategoria@destroy');
Route::get('/categorias/editar/{id}','ControladorCategoria@edit');
Route::post('/categorias/{id}','ControladorCategoria@update');

Route::get('/produtos','ControladorProduto@index');
Route::get('/produtos/novo','ControladorProduto@create');
Route::post('/produtos','ControladorProduto@store');