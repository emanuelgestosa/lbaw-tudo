<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Shows user profile.
     */
    public function show($id)
    {
      $user = User::find($id);
      return view('pages.user.profile', [
        'id' => $user->id,
        'username' => $user->username,
        'name' => $user->name,
        'email' => $user->email,
        'phone_number' => $user->phone_number,
      ]);
    }

    /**
     * Shows projects of a user.
     */
    public function showProjects($id)
    {
      $projects = User::find($id)->projects;
      return view('pages.user.projects', ['projects' => $projects]);
    }
}
