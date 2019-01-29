<?php


Route::get('/', function () {
    return view('filho');
});
Route::get('/', function () {
    return view('pagina');
});

Route::get('/primeiraview', function(){
    return view('minhaview');
});

Route::get('/ola', function(){
    return view('minhaview')
            ->with('nome', 'joão')
            ->with('sobrenome', 'silva');
});

Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
    /* 1ª forma
    return view('minhaview')
            ->with('nome', $nome)
            ->with('sobrenome', $sobrenome);*/

    /* 2ª forma
    $parametros = ['nome'=>$nome, 'sobrenome' =>$sobrenome];
        return view('minhaview', $parametros);*/
    /* 3ª forma
        return view('minhaview', ['nome'=>$nome, 'sobrenome' =>$sobrenome] ); */
    /* 4ª forma*/
        return view('minhaview', compact('nome', 'sobrenome'));
});

// verificar se a view existe
Route::get('/email/{email}', function($email){
    if (View::exists('email')){
        return view('email', compact('email'));
    }else{
        return view('erro');
    }
});

Route::get('/produtos','ProdutoControlador@listar');

