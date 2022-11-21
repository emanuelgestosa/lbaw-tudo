<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    //
    public function show($id){
      $board = Board::find($id);
      return view('partials.board.component',['board'=>$board]);
    }
}
