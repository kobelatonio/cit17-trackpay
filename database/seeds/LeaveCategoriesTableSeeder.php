<?php

use Illuminate\Database\Seeder;

class LeaveCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leave_categories = [
        	['name' => 'Sick', 'annual_leave_days' => '15'],
        	['name' => 'Vacation', 'annual_leave_days' => '15'],
        	['name' => 'Maternity', 'annual_leave_days' => '105'],
        	['name' => 'Birthday', 'annual_leave_days' => '1']
        ];
        DB::table('leave_categories')->insert($leave_categories);
    }
}
