<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function show($id) {
      $task = Task::find($id);
      return view('partials.task.component',['task'=>$task]);
    }
}
