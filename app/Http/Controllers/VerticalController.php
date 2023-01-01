<?php

namespace App\Http\Controllers;

use App\Models\Vertical;
use Illuminate\Http\Request;

class VerticalController extends Controller
{

  public function showCreate($id)
  {
    return view('pages.add_vertical', ['id' => $id]);
  }

  public function create(Request $request)
  {
    $validate = $request->validate([
      'name' => 'required|string|max:255',
    ]);

    $name = $request->input('name');
    $board_id = $request->input('board_id');

    $vertical = Vertical::create([
      'name' => $name,
      'id_board' => $board_id,
    ]);

    return redirect('/board/'.$board_id);
  }

  public function markDone(Request $request)
  {
    $id = $request->input('id');
    $board_id = $request->input('board_id');

    $vertical = Vertical::findOrFail($id);
    $curr = $vertical->isdone;
    $vertical->isdone = !$curr;

    return redirect('/board/'.$board_id);
  }
}
