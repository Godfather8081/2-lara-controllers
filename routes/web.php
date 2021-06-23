<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\PostsApiController;
use App\Http\Controllers\PostsWebController;
use App\Http\Controllers\SingleActionController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('first-controller', [FirstController::class, 'showMsg']);


// now in laravel 8 there are 2 different ways to call controller
// Route::get('first-controller', [FirstController::class, 'showMsg']);

// Route::get('first-controller', 'App\Http\Controllers\FirstController@showMsg');

// in in laravel 7 and bellow versions this ways will not support we have to use like this
// it wont support in laravel 8+ versions
// Route::get('first-controller', 'FirstController@showMsg');


// if controller logic is vary complex we also create controller just for that operation
// at that time we can use single action controller and it has only __invoke method 
// which will run on request of that route so no need to define method for controller

Route::get('single-action', SingleActionController::class);


// every web request has this operations in common 
// Verb	        URI	                    Action	Route Name

// GET	        /photos	                index	photos.index

// GET	        /photos/create	        create	photos.create

// POST        /photos	                store	photos.store

// GET	        /photos/{photo}	        show	photos.show

// GET	        /photos/{photo}/edit	edit	photos.edit

// PUT/PATCH   /photos/{photo}	        update	photos.update

// DELETE	    /photos/{photo}	        destroy	photos.destroy

Route::get('posts', [PostsWebController::class, 'index']);

Route::get('posts/create', [PostsWebController::class, 'create']);

Route::post('posts', [PostsWebController::class, 'store']);

Route::get('posts/{id}', [PostsWebController::class, 'show']);

Route::get('posts/{id}/edit', [PostsWebController::class, 'edit']);

Route::put('posts/{id}', [PostsWebController::class, 'update']);

Route::delete('posts/{id}', [PostsWebController::class, 'destroy']);


// we can create all web routes by our own or can use resources to generate all methods
// by laarvel when we just want all crud related routes without to much modification
// we can use it and it will generate routes just like above
// Route::resource('posts', PostsWebController::class);


// every api request has this operations in common 
// Verb	        URI	                    Action	Route Name

// GET	        /photos	                index	photos.index

// POST        /photos	                store	photos.store

// GET	        /photos/{photo}	        show	photos.show

// PUT/PATCH   /photos/{photo}	        update	photos.update

// DELETE	    /photos/{photo}	        destroy	photos.destroy

Route::get('posts-two', [PostsApiController::class, 'index']);

Route::post('posts-two', [PostsApiController::class, 'store']);

Route::get('posts-two/{id}', [PostsApiController::class, 'show']);

Route::put('posts-two/{id}', [PostsApiController::class, 'update']);

Route::delete('posts-two/{id}', [PostsApiController::class, 'destroy']);

// we can create all api routes by our own or can use apiResource to generate all methods
// by laarvel when we just want all crud related routes without to much modification
// we can use it and it will generate routes just like above
// Route::apiResource('posts-two', PostsWebController::class);
