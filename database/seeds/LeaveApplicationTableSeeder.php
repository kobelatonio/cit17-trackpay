<?php

use Illuminate\Database\Seeder;



class LeaveApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()


    {
        $leave_application = [

        	'employee_id' => Str::random(10);
            'leave_category_id' => 'Sick Leave',
            'start_date' =>  '11-30-2020',
            'end_date' => '12-03-2020',
            'status' => 'Rejected',
            'reason_for_rejection' => 'Low Manpower'
        ];

        DB::table('leave_application')->insert($leave_application);
        	
    }
}