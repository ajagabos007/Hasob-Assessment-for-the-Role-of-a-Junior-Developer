<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_register_user()
    { 
        /**
         * Due to electricity issues 
         * I did not have enough time to complete the hassob assessment
         *
         * With additional time, i will be able to complete the model 
         * Php Unit test for all position end point
         * 
         * I will be glad if i am cosinder for the Job. 
         * Thanks 
         *              Your faithfully
         *              Philip James Ajagabos
         *              ajagabos@gmail.com
         *              08030408652
         *
         */
        $user = User::factory(1)->create();
        
        $this->withoutExceptionHandling(); 

        $response = $this->json('POST', route('api.register'), $user->toArray());
        $response->assertStatus(200);
    }
}
