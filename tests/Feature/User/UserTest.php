<?php

namespace Tests\Feature\User;

use Domains\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use JWTAuth;

class UserTest extends TestCase
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var
     */
    private $user;

    public function setUp() :void
    {
        parent::setUp();

        $user = User::where('email', 'admin@admin.com')->first();
        $token = JWTAuth::fromUser($user);

        $this->token = $token;
        $this->user = [
            'name'       => 'test',
            'email'      => 'test@admin.com',
            'password'   => bcrypt('secret'),
        ];
    }


    /**
     * Verifica não está autenticado
     *
     * @return void
     */
    public function it_should_user_be_unauthorized()
    {
        $task = factory(Task::class)->create();

        $this->post('api/tasks', $task->toArray())
             ->assertUnauthorized();
    }


    /**
     * Verifica se um usuário está autenticado
     *
     * @return void
     */
    public function it_should_user_be_authenticate()
    {
        $task = factory(Task::class)->create();

        $this->post('api/tasks', $task->toArray())
            ->assertUnauthorized();
    }


    /** @test ***/
    public function it_should_create_user()
    {
        // $this->withoutExceptionHandling();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ]);

        $response->post('api/users',  $this->user)
                 ->assertStatus(201);

        $response->assertDatabaseHas('usuario', [
           'nome'     =>  $this->user['name'],
           'email'    =>  $this->user['email'],
        ]);
    }

    /** @test ***/
    public function it_should_show_user()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ]);

        $response->get('api/users/1')->assertStatus(200);
    }

    /** @test ***/
    public function it_should_show_user_unauthorized()
    {
        $this->get('api/users/1')->assertUnauthorized(200);
    }


    /** @test ***/
    public function it_should_update_user()
    {
        $user = factory(User::class)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ]);

        $response->put("api/users/{$user->id}",  $this->user)
                 ->assertStatus(200);
    }

    /** @test ***/
    public function it_should_delete_user()
    {
        $user = factory(User::class)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ]);

        $response->delete("api/users/{$user->id}",  $this->user)
            ->assertStatus(200);
    }
}
