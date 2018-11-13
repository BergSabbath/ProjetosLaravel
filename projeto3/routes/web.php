<?php

Route::get('/', function () {
    return view('pagina');
});
Route::get('/primeiraview',function() {
    return view('minhaview')
        ->with('nome','Robert')
        ->with('sobrenome','Garcia');
});
Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
    // return view('minhaview')
    // ->with('nome',$nome)
    // ->with('sobrenome',$sobrenome);

    // $parametros = ['nome'=>$nome, 'sobrenome'=>$sobrenome]; //array associativo
    // return view('minhaview', $parametros);
    
    // return view('minhaview',['nome'=>$nome, 'sobrenome'=>$sobrenome]);// o array pode vir direto sem precisar da variavel
    return view('minhaview', compact('nome','sobrenome'));//compact- função do PHP, passa as variáveis e a
    //função ja monta direto um array associativo
});
    // saber se a view existe

Route::get('/email/{email}', function($email){
        if(View::exists('email'))//funçao estatica da classe view...para saber se a função existe.
            return view('email', compact('email'));
        else
            return view('erro');
});
Route::get('/produtos', 'ProdutoControlador@listar');

Route::get('/secaoprodutos/{palavra}',
        'ProdutoControlador@secaoprodutos');

Route::get('/mostraropcoes', 'ProdutoControlador@mostraropcoes');

Route::get('/opcoes/{opcoes}', 'ProdutoControlador@opcoes');

Route::get('/loop/for/{n}', 'ProdutoControlador@loopfor');

Route::get('/loop/foreach', 'ProdutoControlador@loopforeach');

