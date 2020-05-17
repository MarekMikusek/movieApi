<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3, true),
        'film_genre' =>$faker->word,
        'description' =>$faker->text,
        'country' => $faker->country,
        'cover' => $faker->url
    ];
});
