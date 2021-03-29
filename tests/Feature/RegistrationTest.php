<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_register_form()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $response = $this->post(route('register'),[
            'name' => 'test1',
            'email' => 'test1@gmail.com',
            'password' => 't123450',
            'password_confirmation' => 't12345'
        ]);
        $response->assertStatus(302);

    }
}
