<?php

use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'Teclado',
            'estoque' => 12,
            'preco' => 20,
            'categoria_id' => 1
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Casa',
            'estoque' => 10,
            'preco' => 100000,
            'categoria_id' => 4
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Maça',
            'estoque' => 10,
            'preco' => 2,
            'categoria_id' => 3
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Macarronada',
            'estoque' => 10,
            'preco' => 25,
            'categoria_id' => 3
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Camiseta',
            'estoque' => 10,
            'preco' => 35,
            'categoria_id' => 2
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Apartamento',
            'estoque' => 10,
            'preco' => 200000,
            'categoria_id' => 4
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Mouse',
            'estoque' => 10,
            'preco' => 27,
            'categoria_id' => 1
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Cachorro',
            'estoque' => 10,
            'preco' => 300,
            'categoria_id' => 5
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Gato',
            'estoque' => 50,
            'preco' => 100,
            'categoria_id' => 5
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Calça Jeans',
            'estoque' => 50,
            'preco' => 79,
            'categoria_id' => 5
        ]);
    }
}
