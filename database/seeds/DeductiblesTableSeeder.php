<?php

use Illuminate\Database\Seeder;

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
        	['type' => 'GSIS', 'percentage' => '9'],
        	['type' => 'PhilHealth', 'percentage' => '1.5'],
        	['type' => 'Pag-IBIG', 'percentage' => '2'],
        ];
        DB::table('deductibles')->insert($deductibles);
    }
}
