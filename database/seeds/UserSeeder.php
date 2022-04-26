<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'data_nascimento' => $faker->date,
                'cpf' => $faker->unique()->randomNumber($nbDigits = 9, $strict = false),
                'password' => bcrypt('secret'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
