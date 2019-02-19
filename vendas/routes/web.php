<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    $categorias = DB::table('categorias')->get();
    echo "<table>";
    foreach($categorias as $cat){
        echo "<tr><td>";
        echo $cat->nome;
        echo "<tr><td>";
    }
    echo "</table>";

    echo "<hr>";

    $nomes = DB::table('categorias')->pluck('nome'); //retorna somente a coluna que deseja
    echo "<select>";     
    foreach($nomes as $n){
            echo "<option>$n</option>";
        }
    echo "</select><br><br>";

    echo "<hr>";

    $cats = DB::table('categorias')->where('nome','Roupas')->get();
        foreach($cats as $cat){
            echo $cat->nome. " <br>";
        }
    //$cats = DB::table('categorias')->where('nome','Roupas')->first();
    //pegar o primeiro elemento sem precisar utilizar o array
        echo "<hr>";
        
    echo "<u>retorna um array utilizando o like:<br></u>";
        $cats = DB::table('categorias')->where('nome','like','%p%')->get();
        // todos que tenham "p"
        //"p%" todos que comecem com "p"
        //%p todos que termminerm com "p"

            foreach($cats as $cat){
            echo $cat->nome. " <br>";
            }
            echo "<hr>";
    echo "<u>Sentenças lógicas<br></u>";
        $cats = DB::table('categorias')->where('id',1)->orWhere('id', 4)->get();
        //onde tem id = 1 ou id = 4
        /////// conjuntos///////////
        //whereBetween('id',[1,4])->get(); pegar entre o intervalo de 1 a 4
        //whereNotBetween('id',[1,3])->get(); pegar que não estão entre o intervalo de 1 a 3
        //whereIn('id',[1,3])->get(); pegar que estão no 1 e 3, semelhante ao orWhere
        //whereNotIn('id',[1,3])->get(); pegar os que não estão no 1 e 3.

            foreach($cats as $cat){
            echo $cat->id. ": ";
            echo $cat->nome. " <br>";
            }
    echo "<hr>";
    echo "<u>Sentenças lógicas(2)<br></u>";
    $cats = DB::table('categorias')->where([
        ['id',1], //é como se fosse SELECT * FROM WHERE id=1 AND WHERE nome=roupas
        ['nome', 'roupas']
        ])->get();
        
        foreach($cats as $cat){
            echo $cat->id. ": ";
            echo $cat->nome. " <br>";
        }
        
        
        echo "<hr>";
    echo "<u>Ordenação de dados crescente<br></u>";
        $cats = DB::table('categorias')->orderBy('nome', 'asc')->get();
        //imprimirá por ordem alfabetica
        
        foreach($cats as $cat){
            echo $cat->id. ": ";
            echo $cat->nome. " <br>";
            }
    echo "<hr>";
    echo "<u>Ordenação de dados decrescente<br></u>";
    $cats = DB::table('categorias')->orderBy('nome', 'desc')->get();
    //imprimirá por ordem alfabetica
    
        foreach($cats as $cat){
            echo $cat->id. ": ";
            echo $cat->nome. " <br>";
        }
});

Route::get('/novascategorias', function(){
    echo "<u>Inserindo dados</u>";
    echo "<hr>";

    // DB::table('categorias')->insert([
    //     ['nome' => 'Cama, mesa e banho'],
    //     ['nome' => 'Informática'],
    //     ['nome' => 'Cozinha']
    // ]);
    
    $id = DB::table('categorias')->insertGetId(//inserir e pegar o novo id que foi inserido
        ['nome' => 'Carro']// so aceita 1 unico elemento
    );
    echo "O novo id inserido é: $id";
});

Route::get('/atualizandocategorias', function(){
    
    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p><u> Antes da atualização</u></p>";
    echo  "id: ". $cat->id. " ";
    echo "nome: ". $cat->nome. " <br>";
    
    //atualizando o banco de dados
    DB::table('categorias')->where('nome','troquei')
    ->update(['nome' => 'Roupas infantis']);
    // se quiser alter mais.. coloque virgulas
    $cat = DB::table('categorias')->where('nome','Roupas infantis')->first();
    echo "<p><u> Depois da atualização</u></p>";
    echo  "id: ". $cat->id. " ";
    echo "nome: ". $cat->nome. " <br>";
});

Route::get('/removendocategorias', function(){
    echo "<p><u> Antes da remoção</u></p>";
    
    $categorias = DB::table('categorias')->get();
    foreach($categorias as $cat){
        echo  "id: ". $cat->id. " ";
        echo "nome: ". $cat->nome. " <br>";
    }
    echo "<hr>";

    // DB::table('categorias')->where('id',1)->delete();
    DB::table('categorias')->whereNotIn('id',[2,3,4,5,6,7])->delete();
    //apagar todos que não estejam dentro desse intervalo;
    
    echo "<p><u> Depois da remoção</u></p>";
    $categorias = DB::table('categorias')->get();
    foreach($categorias as $cat){
        echo  "id: ". $cat->id. " ";
        echo "nome: ". $cat->nome. " <br>";
    }
echo "<hr>";

});
