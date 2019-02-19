<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos', 'ProdutoControlador@index')
        /*->middleware('auth')//proteção a partir da rota*/
        ->name('produtos');

Route::get('/departamentos', 'DepartamentoControlador@index');

Route::get('/usuario', function () {
    return view('usuario');
});
