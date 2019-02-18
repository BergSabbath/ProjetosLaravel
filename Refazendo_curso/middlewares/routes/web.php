<?php

// use App\Http\Middleware\PrimeiroMiddleware;

//1ª forma de chamar o middleware
// Route::get('/usuarios', 'UsuarioControlador@index')
// ->middleware(PrimeiroMiddleware::class);


//2ª forma - middleware nomeado no kernel/routeMiddleware
// Route::get('/usuarios', 'UsuarioControlador@index')
// ->middleware('primeiro');


//3ª forma - chamar o middleware pelo controlador
// Route::get('/usuarios', 'UsuarioControlador@index');

//passando dois middlewares
Route::get('/usuarios', 'UsuarioControlador@index')->middleware('primeiro','segundo');

//passando parametros(nome = joão, idade = 31)  para o middleware
Route::get('/terceiro', function(){
        return 'passou pelo terceiro middleware';
})->middleware('terceiro:joão, 31');

