<?php

use App\Categoria;

Route::get('/', function () {
    $cats = Categoria::all();
    foreach ($cats as $cat) {
        echo "id: $cat->id ";
        echo "Categoria: $cat->nome <br>"; 
    }
});

Route::get('/inserir/{nome}', function($nome){
    $cat = new Categoria(); 
    $cat->nome = $nome;
    $cat->save();
    echo "categoria $nome inserida com sucesso!!";
    return redirect('/');
});
Route::get('/categoria/{id}', function($id){
    $cat = Categoria::find($id);
    //findOrFail
        if(isset($cat)){
            echo "id: $cat->id ";
            echo "Categoria: $cat->nome <br>"; 
        }else{
            echo "Id: $id não foi encontrado";
        }
});

Route::get('/atualizar/{id}/{nome}', function($id, $nome){
    
    $cat = Categoria::find($id);
        if(isset($cat)){
            $cat->nome = $nome; 
            $cat->save();
            return redirect('/');
        }else{
            echo "Id: $id não foi encontrado";
        }     
});
Route::get('/remover/{id}', function($id){

        $cat = Categoria::find($id);
            if(isset($cat)){
                $cat->delete(); 
                return redirect('/');
            }else{
                echo "Id: $id não foi encontrado";
            } 
});

Route::get('/categoriapornome/{nome}', function($nome){
    $cats = Categoria::where('nome',$nome)->get();
            foreach ($cats as $cat) {
                echo "$cat->id ";
                echo "$cat->nome <br>";
            }
});
//maior ou igual 
Route::get('/categoriaidmaiorque/{id}', function($id){
    $cats = Categoria::where('id','>=',$id)->get();
            foreach ($cats as $cat) {
                echo "$cat->id ";
                echo "$cat->nome <br>";
            }
    $count = Categoria::where('id', '>=', $id)->count();//cont o numero solicitado
            echo "<h3>Count: $count</h3>";
    $max = Categoria::where('id', '>=', $id)->max('id');//mostra o id maximo
            echo "<h3>num max: $max</h3>";
});
//conjunto de dados
Route::get('/ids', function(){
    $cats = Categoria::find([2,3,5]);
            foreach ($cats as $cat) {
                echo "$cat->id ";
                echo "$cat->nome <br>";
            }
});
//buscando registro com itens apagados
Route::get('/todas', function () {
    $cats = Categoria::withTrashed()->get();
    foreach ($cats as $cat) {
        echo "id: $cat->id ";
        echo "Categoria: $cat->nome"; 
        if ($cat->trashed()){
            echo "(apagado)";
        }
        echo "<br>";
    }
});
//busando apenas um registro apagado
Route::get('/ver/{id}', function($id){
    $cat = Categoria::withTrashed()->find($id);
    // $cat = Categoria::withTrashed()->where('id',$id)->get()->first();

            echo "id: $cat->id ";
            echo "categoria: $cat->nome (apagada)<br>";
            
});

//buscando registro somente itens apagados
Route::get('/somenteapagados', function () {
    $cats = Categoria::onlyTrashed()->get();
    foreach ($cats as $cat) {
        echo "id: $cat->id ";
        echo "Categoria: $cat->nome"; 
        if ($cat->trashed()){
            echo "(apagado)";
        }
        echo "<br>";
    }
});

Route::get('/recuperar/{id}', function($id){
    $cat = Categoria::withTrashed()->find($id);
        if(isset($cat)){
            $cat->restore();    
            echo "id: $cat->id ";
            echo "categoria: $cat->nome restaurada<br>";
        }            
});//forceDelete() apaga e não é possivel restaurar 
