<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
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
}
