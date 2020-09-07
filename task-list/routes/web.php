<?php

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

use App\Task;
use Illuminate\Http\Request;

/**
 * Keep a copy of the default welcome page for now.
 */
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

Route::get('/', function () {
    return redirect('/tasks');
});

// Is this the same as Route::auth()?
Auth::routes();

// TODO: I may end up removing this one.
Route::get('/home', 'HomeController@index')->name('home');
