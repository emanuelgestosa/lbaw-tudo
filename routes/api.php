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


Route::get('/user/{id}/invites/received','UserInvitesController@received');
Route::get('/user/{id}/invites/sent','UserInvitesController@sent');

Route::post('user/{userId}/invites/{inviteId}', 'UserInvitesController@accept');
Route::delete('user/{userId}/invites/{inviteId}','UserInvitesController@decline');


Route::get('project/{id}/invites',function ($id){
    $result = Project::find($id)->invites()->get();
    return response()->json($result);

});

Route::post('project/{id}/invites',function (Request $r,$id){
    $invitee = $r->input('id_invitee');
    $inviter = $r->input('id_inviter');
    $invite = Invite::create(
            ['id_invitee' => $invitee,
             'id_inviter' => $inviter,
             'id_project' => $id]);
    return response()->json(["success"=>true]);
});


Route::get('/search/users','FullTexSearch@users');

Route::get('/search/projects','FullTexSearch@projects');

Route::get('/search/tasks','FullTexSearch@tasks');

Route::get('/search/labels','FullTexSearch@lables');
