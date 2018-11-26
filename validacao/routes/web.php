<?php

Route::get('/novocliente','ClienteControlador@create');
Route::get('/','ClienteControlador@index');
Route::post('/clientes','ClienteControlador@store');
