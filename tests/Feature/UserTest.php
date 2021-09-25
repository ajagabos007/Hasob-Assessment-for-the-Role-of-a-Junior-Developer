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
    protected $user;

    public function setUp():void {
       parent::setUp();

       $this->user = User::factory()->create();

       $this->user = $this->user->toArray();
       $this->user['password'] = 'password';

       /**
        * Login user to gain authourization
        */

        $response = $this->json('POST', route('api.user.login'), $this->user);
       
       $this->withoutExceptionHandling(); 

    }

    public function test_can_register_user()
    { 
        $this->user = User::factory()->make();
        $this->user = $this->user->toArray();

        /**
         * add hidden fields 'password' and 'password_confirmation' 
        */

        $this->user['password'] = 'password';
        $this->user['password_confirmation'] = $this->user['password'];

        $response = $this->json('POST', route('api.register'), $this->user);
        $response->assertStatus(200);
        $response->dump();

    }

    public function test_can_login_user(){

        $response = $this->json('POST', route('api.user.login'), $this->user);
        $response->assertStatus(200);
        $response->dump();

    }

    public function test_can_view_profile(){

        //view profile 
        $response = $this->json('POST', route('api.user.profile'));
        $response->assertStatus(200);
        $response->dump();

    }

    public function test_can_logout_user(){

        //Attempt Logout for an authourized user
        $response = $this->json('POST', route('api.user.logout'));
        $response->assertStatus(200);
        $response->dump();

    }

    public function test_can_create_user(){
       
        $newUser = User::factory()->make();
        $newUser = $newUser->toArray();

        /**
         * add hidden fields 'password' and 'password_confirmation' 
        */

        $newUser['password'] = 'password';
        $newUser['password_confirmation'] = $newUser['password'];

        $response = $this->json('POST', route('user.store'), $newUser);
        $response->assertStatus(200);

        $response->dump();

    }
}