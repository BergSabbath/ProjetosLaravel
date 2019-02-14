<?php

use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enderecos')->insert([
            'cliente_id' => '1',
            'rua' => 'Rua São Paulo',
            'numero' => 12,
            'bairro' => 'aurora',
            'cidade' => 'São Paulo',
            'uf' => 'MA',
            'cep' => '62514-652',
        ]);
        DB::table('enderecos')->insert([
            'cliente_id' => '2',
            'rua' => 'Rua santos',
            'numero' => 12,
            'bairro' => 'cohatrac',
            'cidade' => 'Ovelhas',
            'uf' => 'SC',
            'cep' => '62514-652',
        ]);
        DB::table('enderecos')->insert([
            'cliente_id' => '3',
            'rua' => 'Rua São bento',
            'numero' => 12,
            'bairro' => 'turu',
            'cidade' => 'Lumiar',
            'uf' => 'RJ',
            'cep' => '62514-652',
        ]);
        DB::table('enderecos')->insert([
            'cliente_id' => '4',
            'rua' => 'Rua São Luis',
            'numero' => 12,
            'bairro' => 'anjo da guarda',
            'cidade' => 'petrolina',
            'uf' => 'BA',
            'cep' => '62514-652',
        ]);
    }
}
