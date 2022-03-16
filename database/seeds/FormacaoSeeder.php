<?php

use Illuminate\Database\Seeder;

class FormacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_BR');

        foreach (range(1, 500) as $index) {
            DB::table('formacaos')->insert([
               'lista_curso_id' => $this->getRandomCursoId(),
                'semestre' => $faker->numberBetween(1, 10),
                'turno' => $faker->randomElement(array('Manhã', 'Tarde', 'Noite')),
                'instituicao' => $faker->company,
                'situacao' => $faker->randomElement(array('Em Andamento', 'Finalizado', 'Trancado')),
                'candidato_id' => $this->getRandomCandidatoId(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomCandidatoId()
    {
        $candidato = \App\Candidato::inRandomOrder()->first();
        return $candidato->id;
    }

    private function getRandomCursoId()
    {
        $curso = \App\ListaCursos::inRandomOrder()->first();
        return $curso->id;
    }
}
