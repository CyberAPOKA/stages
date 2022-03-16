<?php

use Illuminate\Database\Seeder;

class PdfSeeder extends Seeder
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
            DB::table('arquivos')->insert([
                'anexos' => $faker->fileExtension('pdf'),
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
