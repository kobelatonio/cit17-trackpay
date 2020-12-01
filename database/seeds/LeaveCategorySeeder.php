<?php

use Illuminate\Database\Seeder;

class LeaveCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $leave_category = [

        	['id' => '5','name' => 'Sick Leave','annual_leave_days' => '15'],
        	['id' => '6','name' => 'Vacation Leave','annual_leave_days' => '15'],
        	['id' => '7','name' => 'Maternity Leave','annual_leave_days' => '105'],
        	['id' => '5','name' => 'Birthday Leave','annual_leave_days' => '1'],

        	DB::table('leave_categories')->create($leave_category);
        ]
    }
}
