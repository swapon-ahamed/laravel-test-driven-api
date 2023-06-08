<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoListController extends Controller
{
    public function index(){
        $lists = TodoList::all();

        return response($lists);
    }

    public function show(TodoList $list){
        // $list = TodoList::findOrFail($id);
        return response($list);
    }

    public function store( Request $request){
        $request->validate(['name' => 'required']);
        return TodoList::create($request->all());
        // return response($list,Response::HTTP_CREATED);
    }
    public function destroy(TodoList $list){
        $list->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }

}
