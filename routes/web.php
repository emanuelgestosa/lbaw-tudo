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
// Static Pages

use App\Http\Controllers\BoardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

Route::get('/', 'HomeController@show');
Route::get('/faq', 'FaqController@show');
Route::get('/about', 'AboutController@show');
Route::get('/contacts', 'ContactsController@show');
Route::get('/features', 'FeaturesController@show');

// User profile
Route::get('/user/{id}', 'UserController@show');
Route::get('/user/{id}/edit', 'UserController@showEdit');
Route::get('/user/{id}/projects', 'UserController@showProjects')->name('projects');

// API
Route::post('/api/user', 'UserController@create');
Route::patch('/api/user/{id}', 'UserController@edit');
Route::delete('/api/user/{id}', 'UserController@delete');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Task
Route::get('/task/{id}', [TaskController::class,'show']);
Route::get('/verticals/{vertical_id}/add_task', 'TaskController@showCreate');
Route::post('/verticals/{vertical_id}/add_task', 'TaskController@add_task')->name('add_task');

// Project
Route::get('/project/{id}', [ProjectController::class,'show']);
Route::get('/board/{id}', [BoardController::class,'show'])->name('board');
Route::get('/user/{user_id}/add_project', 'ProjectController@showCreate');
Route::post('/user/{user_id}/add_project', 'ProjectController@create')->name('add_project');

// Administration
Route::get('/admins', 'AdminController@show');
Route::get('/admins/create', 'AdminController@showCreate');

Route::get('/api-tester', function () {return view('pages.api-tester');});

