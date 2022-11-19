<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    /**
     * Shows user profile.
     */
    public function show($id)
    {
      return view('pages.user.profile', ['id' => $id]);
    }

    /**
     * Shows projects of a user.
     */
    public function showProjects($id)
    {
      $projects = [1, 2];
      return view('pages.user.projects', ['projects' => $projects]);
    }
}
