<?php

use Illuminate\Database\Seeder;

class DailyTimeRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$employees = \App\Employee::get();
    	foreach($employees as $employee) {
    		factory(\App\DailyTimeRecord::class)->create(['employee_id' => $employee->id]);
    	}
    }
}
