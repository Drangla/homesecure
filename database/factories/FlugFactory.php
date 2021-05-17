<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Flug;
use Faker\Generator as Faker;

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

$factory->define(Flug::class, function (Faker $faker) {
    return [
        'Flugnummer' => $faker->numberBetween(100000, 999999),
        'Abflugplanet' => $faker->word(),
        'Zielplanet' => $faker->word(),
        'Ablugzeit' => $faker->time(),
        'Ankunftszeit' => $faker->time(),
    ];
});
