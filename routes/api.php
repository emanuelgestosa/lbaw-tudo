<?php
use App\Models\Invite;
use App\Models\Label;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

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

// All API need to bee checked 
Route::middleware('auth:api')->get('/user', 'Auth\LoginController@getUser');

// Manage User
Route::post('/user', 'UserController@create');
Route::patch('/user/{id}', 'UserController@edit');
Route::delete('/user/{id}', 'UserController@delete');

// User Invites
Route::get('/user/{id}/invites/received','UserInvitesController@received');
Route::get('/user/{id}/invites/sent','UserInvitesController@sent');
Route::delete('/user/{userId}/invites/sent/{inviteId}','UserInvitesController@deleteSentInvite');
Route::post('user/{userId}/invites/{inviteId}', 'UserInvitesController@accept');
Route::delete('user/{userId}/invites/{inviteId}','UserInvitesController@decline');

// User bans
Route::post('/user/ban', 'BanController@create');
Route::get('/bans', 'BanController@get_all');

// Manage Project
Route::post('/project/{id}/board', 'BoardController@create');

// Project Invites
Route::get('project/{id}/invites','ProjectInvitesController@invites');
Route::post('project/{id}/invites','ProjectInvitesController@sendInvite');
Route::delete('project/{id}/invites','ProjectInvitesController@deleteInvite');

// Manage Verticals
Route::post('/board/{id}/vertical', 'VerticalController@create');

// Manage Tasks
Route::patch('/task/{id}', 'TaskController@edit');
Route::delete('/task/{id}', 'TaskController@delete');

// Full Text Search
Route::get('/search/users','FullTextSearchController@users');
Route::get('/search/projects','FullTextSearchController@projects');
Route::get('/search/tasks','FullTextSearchController@tasks');
Route::get('/search/labels','FullTextSearchController@lables');

