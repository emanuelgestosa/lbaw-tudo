<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
  /**
   * Display board page
   */
  public function show($id)
  {
    $board = Board::find($id);
    return view('partials.board.component',['board'=>$board]);
  }

  public function showCreate($id)
  {
    return view('pages.add_board', ['id' => $id]);
  }

  public function create(Request $request)
  {
    $validate = $request->validate([
      'name' => 'required|string|max:255',
    ]);

    $name = $request->input('name');
    $project_id = $request->input('project_id');

    $board = Board::create([
      'name' => $name,
      'id_project' => $project_id,
    ]);

    return redirect('/project/'.$project_id);
  }
}
