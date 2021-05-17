<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
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

$factory->define(Person::class, function (Faker $faker) {
    return [
        'Geburtsdatum' => $faker->date('Y-m-d', 'now'),
        'vorname' => $faker->name,
        'nachname' => $faker->name,
        'SVNR' => $faker->numberBetween(1000, 9999),
        'PLZ' => $faker->numberBetween(1000, 9999),
        'Ort' => $faker->city,
        'Straße' => $faker->streetName,
        'Hausnr' => $faker->numberBetween(1,999),
    ];
});
