<?php

use Illuminate\Database\Seeder;

class EscolaridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lista_escolaridades')->insert(
            [
                ['id' => '1','escolaridade' => 'Ensino Médio'],
                ['id' => '2','escolaridade' => 'Ensino Técnico'],
                ['id' => '3','escolaridade' => 'Ensino Superior']
                
            ]
            );

    }
}
