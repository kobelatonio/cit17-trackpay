<?php

use Illuminate\Database\Seeder;

use DB;

class DeductiblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deductibles = [
        	['name'=>'GSIS', 'description'=>'9%'],
        	['name'=>'PhilHealth', 'description'=>'1.5%'],
        	['name'=>'Pag-IBIG', 'description'=>'2%'],
        ];

        DB::table('deductibles')->insert($deductibles);
        	
    }
}
