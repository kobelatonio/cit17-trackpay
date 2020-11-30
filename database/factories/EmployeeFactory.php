<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Employee::class, function (Faker $faker) {
	$positions = App\Position::pluck('id')->toArray();
	$gender = $faker->randomElement(['Male', 'Female']);
    return [
        'first_name' => $gender == 'Male' ? $faker->firstNameMale : $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'contact_number' => '0'.mt_rand(9000000000, 9999999999),
        'birthdate' => Carbon::parse($faker->date($format = 'Y-m-d', $max = 'now')),
        'gender' => $gender,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'position_id' => $faker->randomElement($positions)
    ];
});
