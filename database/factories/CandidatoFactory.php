<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Candidato;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Candidato::class, function (Faker $faker) {
    return [
        'nomesocial' => $faker->sentence(),
        'rg' => $faker->sentence(),
        'telefoneresidencial' => $faker->sentence(),
        'telefonecelular' => $faker->sentence(),
        'data_nascimento' => $faker->sentence(),
        'nome_pai' => $faker->sentence(),
        'nome_mae' => $faker->sentence(),
        'deficiencia' => $faker->sentence(),
        'raca' => $faker->sentence(),
        'rua' => $faker->sentence(),
        'numero_rua' => random_int(-2147483648, 2147483647),
        'complemento' => $faker->sentence(),
        'cep' => $faker->sentence(),
        'bairro' => $faker->sentence(),
        'cidade' => $faker->sentence(),
        'user_id' => random_int(1, 10)
    ];
});
