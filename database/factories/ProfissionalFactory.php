<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Profissional;
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

$factory->define(Profissional::class, function (Faker $faker) {
    return [
        'cursosrealizados' => $faker->sentence(),
        'outrosconhecimentos' => $faker->sentence(),
        'experienciasprofissionais' => $faker->sentence(),
        'jafoiestagiario' => $faker->sentence(),
        'inicioperiodo' => $faker->sentence(),
        'fimperiodo' => $faker->sentence(),
        'secretaria' => $faker->sentence()
    ];
});
