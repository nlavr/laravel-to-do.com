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
Route::get('/', 'WelcomeController@index');

Auth::routes();

//routes
Route::get('home', 'HomeController@index');
Route::get('tasks', 'TasksController@index');
Route::get('tasks/edit', 'TasksController@edit');
Route::get('tasks/edit/{id}', 'TasksController@edit');
Route::get('tasks/open/{id}', 'TasksController@open');

//post and get data
Route::post('tasks/edit', 'TasksController@storeTask');
Route::post('tasks/edit/{id}', 'TasksController@storeTask');
Route::get('tasks/delete/{id}', 'TasksController@deleteTask');
Route::get('tasks/republish/{id}', 'TasksController@republishItem');
Route::get('tasks/done/{id}', 'TasksController@setDoneStatus');
