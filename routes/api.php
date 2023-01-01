<?php

use App\Events\NewTaskComment;
use App\Models\Comment;
use App\Models\Invite;
use App\Models\Label;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\Cursor;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;

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
Route::get('/user/{id}/json', 'UserController@getJson');
Route::get('/admin/{id}/json', 'AdminController@getJson');

// User Invites
Route::get('/user/{id}/invites/received', 'UserInvitesController@received');
Route::get('/user/{id}/invites/sent', 'UserInvitesController@sent');
Route::delete('/user/{userId}/invites/sent/{inviteId}', 'UserInvitesController@deleteSentInvite');
Route::post('user/{userId}/invites/{inviteId}', 'UserInvitesController@accept');
Route::delete('user/{userId}/invites/{inviteId}', 'UserInvitesController@decline');

// User bans
Route::post('/user/ban', 'BanController@create');
Route::get('/bans', 'BanController@get_all');
Route::delete('/bans', 'BanController@remove');

// Manage Project
Route::post('/project/{id}/board', 'BoardController@create');

// Project Invites
Route::get('project/{id}/invites', 'ProjectInvitesController@invites');
Route::post('project/{id}/invites', 'ProjectInvitesController@sendInvite');
Route::delete('project/{id}/invites', 'ProjectInvitesController@deleteInvite');

// Manage Verticals
Route::post('/board/{id}/vertical', 'VerticalController@create');

// Manage Tasks
Route::patch('/task/{id}', 'TaskController@edit');
Route::delete('/task/{id}', 'TaskController@delete');
Route::post('/task/set_col', 'TaskController@setCol');

// Task Comments
Route::post('/task/{id}/comments', function (Request $r, $id) {
    $task = Task::find($id);
    if ($task) {
        $message = $r->input("msg");
        $sentDate = $r->input("sent_date");
        $idSent = $r->input("id_users");
        $newComment = new Comment();
        $newComment->msg = $message;
        $newComment->id_users = $idSent;
        $newComment->sent_date = $sentDate;
        $newComment->id_task = $id;
        $newComment->save();
        $newComment["user"] = $newComment->user()->first(); 
        $event = new NewTaskComment(json_encode($newComment),$id);
        event($event);
        return response()->json(["Message" => "Successufuly Commented","u"=>$newComment], 201);
    } else {
        return response()->json(["Message" => "Task Not Found"], 404);
    }
});
Route::get('/task/{id}/comments', function (Request $r, $id) {
    $task = Task::find($id);
    if ($task) {
        $lastComment = $r->input('lastComment');
        if ($lastComment !== null) {
            $comments = $task->comments()->orderby('sent_date', 'DESC')->where('id', '>', $lastComment)->get()->all();
            $commentArray =  [];
            foreach ($comments as $key => $comment) {
                $commentArray[$key] = $comment;
                $commentArray[$key]["user"] = $comment->user()->first();
            }
            return response()->json($commentArray, 200);
        } else {
            $cursor = $r->input('cursor');
            if ($cursor) {
                $comments =$task->comments()
                    ->where('id', '<',  Cursor::fromEncoded($cursor)->parameters(["id"]))
                    ->orderby('id','DESC')
                    ->cursorPaginate(3);
            }
            $comments = $task->comments()
                ->orderby('id','DESC')->cursorPaginate(3);
            $commentArray =  [];
            foreach ($comments->items() as $key => $comment) {
                $commentArray[$key] = $comment;
                $commentArray[$key]["user"] = $comment->user()->first();
            }
            return response()->json($comments, 200);
        }
    } else {
        return response()->json(["Message" => "Task Not Found"], 404);
    }
});

// Full Text Search
Route::get('/search/users', 'FullTextSearchController@users');
Route::get('/search/projects', 'FullTextSearchController@projects');
Route::get('/search/tasks', 'FullTextSearchController@tasks');
Route::get('/search/labels', 'FullTextSearchController@lables');
