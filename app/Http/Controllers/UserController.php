<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Administrator;
use Auth;

class UserController extends Controller
{

    /**
     * Checks if currently authenticated user
     * has permissions to manage user of $id .
     */
    private function hasPerms($id)
    {
      if (!Auth::check() || (
          Auth::check() &&
          Auth::user()->id != $id &&
          empty(Administrator::where('id_users', Auth::user()->id)->get()->all()))) {
        return false;
      }
      return true;
    }

    /**
     * Shows user profile.
     */
    public function show($id)
    {
      if (!Auth::check()) {
        return redirect('/');
      }

      $user = User::find($id);

      if (is_null($user)) {
        return redirect('/');
      }

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
      if (!UserController::hasPerms($id)) {
        return redirect('/user/'.$id);
      }
      
      $projects = User::find($id)->projects;
      return view('pages.user.projects', ['projects' => $projects, 'user_id' => $id]);
    }

    /**
     * Shows edit profile page.
     */
    public function showEdit($id)
    {
      if (!UserController::hasPerms($id)) {
        return redirect('/user/'.$id);
      }

      $user = User::find($id);

      if (is_null($user)) {
        return redirect('/');
      }

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
      $id = $request->input('id');
      if (!UserController::hasPerms($id)) {
        return redirect('/user/'.$id);
      }

      $user = User::find($id);

      if (is_null($user)) {
        return redirect('/');
      }

      $user->username = $request->input('username');
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->phone_number = $request->input('phone_number');
      $user->save();
      return redirect('/user/' . $user->id);
    }

    public function delete(Request $request)
    {
      $id = $request->input('id');
      if (!UserController::hasPerms($id)) {
        return redirect('/user/'.$id);
      }

      $user = User::find($id);

      if (is_null($user)) {
        return redirect('/');
      }

      $user->delete();

      return redirect('/');
    }

    public function create(Request $request)
    {
      if (!Auth::check() || (
          Auth::check() &&
          empty(Administrator::where('id_users', Auth::user()->id)->get()->all()))) {
        return redirect('/');
      }

      $validate = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'phone_number' => 'string||max:255',
        'password' => 'required|string|min:6|confirmed',
      ]);

      $username = $request->input('username');
      $name = $request->input('name');
      $email = $request->input('email');
      $phone_number = $request->input('phone_number');
      $password = $request->input('password');
      $user = User::create([
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'phone_number' => $phone_number,
        'password' => bcrypt($password),
      ]);

      if (is_null($user)) {
        return redirect('/');
      }

      return redirect('/user/' . $user->id);
    }
}
