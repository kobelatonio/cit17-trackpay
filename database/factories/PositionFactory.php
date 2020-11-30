<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Position;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'monthly_salary' => mt_rand(10000, 50000),
        'shift_start' => Carbon::parse('08:00:00'),
        'shift_end' => Carbon::parse('17:00:00')
    ];
});
