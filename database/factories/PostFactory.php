<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2, true),
        'description' => $faker->words(3, true),
        'content' => $faker->text
    ];
});
