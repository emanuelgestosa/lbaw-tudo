<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Auth;

class ProjectController extends Controller
{
    public function show($id) {
      $project = Project::find($id);
      return view('pages.project.main', ['project'=>$project]);
    }

    public function invites($id){
      $project = Project::find($id);
      return view('pages.project.invites', ['project'=>$project]);
    }
    
    public function showCreate($user_id)
    {
      $user = Auth::user();
      return view('pages.project.create', ['user' => $user]);
    }

    public function toggle_favourite($project_id) {
      $user_id = Auth::id();
      $project = Project::find($project_id);
      $collab = $project->collaborators()->wherePivot('id_project', $project_id)->wherePivot('id_users', $user_id)->first();
      $project->collaborators()->wherePivot('id_project', $project_id)->wherePivot('id_users', $user_id)
      ->updateExistingPivot($user_id, array('favourite' => ! $collab->pivot->favourite), false);
        //return response()->json(["Message" => "Successufuly toggled favourite"],201);
       /* else {
          return response()->json(["Message" => "Collaborator not found"], 404);
      } */
      return view('pages.project.main', ['project'=>$project]);
  }

    public function create(Request $request){

      $request->validate([
        'title' => 'required',
        'description' => 'nullable',
      ]);

      $user = Auth::user();
      print_r($user->id);
      $new_project = New Project();
      $new_project->title = $request->input('title');
      $new_project->description = $request->input('description');
      $new_project->id_coordinator = $user->id;
      $new_project->save();
      $new_project->collaborators()->save(User::find($user->id));

      return redirect('/user/'. $user->id .'/projects');
    }
}
