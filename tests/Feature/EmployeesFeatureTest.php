<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeesFeatureTest extends TestCase
{
    Use RefreshDatabase; 

    /** @test */  
    public function a_user_can_see_all_of_the_employees() 
    {
        // given
            // a user must exist
            $user = factory(\App\User::class)->create();
            // a user must be logged in
            $this->loginUser($user);
            // a minimum of one position must exist
            factory(\App\Position::class, 10)->create();
            // a minimum of one employee must exist
            $employees = factory(\App\Employee::class, 10)->create();
        // when
            // I go to route /employees
            $response = $this->get('/employees');
        // then
            // I expect to see the full name of each employee created
            foreach($employees as $employee) {
                $response->assertSee($employee->full_name);
            }
    }

    /** @test */  
    public function a_user_can_create_an_employee() 
    {
        // given
            // a user must exist
            $user = factory(\App\User::class)->create();
            // a user must be logged in
            $this->loginUser($user);
            // a minimum of one position must exist
            factory(\App\Position::class, 10)->create();
            // an array of values for a new employee must be created
            $new_employee = [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'contact_number' => '09123456789',
                'birthdate' => '2000-01-01',
                'gender' => 'Male',
                'position_id' => \App\Position::first()->id,
                'email' => 'jd@gmail.com',
                'password' => 'passwordpassword'
            ];
        // when
            // I post to route /employees
            $response = $this->post('/employees', $new_employee);
        // then
            // I expect to see the employee in the database
            $this->assertDatabaseHas('employees', [
                'email' => $new_employee['email']
            ]); 
            // We turned the Employee model into Authenticatable just like the User model, thus an employee also has a password. However, inserting the $new_employee array in assertDatabaseHas() with an unhashed password will not match the hashed password of the same record in the database so I just used the email which is unique.  
            $response->assertRedirect('/employees');
    }

    /** @test */  
    public function a_user_can_update_an_employee() 
    {
        // given
            // a user must exist
            $user = factory(\App\User::class)->create();
            // a user must be logged in
            $this->loginUser($user);
            // a minimum of one position must exist
            factory(\App\Position::class, 10)->create();
            // a minimum of one employee must exist
            factory(\App\Employee::class, 10)->create();
            // an array of values for new details of an employee must be created
            $new_details_of_an_employee = [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'contact_number' => '09123456789',
                'birthdate' => '2000-01-01',
                'gender' => 'Male',
                'position_id' => \App\Position::first()->id,
                'email' => 'jd@gmail.com',
            ];
        // when
            // I put to route /employees/{employee}
            $response = $this->put('/employees/'.\App\Employee::first()->id, $new_details_of_an_employee);
        // then
            // I expect to see the updated employee in the database
            $this->assertDatabaseHas('employees', $new_details_of_an_employee);
            $response->assertRedirect('/employees');
    }

    /** @test */  
    public function a_user_can_delete_an_employee() 
    {
        // given
            // a user must exist
            $user = factory(\App\User::class)->create();
            // a user must be logged in
            $this->loginUser($user);
            // a minimum of one position must exist
            factory(\App\Position::class, 10)->create();
            // a minimum of one employee must exist
            factory(\App\Employee::class, 10)->create();
            // a primary key of an employee must be accessed
            $id = \App\Employee::first()->id;
        // when
            // I go to route /employees/{employee}/delete
            $response = $this->get('/employees/'.$id.'/delete');
        // then
            // I expect that the employee has been deleted in the database
            $this->assertDeleted('employees', [
                'id' => $id
            ]);
            $response->assertRedirect('/employees');
    }
     
    public function loginUser($user)
    {
        $this->actingAs($user);
    }

}
