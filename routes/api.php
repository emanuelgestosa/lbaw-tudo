<?php

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

Route::middleware('auth:api')->get('/user', 'Auth\LoginController@getUser');

Route::get('/search/users',function (Request $r){
    // Need to parse query
    $search=  $r->get('query');
    $maxItems=$r->get('maxItems',0);
    $result = User::search($search)->take($maxItems)->get();
    return response()
         ->json($result);

});

Route::get('/search/projects',function (Request $r){
    $search=  $r->get('query');
    $maxItems=$r->get('maxItems',0);
    $result = Project::search($search)->take($maxItems)->get();
    return response()
         ->json($result);

});


Route::get('/search/tasks',function (Request $r){
    $search=  $r->get('query');
    $maxItems=$r->get('maxItems',0);
    $result = Task::search($search)->take($maxItems)->get();
    return response()
         ->json($result);

});

Route::get('/search/labels',function (Request $r){
    $search=  $r->get('query');
    $maxItems=$r->get('maxItems',0);
    $result = Label::search($search)->take($maxItems)->get();
    return response()
         ->json($result);

});
