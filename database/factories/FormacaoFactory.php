<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Formacao;
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

$factory->define(Formacao::class, function (Faker $faker) {
    return [
        'escolaridade' => $faker->sentence(),
        'area' => $faker->sentence(),
        'curso' => $faker->sentence(),
        'semestre' => $faker->sentence(),
        'turno' => $faker->sentence(),
        'instituicao' => $faker->sentence()
    ];
});
