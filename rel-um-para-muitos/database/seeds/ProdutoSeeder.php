<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            ['categoria_id' => 1, 
            'nome' => 'Camiseta Polo',
            'preco' =>100,
            'estoque' => 25
            ]);
        DB::table('produtos')->insert(
            ['categoria_id' => 1, 
            'nome' => 'Calça Jeans',
            'preco' =>25,
            'estoque' => 50
            ]);
        DB::table('produtos')->insert(
            ['categoria_id' => 2, 
            'nome' => 'Games',
            'preco' =>13,
            'estoque' => 5
            ]);
        DB::table('produtos')->insert(
            ['categoria_id' => 3, 
            'nome' => 'Ferrari',
            'preco' =>100,
            'estoque' => 25
            ]);
        DB::table('produtos')->insert(
            ['categoria_id' => 4, 
            'nome' => 'Guarda-roupa',
            'preco' =>20,
            'estoque' => 25
            ]);
        DB::table('produtos')->insert(
            ['categoria_id' => 5, 
            'nome' => 'Frutas',
            'preco' =>10,
            'estoque' => 2
            ]);
        DB::table('produtos')->insert(
            ['categoria_id' => 6, 
            'nome' => 'Computadores',
            'preco' =>10,
            'estoque' => 25
            ]);
    }
}
