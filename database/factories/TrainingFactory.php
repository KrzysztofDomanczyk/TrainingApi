<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;

use Faker\Generator as Faker;

$factory->define(\App\Training::class, function (Faker $faker) {
    $coach = factory(\App\Coach::class)->create();
    return [
        'title' => $faker->name,
        'coach_id' => $coach->id,
    ];
});
