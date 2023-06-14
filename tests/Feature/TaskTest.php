<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase {
    use RefreshDatabase;
    public function test_fetch_all_tasks_of_a_todo_list() {
        // $task = Task::factory()->create();
        $task = $this->createTask();
        $response = $this->getJson(route('task.index'))
            ->assertOk()
            ->json();
        $this->assertEquals($task->title, $response[0]['title']);
    }

    public function test_store_a_task_for_a_todo_list(){
        // Preparation
        // $task = Task::factory()->make();
        $task = $this->createTask();

        // action
        $response = $this->postJson(route('task.store', ['title' => $task->title ]))
            ->assertCreated()
            ->json();

        // assertion
        $this->assertEquals($task->title, $response['title']);
        $this->assertDatabaseHas('tasks', ['title' => $task->title ]);
    }

    public function test_delete_a_task_from_database(){
        $task = Task::factory()->create();
        $this->deleteJson(route('task.destroy',$task->id));
        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);
    }
}
