<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return response($tasks);
    }

    public function store( Request $request){
        return Task::create( $request->all(),201);
    }

    public function destroy(Task $task){
        $task->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
