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

     private $list;
     public function setUp():void {
        // Preparation
        parent::setUp();
        $this->list = $this->createTodoList(['name' => 'My list']);
     }

    public function test_fetch_all_todo_list()
    {
        // $this->withoutExceptionHandling();
        // $response = $this->get('/');

        // $response->assertStatus(200);

        // Preparation
        
        // action
       /* TodoList::create(['name' => 'My Post']); */
        

        $response = $this->getJson(route('todo-list.index'));

        // assertion 
        // dd($response->json()[0]['name']);
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('My list', $response->json()[0]['name']);

    }

    public function test_fetch_single_todo_list(){

        // $list = TodoList::factory()->create();
        $response = $this->getJson(route('todo-list.show',$this->list->id))
            ->assertOk()
            ->json();
        // $response->assertOk();
        $this->assertEquals($response['name'], $this->list->name);
    }

    public function test_store_single_todo_list(){
        $list = TodoList::factory()->make(); // not store in database
        $response = $this->postJson(route('todo-list.store',['name' =>$list->name ]))
            ->assertCreated()
            ->json();
        $this->assertEquals($list->name,$response['name']);
        // $this->assertDatabaseHas('todo_lists', ['name' => 'My post in db']);
    }


    public function test_while_storing_todo_list_name_field_is_required(){
        $this->withExceptionHandling();
        $response = $this->postJson(route('todo-list.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }

    public function test_delete_todo_list(){
        $this->deleteJson(route('todo-list.destroy',$this->list->id))
            ->assertNoContent();

        $this->assertDatabaseMissing('todo_lists',['name' => $this->list->name]);
    }

    public function test_update_todo_list(){
        $this->patchJson(route('todo-list.update', $this->list->id),['name' => 'update name'])
            ->assertOk();
        $this->assertDatabaseHas('todo_lists',['id' => $this->list->id, 'name' => 'update name']);
    }
    public function test_while_updating_todo_list_name_field_is_required(){
        $this->withExceptionHandling();
        $response = $this->patchJson(route('todo-list.update',$this->list->id))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }
}
