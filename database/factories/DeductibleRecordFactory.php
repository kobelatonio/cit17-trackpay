<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DeductibleRecord;
use Faker\Generator as Faker;

$factory->define(DeductibleRecord::class, function (Faker $faker) {
    return [
    	
        'date'=>$faker->date,
        'employee_id'=>mt_rand(1,50),
        'deductible_id'=>mt_rand(1,3),
        'is_deducted'=>mt_rand(1,2),
        'deduction_amount'=>mt_rand(500,1000)
    ];
});
