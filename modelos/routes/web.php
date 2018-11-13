<?php

use App\Categoria;

Route::get('/', function () {
    $categorias = Categoria::all();//listar as categorias inseridas//todos os registros da tabela
    //para acessar cada um deles. utiliza-se o foreach
    foreach($categorias as $c){
        echo "id: ". $c->id. ", ";
        echo "nome: " .$c->nome. "<br>";

    }
});

Route::get('/inserir/{nome}', function($nome){
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();//para salvar a nova categoria 
    return redirect('/'); //este comando redireciona diretamente para o comando raiz.. apos a inserção da nova categoria
});

Route::get('/categoria/{id}', function($id){
    $cat = Categoria::find($id);//findOrfail.. retorna o erro de 'pagina não encontrada'
    if (isset($cat)){
        echo "id: ".$cat->id. "; ";
        echo "nome: ".$cat->nome. "<br>";
    }else{
        echo "<h1>Categoria não encontrada</h1>";
    }
});
Route::get('/atualizar/{id}/{nome}', function($id, $nome){
    $cat = Categoria::find($id);// procura o id solicitado
    if(isset($cat)){//função para verificar se existe o id solicitado
        $cat->nome = $nome;
        $cat->save();//para salvar na base de dados
        return redirect('/');
    }else{
        echo "<h1>Categoria não encontrada</h1>";
    }
});
Route::get('/remover/{id}', function($id){
    $cat = Categoria::find($id);
    if(isset($cat)){
        $cat->delete();//apagar do banco de dados
        return redirect('/');
    }else{
        echo "<h1>Categoria não encontrada</h1>";
    }
});

Route::get('/categoriapornome/{nome}', function($nome){
    $categorias = Categoria::where('nome',$nome)->get();//busca utulizando where
    foreach($categorias as $c){
        echo "id: ".$c->id. "; ";
        echo "nome: ".$c->nome. "<br>"; 
    }
});

Route::get('/categoriaidmaiorque/{id}', function($id){
    $categorias = Categoria::where('id','>=',$id)->get();//busca utilizando where e utilizando relaçao logica
    foreach($categorias as $c){
        echo "id: ".$c->id. "; ";
        echo "nome: ".$c->nome. "<br>";
    }
    $count = Categoria::where('id','>=',$id)->count();//para contar os itens encontrados
    echo "<h1>Cont: " .$count. "</h1>";
    $max = Categoria::where('id','>=',$id)->max('id');
    echo "<h1>Max: " .$max."</h1>";
});
Route::get('/ids123', function(){
    // $categorias = Categoria::whereIn('id',[1,2,3])->get();//busca id 1,2,3 utilizando whereIn
    // $categorias = Categoria::where('id',1)->orWhere('id',2)->orWhere('id',3)->get();//busca id 1,2,3 utilizando orwhere
    $categorias = Categoria::find([1,2,3]);//busca id 1,2,3 utilizando find
    foreach($categorias as $c){
        echo "id: ".$c->id. "; ";
        echo "nome: ".$c->nome. "<br>";
    }
});

Route::get('/todas', function(){//mostra todas a categorias, ate mesmo as apagadas 
    $categorias = Categoria::withTrashed()->get();
    foreach($categorias as $c){
        echo "id: ".$c->id. "; ";
        echo "nome: ".$c->nome ;
        if ($c->trashed()){
            echo " (apagado)<br>";
        }else{
            echo "<br>";
        }
    }
});

Route::get('/ver/{id}', function($id){//para ver o item.. msm tendo sido apagado
    $cat = Categoria::withTrashed()->find($id);
    //$cat = Categoria::withTrashed()->where('id',$id)->get()->first();
    if(isset($cat)){
        echo "id: ".$cat->id. "; ";
        echo "nome: ".$cat->nome; 
        if ($cat->trashed())
            echo " (apagado)<br>";
    }else{
        echo "<h1>Categoria não encontrada</h1>";
    }
});

Route::get('/apagadas', function(){
    $categorias = Categoria::onlyTrashed()->get();//somente mostras as apagadas
    foreach($categorias as $c){
        echo "id: ".$c->id. "; ";
        echo "nome: ".$c->nome ;
        if ($c->trashed()){
            echo " (apagado)<br>";
        }else{
            echo "<br>";
        }
    }
});

Route::get('/restaurar/{id}', function($id){//para restaurar o item apagado
    $cat = Categoria::withTrashed()->find($id);
    if(isset($cat)){
        $cat->restore();//edita o registro do deleted_at para null 
        echo "Categoria Restaurada: ".$cat->id. "<br> ";
        echo "<a href=\"/\">Lista todas</a>";
    }else{
        echo "<h1>Categoria não encontrada</h1>";
    }
});

Route::get('/apagarpermanentemente/{id}', function($id){//outra forma de apagar diretamente o item
    $cat = Categoria::withTrashed()->find($id);
    if(isset($cat)){
        $cat->forceDelete();//força o delete do item, quando ele ja foi apagado mas ainda está no deleted_at
        return redirect('/todas');
    }else{
        echo "<h1>Categoria não encontrada</h1>";
    }
});