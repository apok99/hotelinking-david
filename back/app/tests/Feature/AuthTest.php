<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessLogin()
    {
        $response = $this->post('/login', [
            'email' => 'prueba@mail.com',
            'password' => 'Octubre2021'
        ]);

        $response->assertJson([
            'error' => false,
        ]);
    }

    public function testBadPassword()
    {
        $response = $this->post('/login', [
            'email' => 'prueba@mail.com',
            'password' => 'badPassword'
        ]);

        $response->assertJson([
            'error' => true,
        ]);
    }

    
    public function testBadEmail()
    {
        $response = $this->post('/login', [
            'email' => '2@mail.com',
            'password' => 'Octubre2021'
        ]);

        $response->assertJson([
            'error' => true,
        ]);
    }
    
    public function testEmptyPost()
    {
        $response = $this->post('/login');
        $response->assertJson([
            'error' => true,
        ]);
    }
}
