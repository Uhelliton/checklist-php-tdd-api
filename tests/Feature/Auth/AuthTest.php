<?php

namespace Tests\Feature\Auth;

use Domains\Task\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{



    /**
     * Verifica se um usuário está autenticado
     *
     * @return void
     */
    public function testShouldAuthenticateUser()
    {
        $attributes = [
            'email'    => 'admin@admin.com',
            'password' => 'secret'
        ];
        $response = $this->postJson('/api/auth/login', $attributes);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'token',
                    'tokenType',
                    'user'
                ]
            ]);
    }
}
