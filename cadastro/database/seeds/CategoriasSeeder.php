<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nome' => 'Informática'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Roupas'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Alimentos'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Imoveis'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Animais'
        ]);
    }
}
