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
Route::get('/', 'HomeController@show');
Route::get('/faq', 'FaqController@show');
Route::get('/about', 'AboutController@show');
Route::get('/contacts', 'ContactsController@show');
Route::get('/features', 'FeaturesController@show');

// User profile
Route::get('/user/{id}', 'UserController@show');
Route::get('/user/{id}/edit', 'UserController@showEdit');
Route::get('/user/{id}/projects', 'UserController@showProjects')->name('projects');
Route::get('/user/{id}/favourites', 'UserController@showFavourites')->name('favourites');
Route::get('/user/{id}/invites', 'UserController@showInvites');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Task
Route::get('/task/{id}', 'TaskController@show');
Route::get('/verticals/{vertical_id}/add_task', 'TaskController@showCreate');
Route::post('/verticals/{vertical_id}/add_task', 'TaskController@add_task')->name('add_task');

// Vertical
Route::get('/board/{id}/create', 'VerticalController@showCreate');

// Board
Route::get('/board/{id}', 'BoardController@show')->name('board');
Route::get('/project/{id}/boards/create', 'BoardController@showCreate');

// Project
Route::get('/project/{id}', 'ProjectController@show');
Route::get('/project/{id}/invites', 'ProjectController@invites');
Route::get('/user/{user_id}/add_project', 'ProjectController@showCreate');
Route::post('/user/{user_id}/add_project', 'ProjectController@create')->name('add_project');
Route::get('/project/{project_id}/favourite', 'ProjectController@toggle_favourite')->name('fav_project');

// Administration
Route::get('/admins', 'AdminController@show');
Route::get('/admins/create', 'AdminController@showCreate');

//Pop Up Tester
Route::get('popup', function () {
    return view('pages.popup');
});
