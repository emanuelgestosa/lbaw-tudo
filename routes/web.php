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
use App\Models\Board;

Route::get('/', 'HomeController@show');
Route::get('/faq', 'FaqController@show');
Route::get('/about', 'AboutController@show');
Route::get('/contacts', 'ContactsController@show');
Route::get('/features', 'FeaturesController@show');

// User profile
Route::get('/user/{id}', 'UserController@show');
Route::get('/user/{id}/edit', 'UserController@showEdit');
Route::get('/user/{id}/projects', 'UserController@showProjects');

// API
// Route::get('/api/faq', 'FaqController@retrieve');
Route::patch('/api/users/{id}/edit', 'UserController@edit');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


// Experimenting
Route::get('task/{id}',[TaskController::class,'show']);
Route::get('board/{id}',[BoardController::class,'show']);
