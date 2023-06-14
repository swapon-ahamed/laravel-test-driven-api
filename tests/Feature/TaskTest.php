<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    public function test_fetch_all_tasks_of_a_todo_list()
    {
        // preparation
       $task = Task::factory()->create();

        // action
        $response = $this->getJson(route('task.index'))
            ->assertOk()
            ->json();

        // assertion

        $this->assertEquals($task->title, $response[0]['title']);
    }
}
