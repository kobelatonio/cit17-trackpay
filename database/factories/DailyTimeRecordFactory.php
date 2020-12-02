<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DailyTimeRecord;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(DailyTimeRecord::class, function (Faker $faker, array $arguments = []) {
	$time_in = $faker->dateTimeBetween(Carbon::parse('07:45:00'), Carbon::parse('08:15:00'));
	$time_out = $faker->dateTimeBetween(Carbon::parse('16:45:00'), Carbon::parse('17:15:00'));
    return [
    	'date' => date('Y-m-d'),
    	'employee_id' => $arguments['employee_id'],
    	'shift_start' => Carbon::parse('08:00:00'),
        'shift_end' => Carbon::parse('17:00:00'),
        'time_in' => $time_in,
        'time_out' => $time_out,
        'minutes_late' => app('App\Http\Controllers\TimeEntriesController')->getMinutesLate($arguments['employee_id'], $time_in),
        'remarks' => $time_in > Carbon::parse('08:00:00') ? 'Late' : 'Early',
        'hours_worked' => Carbon::parse($time_in)->diffInHours(Carbon::parse($time_out))
    ];
});
