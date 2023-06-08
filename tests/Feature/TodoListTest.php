<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_fetch_all_todo_list()
    {
        // $this->withoutExceptionHandling();
        // $response = $this->get('/');

        // $response->assertStatus(200);

        // Preparation
        
        // action
       /* TodoList::create(['name' => 'My Post']); */
        $list = TodoList::factory()->create(['name' => 'My list']);

        $response = $this->getJson(route('todo-list.store'));

        // assertion 
        // dd($response->json()[0]['name']);
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('My list', $response->json()[0]['name']);

    }

    public function test_fetch_single_todo_list(){

        $list = TodoList::factory()->create();
        $response = $this->getJson(route('todo-list.show',$list->id))
            ->assertOk()
            ->json();
        // $response->assertOk();
        $this->assertEquals($response['name'], $list->name);
    }
}
