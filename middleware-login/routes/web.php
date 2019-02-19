<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/negado', function(){
    return "Prezado usuario, voce precisa estas logado para acessar produtos";
})->name('negado');

    Route::get('/negadologin', function(){
    return "Prezado usuario, voce precisa ser administrador para acessar produtos";
})->name('negadologin');

Route::post('/login', function(Request $request){
    $login_ok = false;
    $admin = false;
    switch($request->input('user')){
        case 'joao':
            $login_ok = $request->input('password') === "senhajoao";
            $admin = true;
            break;
        case 'marcos':
            $login_ok = $request->input('password') === "senhamarcos";
            break;
        case 'default';
            $login_ok = false;
    }
    if($login_ok){
        $login = [ 'user' => $request->input('user'), 'admin' => $admin];
        $request->session()->put('login', $login);
        return response("Login_ok", 200);
    }else{
        $request->session()->flush();
        return response("Erro no Login", 404);
    }
});

Route::get('/logout', function(Request $request){

    $request->session()->flush();
    return response("Deslogado com sucesso", 200);
});