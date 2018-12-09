<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'description' => $faker->words(3, true),
        'slug' => 'slug'
    ];
});
