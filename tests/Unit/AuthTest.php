<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuthenticate()
    {
        $attributes = [
            'email'    => 'uhelliton@uol.com.br',
            'password' => 'secret'
        ];

        $response = $this->postJson('/api/auth/login', $attributes);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'token', 'tokenType', 'user'
            ]);
    }
}
