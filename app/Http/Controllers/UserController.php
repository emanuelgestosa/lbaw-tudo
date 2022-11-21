<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    /**
     * Shows edit profile page.
     */
    public function showEdit($id)
    {
      $user = User::find($id);
      return view('pages.user.edit', [
        'id' => $user->id,
        'username' => $user->username,
        'name' => $user->name,
        'email' => $user->email,
        'phone_number' => $user->phone_number,
      ]);
    }

    /**
     * Edits user profile
     */
    public function edit(Request $request)
    {
      $user = User::find($request->input('id'));
      $user->username = $request->input('username');
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->phone_number = $request->input('phone_number');
      $user->save();
      return UserController::show($user->id);
    }
}
