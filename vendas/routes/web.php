<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/categorias', function(){

    $cats = DB::table('categorias')->get();
    foreach($cats as $cat){
        echo "id: ". $cat->id ."; ";
        echo "nome: ". $cat->nome ."<br>";
    }
    echo "<hr>";
    $nome = DB::table('categorias')->pluck('nome');
    foreach($nome as $nome){
        echo "$nome <br>";
    }

    echo "<hr>";
///////////////////////////////////////////////
    $cats = DB::table('categorias')->where('id',1)->get();//irá retornar so 1 elemento
    //equivale ao comando MYSQL:  select * from categorias where id=1 
    foreach($cats as $cat){
        echo "id: ". $cat->id ."; ";
        echo "nome: ". $cat->nome ."<br>";
        //outra forma --
        // echo "id: ". $cat[0]->id ."; ";
        // echo "nome: ". $cat[0]->nome ."<br>";
    }

echo "<hr>";
////////////////////////////////////////////////
//sabendo que aki retornará apenas um elemento não será necessário um foreach  
        $cat = DB::table('categorias')->where('id',1)->first();//irá retornar so 1 elemento
        echo "id: ". $cat->id ."; ";
        echo "nome: ". $cat->nome ."<br>";

echo "<hr>";

    echo "<p>retorna um array utilizando like</p>";
    $cats = DB::table('categorias')->where('nome','like','%o%')->get();
    foreach($cats as $cat){
        echo "id: ". $cat->id ."; ";
        echo "nome: ". $cat->nome ."<br>";
    }

echo "<hr>";

    echo "<p>Sentenças Lógicas</p>";
    $cats = DB::table('categorias')->where('id',1)->orWhere('id',3)->get();
    foreach($cats as $cat){
        echo "id: ". $cat->id ."; ";
        echo "nome: ". $cat->nome ."<br>";
    }
echo "<hr>";

    echo "<p>Intervalos</p>";
    $cats = DB::table('categorias')->whereBetween('id',[1,2])->get();//elementos que estão dentro desse intervalo
    foreach($cats as $cat){
        echo "id: ".$cat->id."; ";
        echo "nome: ".$cat->nome."<br>";
    }

echo "<hr>";

    echo "<p>Intervalos</p>";
    $cats = DB::table('categorias')->whereNotBetween('id',[1,2])->get();//elementos que não estão dentro desse intervalo
    foreach($cats as $cat){
        echo "id: ". $cat->id . "; ";
        echo "nome: " . $cat->nome . "<br>";
    }
echo "<hr>";

    echo "<p>Conjuntos</p>"; 
    $cats = DB::table('categorias')->whereIn('id',[1,3,4])->get();//elementos que estão nestes intervalos
    foreach($cats as $cat){
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>"; 
    }

echo "<hr>";
    echo "<p>Conjuntos</p>"; 
    $cats = DB::table('categorias')->whereNotIn('id',[1,3])->get();//elementos que não estão nestes intervalos
    foreach($cats as $cat){
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

echo "<hr>";

    echo "<p>Sentenças Lógicas</p>";
    $cats = DB::table('categorias')->where([//busca com 2 ou mais condições
        ['id',1],
        ['nome','Roupas']
    ])->get();
    foreach($cats as $cat){
        echo "id: ". $cat->id . "; ";
        echo "nome " . $cat->nome . "<br>";
    }

echo "<hr>";
    echo "<p>ordenando por nome</p>";
    $cats = DB::table('categorias')->orderBy('nome')->get();//ordenar por nome 
    foreach($cats as $cat){
        echo "id:".$cat->id. "; ";
        echo "nome: ". $cat->nome."<br>";
    }
echo "<hr>";
    echo "<p>ordenar por nome decrescente</p>";
    $cats = DB::table('categorias')->orderBy('nome','desc')->get();
    foreach($cats as $cat){
        echo "id:".$cat->id. "; ";
        echo "nome: ". $cat->nome."<br>"; 
    }
});

// Route::get('/novascategorias', function(){//inserindo nova categoria
//     DB::table('categorias')->insert(
//         ['nome'=>'Alimentos'],
//        
//     );
// });
Route::get('/novascategorias', function(){//inserindo novas categorias
    DB::table('categorias')->insert([
        ['nome'=>'Cama mesa e banho'],
        ['nome'=>'Informatica'],
        ['nome'=>'Cozinha']
    ]);
});

Route::get('/novascategorias', function(){
    $id = DB::table('categorias')->insertGetId(//insere um dado e retorna o id utilizado para essa categoria no DB
        ['nome'=>'Carros']
    );
    echo "Novo ID = $id <br>";
});

Route::get('/atualizandocategorias', function(){
    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p>Antes da Atualização</p>";
    echo "id: " . $cat->id . "; ";
    echo "nome: ". $cat->nome . "<br>";

    DB::table('categorias')->where('id',1)
    ->update(['nome'=>'Roupas Infantis']);//para atualiza mais basta ir adicionando virgulas

    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p>Depois da atualização</p>";
    echo "id: ". $cat->id . "; ";
    echo "nome: ". $cat->nome ."<br>";
});
Route::get('/removendocategorias', function(){
    echo "<p>Antes da remoção</p>";
    
    $cats = DB::table('categorias')->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }
    echo "<hr>";

    DB::table('categorias')->where('id',1)->delete();//não precisa de parametro para remoção
//pode ser o whereNotIn('id',[1,2,3,4,6]) - para apagar os que não estão no intervalo citado
    echo "<p>Depois da atualização</p>";
    $cats = DB::table('categorias')->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }
});

