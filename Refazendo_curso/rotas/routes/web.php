<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/nome', function(){
    return "<h1>Robert Garcia</h1>";
});
Route::get('/nome/{nome}/{sobrenome}', function($nome, $sobrenome){
    return "<h1>Olá $nome $sobrenome</h1>";
});

//para aceitar somente inteiros, e regra para aceitar string Maiuscula e muniscula
Route::get('/seunomecomregra/{nome}/{n}', function($nome,$n){
    for ($i=1;$i<=$n;$i++){
        echo "<h1>Olá $nome $i</h1>";
    }
})->where('n','[0-9]+')->where('nome','[A-Za-z]+');
Route::get('/seunomesemregra/{nome?}', function($nome=null){
        echo "<h1>Olá $nome</h1>";
});

//agrupamento de rotas
Route::prefix('app')->group(function(){
    Route::get("/", function(){
        return "Pagina principal do app";
    });
    Route::get("/profile", function(){
        return "Pagina profile";
    });
    Route::get("/about", function(){
        return "Pagina about";
    });
    
});


//redirecionamento de rotas
Route::redirect('/aki', '/ola');

Route::get('/ola', function(){
    return "ola";
});
//redirecionamento de view (02 formas)
Route::get('/view1', function(){//indireto
    return view('hello');
});
Route::view('/view2', 'hello');// direto na route
//utilizando parametros na blade
Route::view('/view3', 'Alo',
['nome'=>'Iori','sobrenome'=>'Yagami']);

Route::get('/viewnome/{nome}/{sobrenome}', function($nome, $sobrenome){
    return view('Alo', 
    ['nome'=> $nome,
    'sobrenome'=>$sobrenome]);
});

Route::get('/rest/hello', function(){
    return "Hello (GET)";
});
Route::post('/rest/hello', function(){
    return "Hello (POST)";
});
Route::delete('/rest/hello', function(){
    return "Hello (delete)";
});
Route::put('/rest/hello', function(){
    return "Hello (put)";
});
Route::patch('/rest/hello', function(){
    return "Hello (patch)";
});
Route::options('/rest/hello', function(){
    return "Hello (options)";
});

