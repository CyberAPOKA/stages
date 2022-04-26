<?php

use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users_id = DB::table('users')->pluck('id');

        $faker = Faker\Factory::create('pt_BR');

        foreach (range(1, 50) as $index) {
            DB::table('curso_extras')->insert([
                'instagram' => $faker->url('instagram'),
                'facebook' => $faker->url('facebook'),
                'linkedin' => $faker->url('linkedin'),
                'outro' => $faker->url(),
                'links' => $faker->url(),

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
