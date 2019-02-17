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
        DB::table('categorias')->insert([ "nome" => "Roupas"]);
        DB::table('categorias')->insert([ "nome" => "eletronicos"]);
        DB::table('categorias')->insert([ "nome" => "perfumes"]);
        DB::table('categorias')->insert([ "nome" => "moveis"]);
        DB::table('categorias')->insert([ "nome" => "alimentos"]);
        DB::table('categorias')->insert([ "nome" => "informatica"]);
    }
}
