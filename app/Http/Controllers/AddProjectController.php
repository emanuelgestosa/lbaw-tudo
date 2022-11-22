<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class AddProjectController extends Controller
{

    public function show($user_id)
    {
      $user = User::find($user_id);
      return view('pages.add_project', ['user' => $user]);
    }

    public function add_project(Request $request, $user_id){

      $new_project = New Project();
      $new_project->id = Project::max('id') + 1;
      $new_project->title = $request->input('title');
      $new_project->description = $request->input('description');
      $new_project->id_coordinator = $user_id;
      $new_project->save();
      $new_project->collaborators()->save(User::find($user_id));

      return redirect('/user/'. $user_id .'/projects');
    }
}
