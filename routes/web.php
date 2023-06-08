<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// class Stadium{

// }

// class Football {
// 	public function __construct( Stadium $stadium){
// 		 $this->stadium = $stadium;
// 	}
// }

// class Game {
// 	public function __construct( Football $football){
// 		$this->football = $football;
// 	}
// }

// class Container {
// 	protected $bindings = [];
	
// 	public function bind( $name , callable $resolve){
// 		return $this->bindings[$name] = $resolve;
// 	}
	
// 	public function make( $name ){
// 		return $this->bindings[$name]();
// 	}
	
	
// }

// $container = new Container;
// $container->bind('Game', function(){
// 	return new Game( new Football );
// });

// print_r($container);

// dd($container->make('Game'));

/*
 
 app()->bind('Game', function(){
	return new Game(new Football(new Stadium));
});

dd(app()->make('Game'));
*/


// create instance 

// app()->instance('Game', function(){
// 	return 'Instance';
// });
// dd(app());
// resolve bindings container in this way with the help of php reflection class
// dd(resolve('Game'));
// dd(app()->make('Hello'));

// echo Hash::make('123456');die();

Route::get('/', function () {
    return view('welcome');
});
