<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function show($id) {
      $project = Project::find($id);
      return view('partials.project.component', ['project'=>$project]);
    }
}
