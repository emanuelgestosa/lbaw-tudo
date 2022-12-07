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

    public function create(Request $request){

      $request->validate([
        'title' => 'required',
        'description' => 'nullable',
      ]);

      $user = Auth::user();
      $new_project = New Project();
      $new_project->title = $request->input('title');
      $new_project->description = $request->input('description');
      $new_project->id_coordinator = $user->id;
      $new_project->save();
      $new_project->collaborators()->save(User::find($user->id));

      return redirect('/user/'. $user->id .'/projects');
    }
}
