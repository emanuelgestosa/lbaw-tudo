<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    /**
     * Shows administration page.
     */
    public function show()
    {
      if (!Auth::check() || (
          Auth::check() &&
          empty(Administrator::where('id_users', Auth::user()->id)->get()->all()))) {
        return redirect('/');
      }
      return view('pages.administration');
    }

    public function showCreate()
    {
      if (!Auth::check() || (
          Auth::check() &&
          empty(Administrator::where('id_users', Auth::user()->id)->get()->all()))) {
        return redirect('/');
      }
      return view('pages.administrationCreate');
    }

    public function getJson($id) {
      $admin = Administrator::find($id);
      if (is_null($admin)) {
        return response()->json(['success' => false]);
      }
      $user = User::find($admin->id);
      if (is_null($user)) {
        return response()->json(['success' => false]);
      }
      return response()->json(['success' => true, 'user' => $user]);
    }
}
