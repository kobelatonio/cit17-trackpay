<?php

use Illuminate\Database\Seeder;

class DeductibleRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DeductibleRecord::class, 50)->create();
    }
}
