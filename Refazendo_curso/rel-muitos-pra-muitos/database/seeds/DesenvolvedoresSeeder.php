<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert([
            'nome' => 'Terry Bogard',
            'cargo' => 'Analista Pleno'
            ]);
        DB::table('desenvolvedores')->insert([
            'nome' => ' Andy Bogard',
            'cargo' => 'Analista Senior'
            ]);
        DB::table('desenvolvedores')->insert([
            'nome' => ' Joe Higashi',
            'cargo' => 'Programador Jr'
            ]);

    }
}
