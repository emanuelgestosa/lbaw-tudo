<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Ban;
use App\Models\User;
use App\Models\Administrator;
use Auth;

class BanController extends Controller
{
  // public function create(Request $request) {
  //   $requestjson = json_decode($request->getContent(), true);
  //   $user = $requestjson['id_users'];
  //   $admin =  $requestjson['id_administrator'];
  //   $end_date = $requestjson['end_date'];
  //   $reason = $requestjson['reason'];
  //   $ban = Ban::create([
  //     'id_users' => $user,
  //     'id_administrator' => $admin,
  //     'end_date' => $end_date,
  //     'reason' => $reason,
  //     'start_date' => date("Y-m-d"),
  //   ]);
  //   return response()->json(['success' => true]);
  // }

  public function create(Request $request)
  {
    $id_admin = Administrator::where('id_users', '=', $request->input('id_administrator'))->first()->id;
    $ban = Ban::create([
      'start_date' => date('Y-m-d'),
      'id_users' => $request->input('id_users'),
      'id_administrator' => $id_admin,
      'end_date' => $request->input('end_date'),
      'reason' => $request->input('reason'),
    ]);
    return redirect('/admins');
  }

  public function get_all()
  {
    return Ban::all();
  }

  public function remove(Request $request)
  {
    $requestjson = json_decode($request->getContent(), true);
    $id = $requestjson['id'];
    $ban = Ban::find($id);

    if (is_null($ban)) {
      return response()->json(['sucess' => false]);
    }

    $ban->delete();
    return response()->json(['sucess' => true]);
  }
}
