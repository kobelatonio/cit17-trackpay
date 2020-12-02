<?php

use Illuminate\Database\Seeder;



class LeaveApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\LeaveApplication::class, 50)->create();
    }
}