<?php

use Illuminate\Database\Seeder;

class BairrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lista_bairros')->insert(
            [
                ['bairros' => 'Centro','cidade_id' => '396'],
                ['bairros' => 'Scharlau','cidade_id' => '396'],
                ['bairros' => 'Feitoria','cidade_id' => '396'],
                ['bairros' => 'Morro do Espelho','cidade_id' => '396'],
                ['bairros' => 'Campina','cidade_id' => '396'],

                ['bairros' => 'Cristo Rei','cidade_id' => '396'],
                ['bairros' => 'Jardim América','cidade_id' => '396'],
                ['bairros' => 'Rio dos Sinos','cidade_id' => '396'],
                ['bairros' => 'São Miguel','cidade_id' => '396'],
                ['bairros' => 'Santo André','cidade_id' => '396'],

                ['bairros' => 'Pinheiro','cidade_id' => '396'],
                ['bairros' => 'Santos Dumont','cidade_id' => '396'],
                ['bairros' => 'Arroio da Manteiga','cidade_id' => '396'],
                ['bairros' => 'Rio Branco','cidade_id' => '396'],
                ['bairros' => 'São José','cidade_id' => '396'],
                
                ['bairros' => 'Santa Teresa','cidade_id' => '396'],
                ['bairros' => 'Padre Reus','cidade_id' => '396'],
                ['bairros' => 'Campestre','cidade_id' => '396'],
                ['bairros' => 'Duque de Caxias','cidade_id' => '396'],
                ['bairros' => 'Vicentina','cidade_id' => '396'],

                ['bairros' => 'São João Batista','cidade_id' => '396'],
                ['bairros' => 'Fião','cidade_id' => '396'],
                ['bairros' => 'Boa Vista','cidade_id' => '396'],
                ['bairros' => 'Fazenda São Borja','cidade_id' => '396'],
                ['bairros' => 'Loteamento Parque Recreio','cidade_id' => '396'],
                ['bairros' => 'Zona Rural','cidade_id' => '396'],



            ]
            );
    }
}
