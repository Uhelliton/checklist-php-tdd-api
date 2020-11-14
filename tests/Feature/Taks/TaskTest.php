<?php

namespace Tests\Feature;

use Domains\Task\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
    }


    /**
     * Verifica se um usuário está autenticado
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
}
