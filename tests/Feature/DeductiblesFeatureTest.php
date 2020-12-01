<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeductiblesFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    function a_user_can_see_all_of_the_deductibles()
    {
        // given
            // a user must exist
            $user = factory(\App\User::class)->create();
            // a user must be logged in
            $this->loginUser($user);
            // a minimum of one deductible must exist
            $this->createDeductibles();
            $deductible = factory(App\DeductibleRecord::class, 50)->create();
        // when
            // I go to route /deductibles
            $response = $this->get('/deductible_records');
        // then
            // I expect to see the full record of deductibles
            $response->assertSee($deductible->date);
            }
    } 

     /** @test */  
    function a_user_can_store_a_deductible_record() 
    {
        // given
            // a user must exist
            $user = factory(\App\User::class)->create();
            // a user must be logged in
            $this->loginUser($user);
            // a minimum of one deductible must exist
            $this->createDeductibles();
            // an array of values for the new deductible
            $new_deductible = factory(App\DeductibleRecord::class, 50)->make();
        // when
            // I post to route /deductibles
            $response = $this->post('/deductible_records', $new_deductible);
        // then
            // I expect to see the deductible in the database
            $this->assertDatabaseHas('deductible_records', $new_deductible);
            //I expect to be redirected to /deductibles
            $response->assertRedirect('/deductible_records');
    }

     /** @test */  
    function a_user_can_update_a_deductible_record() 
    {
        // given
            // a user must exist
            $user = factory(\App\User::class)->create();
            // a user must be logged in
            $this->loginUser($user);
            // a minimum of one deductible must exist
            $this->createDeductibles();
            // an array of values for the new details of the deductible record
            $new_details_of_a_deductible_record = [
                'date' => '2020-01-02',
                'employe_id' => \App\Employee::first()->id,
                'deductible_id' => \App\DeductibleRecord::first()->id,
                'is_deducted' => '1',
                'deduction_amount' => '1000'
            ];
        // when
            // I put to route /deductible_records/{deductible_record}
            $response = $this->put('/deductibles/'.\App\DeductibleRecord::first()->id, $new_details_of_an_employee);
        // then
            // I expect to see the updated deductible record in the database
            $this->assertDatabaseHas('deductibles', $new_details_of_a_deductible_record);
            $response->assertRedirect('/deductibles');
    }

    public function createDeductibles()
    {
        $deductibles = [
            ['type'=>'GSIS', 'percentage'=>'9'],
            ['type'=>'PhilHealth', 'percentage'=>'1.5'],
            ['type'=>'Pag-IBIG', 'percentage'=>'2'],
        ];

        DB::table('deductibles')->insert($deductibles);
            
    }
}
