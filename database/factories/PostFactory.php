<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2, true),
        'content' => $faker->text,
        'slug' => 'slug'
    ];
});
