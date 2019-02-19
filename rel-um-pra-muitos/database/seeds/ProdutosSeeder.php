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
        
            "nome" => "Camisa Polo",
            "preco"=> 100,
            "estoque"=> 5, 
            "categoria_id"=> 1
        ]);
        DB::table('produtos')->insert([
        
            "nome" => "Camiseta",
            "preco"=> 343,
            "estoque"=> 53, 
            "categoria_id"=>2
        ]);
        DB::table('produtos')->insert([
        
            "nome" => "Jogos",
            "preco"=> 12,
            "estoque"=> 3, 
            "categoria_id"=>2
        ]);
        DB::table('produtos')->insert([
        
            "nome" => "PC gamer",
            "preco"=> 41,
            "estoque"=> 21, 
            "categoria_id"=>2
        ]);
        DB::table('produtos')->insert([
        
            "nome" => "Cama",
            "preco"=> 441,
            "estoque"=> 51, 
            "categoria_id"=>4
        ]);
        DB::table('produtos')->insert([
        
            "nome" => "Mouse",
            "preco"=> 41,
            "estoque"=> 31, 
            "categoria_id"=> 6
        ]);
        DB::table('produtos')->insert([
        
            "nome" => "Frutas",
            "preco"=> 12,
            "estoque"=> 50, 
            "categoria_id"=> 5
        ]);
    }
}
