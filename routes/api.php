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

Route::get('/search/users',function (Request $r){
    // Need to parse query
    $search=  $r->get('query');
    $maxItems=$r->get('maxItems',0);
    $result = User::search($search)->take($maxItems)->get();
    return response()
         ->json($result);

});

Route::get('/user/{id}/invites/received',function ($id){
    $result = User::find($id)->invitesReceived()->get();
    return response()->json($result);
});

Route::post('user/{userId}/invites/{inviteId}', function ($userId,$inviteId){
    // Needs checkign 
    $invite = Invite::find($inviteId);
    $invite->project()->first()->collaborators()->save(User::find($userId));
    $invite->delete();
    return response()->json();
    
});


Route::delete('user/{userId}/invites/{inviteId}', function ($userId,$inviteId){
    $invite = Invite::find($inviteId);
    $invite->delete();
    return response()->json();

});

Route::get('/user/{id}/invites/sent',function ($id){
    $result = User::find($id)->invitesSent()->get();
    return response()->json($result);
});

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

Route::post('/user', 'UserController@create');
