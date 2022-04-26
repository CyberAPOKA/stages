<?php

use Illuminate\Database\Seeder;

class CandidatoSeeder extends Seeder
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
            DB::table('candidatos')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'cpf' => $faker->unique()->randomNumber($nbDigits = 9, $strict = false),
                'password' => bcrypt('secret'),
                'nomesocial' => $faker->name('male'),
                'rg' => $faker->randomNumber($nbDigits = 9, $strict = false),
                'telefoneresidencial' => $faker->phoneNumber,
                'telefonecelular' => $faker->phoneNumber,
                'data_nascimento' => $faker->date,
                'nome_pai' => $faker->name('male'),
                'nome_mae' => $faker->name('female'),
                'rua' => $faker->streetName,
                'numero_rua' => $faker->buildingNumber,
                'complemento' => $faker->buildingNumber,
                'cep' => $faker->postcode,
                'bairro' => $faker->city,
                'cidade' => $faker->city,
                'user_id' => $this->getRandomId(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomId()
    {
        $user = \App\User::inRandomOrder()->first();
        return $user->id;
    }



}
