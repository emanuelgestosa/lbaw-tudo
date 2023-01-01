<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Vertical;

use App\Events\NewTaskComment;

class TaskController extends Controller
{
    public function show($id)
    {
        event(new NewTaskComment("Miguel",14));
        $task = Task::find($id);
        return view('partials.task.component',['task'=>$task]);
    }

    public function showCreate($vertical_id)
    {
      $vertical = Vertical::find($vertical_id);
      return view('pages.add_task', ['vertical' => $vertical]);
    }

    public function edit(Request $request)
    {
      $id = $request->input('id');

      $task = Task::find($id);

      $task->name = $request->input('name');
      $task->description = $request->input('description');
      $task->due_date = $request->input('due_date');
      $task->save();
      return redirect('/task/' . $task->id);
    }

    public function delete(Request $request)
    {
      $id = $request->input('id');
      $task = Task::find($id);
      $task->delete();

      return redirect('/board/' . $request->input('board_id'));
    }

    public function add_task(Request $request, $vertical_id){

      $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'due_date' => 'nullable|date|after_or_equal:tomorrow'
      ]);

      $new_task = New Task();
      $new_task->id_vertical = $vertical_id;
      $new_task->id = Task::max('id') + 1;
      $new_task->name = $request->input('name');
      $new_task->description = $request->input('description');
      $new_task->due_date = $request->input('due_date');


      $new_task->save();

      return redirect('/board/'.Vertical::find($vertical_id)->id_board);
    }
}
