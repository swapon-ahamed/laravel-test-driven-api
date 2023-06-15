<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoListController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login',  [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('payload', [AuthController::class, 'payload']);

});

Route::Resource('todo-list', TodoListController::class);

// Route::get('todo-list',[TodoListController::class, 'index'])
//     ->name('todo-list.index');
// Route::get('todo-list/{list}',[TodoListController::class, 'show'])
//     ->name('todo-list.show');
// Route::post('todo-list',[TodoListController::class, 'store'])
//     ->name('todo-list.store');
// Route::delete('todo-list/{list}',[TodoListController::class, 'destroy'])
//     ->name('todo-list.destroy');
// Route::patch('todo-list/{list}',[TodoListController::class, 'update'])
//     ->name('todo-list.update');


// Route::get('task', [TaskController::class, 'index'])->name('task.index');
// Route::post('task', [TaskController::class, 'store'])->name('task.store');
// Route::delete('task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::Resource('todo-list.task', TaskController::class)
    ->except('show')
    ->shallow();