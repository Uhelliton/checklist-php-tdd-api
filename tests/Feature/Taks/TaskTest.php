<?php

namespace Tests\Feature;

use Domains\Task\Models\Task;
use Domains\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use JWTAuth;

class TaskTest extends TestCase
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var
     */
    private $task;

    public function setUp() :void
    {
        parent::setUp();

        $user = User::where('email', 'admin@admin.com')->first();
        $token = JWTAuth::fromUser($user);

        $this->token = $token;
        $this->task = [
            'title'       => 'test',
            'description' => 'test',
            'userId'      => 1,
        ];
    }


    /**
     * Verifica não está autenticado
     *
     * @return void
     */
    public function testShouldUserBeUnauthorized()
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
    public function testShouldUserBeAuthenticate()
    {
        $task = factory(Task::class)->create();

        $this->post('api/tasks', $task->toArray())
            ->assertUnauthorized();
    }


    /** @test ***/
    public function it_should_create_task()
    {
        // $this->withoutExceptionHandling();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ]);

        $response->post('api/tasks',  $this->task)
                 ->assertStatus(201);

        $response->assertDatabaseHas('tarefa', [
           'nome'       =>  $this->task['title'],
           'descricao'  =>  $this->task['description'],
           'usuario_id' =>  $this->task['userId'],
        ]);
    }

    /** @test ***/
    public function it_should_update_task()
    {
        $task = factory(Task::class)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ]);

        $response->put("api/tasks/{$task->id}",  $this->task)
                 ->assertStatus(200);
    }

    /** @test ***/
    public function it_should_delete_task()
    {
        $task = factory(Task::class)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ]);

        $response->delete("api/tasks/{$task->id}",  $this->task)
            ->assertStatus(200);
    }
}
