<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;

$factory->define(Employee::class, function (Faker $faker) {
	$positions = App\Position::pluck('id')->toArray();
	$gender = $faker->randomElement(['Male', 'Female']);
    return [
        'first_name' => $gender == 'Male' ? $faker->firstNameMale : $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'contact_number' => '0'.mt_rand(9000000000, 9999999999),
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $gender,
        'email' => $faker->email,
        'password' => bcrypt('passwordpassword'), 
        // the request validation requires password to have more than 10 characters
        'position_id' => $faker->randomElement($positions)
    ];
});
