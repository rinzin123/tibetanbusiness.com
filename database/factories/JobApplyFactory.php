<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job\JobApply;
use App\Job\JobBasicInfo;
use App\User;
use Faker\Generator as Faker;

$factory->define(JobApply::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1),
        'mobile_no' => $faker->numberBetween($min = 1000, $max = 9000),
        'email' => $faker->sentence(1),
        'document' => $faker->sentence(1),
        'user_id' => function () {
            return User::all()->random();
        },
        'job_basic_info_id' => function(){
            return JobBasicInfo::all()->random();
        },
    ];
});
