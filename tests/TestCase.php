<?php

namespace Tests;

use App\Models\TodoList;
use App\Models\Task;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp():void {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function createTodoList($args = []){
        return TodoList::factory()->create($args);
    }

    public function createTask($args = []){
        return Task::factory()->create($args);
    }
}
