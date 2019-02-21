<?php

use Faker\Generator as Faker;
use App\Book;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(rand(1, 5)),
        'about' => $faker->paragraph
    ];
});
