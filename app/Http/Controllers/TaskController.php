<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Vertical;
use Illuminate\Pagination\Cursor;
use App\Events\NewTaskComment;

class TaskController extends Controller
{
    public function show($id)
    {
        $task = Task::find($id);
        return view('partials.task.component', ['task' => $task]);
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

    public function setCol(Request $request)
    {
        $requestjson = json_decode($request->getContent(), true);

        $id = $requestjson['id'];
        $vertical_id = $requestjson['vertical_id'];

        $task = Task::find($id);
        $task->id_vertical = $vertical_id;
        $task->save();
    }

    public function setOrder(Request $request)
    {
        $requestjson = json_decode($request->getContent(), true);

        $id = $requestjson['id'];
        $order = $requestjson['order'];

        $task = Task::find($id);
        $task->order_vertical = $order;
        $task->save();
    }


    public function add_task(Request $request, $vertical_id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date|after_or_equal:tomorrow'
        ]);

        $tasks = Task::where('id_vertical', '=', $vertical_id)->max('order_vertical') + 1;

        $new_task = new Task();
        $new_task->id_vertical = $vertical_id;
        $new_task->name = $request->input('name');
        $new_task->description = $request->input('description');
        $new_task->due_date = $request->input('due_date');
        $new_task->order_vertical = $tasks;


        $new_task->save();

        return redirect('/board/' . Vertical::find($vertical_id)->id_board);
    }
    public function getComments(Request $r, $id)
    {
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
                    $comments = $task->comments()
                        ->where('id', '<',  Cursor::fromEncoded($cursor)->parameters(["id"]))
                        ->orderby('id', 'DESC')
                        ->cursorPaginate(3);
                }
                $comments = $task->comments()
                    ->orderby('id', 'DESC')->cursorPaginate(3);
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
    }
    public function postComments(Request $r, $id)
    {
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
            $event = new NewTaskComment(json_encode($newComment), $id);
            event($event);
            return response()->json(["Message" => "Successufuly Commented", "u" => $newComment], 201);
        } else {
            return response()->json(["Message" => "Task Not Found"], 404);
        }
    }
}
