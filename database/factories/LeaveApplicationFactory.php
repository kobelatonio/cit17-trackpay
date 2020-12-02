<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LeaveApplication;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(LeaveApplication::class, function (Faker $faker) {
    $leave_categories = App\LeaveCategory::pluck('id')->toArray();
    $employees = App\Employee::pluck('id')->toArray();
	$startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('now', '+1 year')->getTimestamp());
    $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addDay();
	$status = $faker->randomElement(['Rejected', 'Pending', 'Approved']);
    return [
    	'leave_category_id' => $faker->randomElement($leave_categories),
    	'employee_id' => $faker->randomElement($employees),
        'start_date' => $startDate,
        'end_date' => $endDate,
        'status' => $status,
        'reason_for_rejection' => $status == 'Rejected' ? $faker->randomElement(['Too immediate', 'Low manpower', 'Project deadlines']) : null
    ];
});
