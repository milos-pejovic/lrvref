<?php

use Faker\Generator as Faker;
use App\Author;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'about' => $faker->paragraph
    ];
});
