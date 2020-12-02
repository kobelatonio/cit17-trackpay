<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        	'first_name' => 'John',
        	'last_name' => 'Doe',
			'email' => 'jd@gmail.com',
			'password' => bcrypt('passwordpassword') 
		];
		DB::table('users')->insert($user); 
    }
}
