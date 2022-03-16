<?php

use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lista_cursos')->insert(
            [
                ['curso' => 'Administração','escolaridade_id' => '3'],
                ['curso' => 'Administração Pública e Social','escolaridade_id' => '3'],
                ['curso' => 'Agronomia','escolaridade_id' => '3'],
                ['curso' => 'Análise e Desenvolvimento de Sistemas','escolaridade_id' => '3'],
                ['curso' => 'Arquitetura e Urbanismo','escolaridade_id' => '3'],
                ['curso' => 'Arquivologia','escolaridade_id' => '3'],
                ['curso' => 'Artes Visuais','escolaridade_id' => '3'],
                ['curso' => 'Biblioteconomia','escolaridade_id' => '3'],
                ['curso' => 'Arquitetura e Urbanismo','escolaridade_id' => '3'],
                ['curso' => 'Biologia','escolaridade_id' => '3'],
                ['curso' => 'Biomedicina','escolaridade_id' => '3'],
                ['curso' => 'Ciência da Computação','escolaridade_id' => '3'],
                ['curso' => 'Ciências Contábeis','escolaridade_id' => '3'],
                ['curso' => 'Ciências Econômicas','escolaridade_id' => '3'],
                ['curso' => 'Ensino Médio','escolaridade_id' => '1'],
                ['curso' => 'Técnico em Informática','escolaridade_id' => '2'],
                ['curso' => 'Técnico em Contabilidade','escolaridade_id' => '2'],
                ['curso' => 'Técnico em Meio Ambiente','escolaridade_id' => '2']
                
            ]
            );
    }
}
