<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    /**
     * Shows the homepage.
     */
    public function show()
    {
      if (!Auth::check()) {
        return view('pages.static.home');
      } else {
        $user = Auth::user();

        return view('pages.user.profile', [
          'id' => $user->id,
          'username' => $user->username,
          'name' => $user->name,
          'email' => $user->email,
          'phone_number' => $user->phone_number,
        ]);
      }
    }
}


