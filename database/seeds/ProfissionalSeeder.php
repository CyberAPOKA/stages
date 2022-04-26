<?php

use Illuminate\Database\Seeder;

class ProfissionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_BR');


        foreach (range(1, 50) as $index) {
            DB::table('profissionals')->insert([
                'cursosrealizados' => $faker->paragraph,
                'outrosconhecimentos' => $faker->paragraph,
                'experienciasprofissionais' => $faker->paragraph,
                'jafoiestagiario' => $faker->randomElement(['sim', 'nao']),
                'inicioperiodo' => $faker->date,
                'fimperiodo' => $faker->date,
                'secretaria' => $faker->name,

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
}
