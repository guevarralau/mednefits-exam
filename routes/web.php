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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('tasks' ,'TaskController@index')->name('task.index');
Route::get('create/task', 'TaskController@create')->name('task.create');
Route::post('store/task', 'TaskController@store')->name('task.store');
Route::get('task/{task}', 'TaskController@show')->name('task.show');
Route::get('task/edit/{task}', 'TaskController@edit')->name('task.edit');
Route::post('task/update/{task}', 'TaskController@update')->name('task.update');
Route::delete('task/delete/{task}', 'TaskController@destroy')->name('task.delete');

Route::fallback(function(){
    abort(404,'Url is undefined please enter a correct url');
});


