<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clientes', 'ClienteControlador@index');
Route::get('/novocliente', 'ClienteControlador@create');
Route::post('/clientes', 'ClienteControlador@store');