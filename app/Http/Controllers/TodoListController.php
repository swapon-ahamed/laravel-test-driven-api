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
        $list = TodoList::create($request->all());
        return $list;
        // return response($list,Response::HTTP_CREATED);
    }

}
