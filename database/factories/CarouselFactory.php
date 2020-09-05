<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\LandingCarousel\Carousel;
use Faker\Generator as Faker;

$factory->define(Carousel::class, function (Faker $faker) {
    return [
        //
        'type' => $faker->word(),
        'link' => $faker->word(),
        'name' => $faker->word(),
        'photo' => $faker->word(),
    ];
});
