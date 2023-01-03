<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Administrator;
use Auth;
use Storage;
use Illuminate\Support\Facades\Validator;

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

      if (Storage::disk('public')->exists("/profile_pics/".$user->id)) {
        $contents = Storage::get("/profile_pics/".$user->id);
    }
      return view('pages.user.profile', [
        'id' => $user->id,
        'username' => $user->username,
        'name' => $user->name,
        'email' => $user->email,
        'phone_number' => $user->phone_number,
      ]);
    }

    public function showBan($id)
    {
      if (!Auth::check() || (
          Auth::check() &&
          empty(Administrator::where('id_users', Auth::user()->id)->get()->all()))) {
        return redirect('/user/'.$id);
      }
      return view('pages.user.ban', ['id_users' => $id, 'id_administrator' => Auth::id()]);
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
      return view('pages.user.projects', ['projects' => $projects, 'user' => User::find($id)]);
    }

    public function showFavourites($id)
    {
      if (!UserController::hasPerms($id)) {
        return redirect('/user/'.$id);
      }
      
      $all_projects = User::find($id)->projects;
      $favourites = [];
      foreach($all_projects as $project){
        if($project->collaborators()->wherePivot('id_users', $id)->first()->pivot->favourite == true){
          $favourites[] = $project;
        }
      }
      return view('pages.user.my_favourites', ['projects' => $favourites, 'user' => User::find($id)]);
    }

    /**
     * Shows invites of a user.
     */
    public function showInvites($id)
    {
      if (!UserController::hasPerms($id)) {
        return redirect('/user/'.$id);
      }
      
      $invites = User::find($id)->invitesReceived;
      return view('pages.user.invites', ['invites' => $invites, 'user' => User::find($id)]);
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
      $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'due_date' => 'nullable|date|after_or_equal:tomorrow',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
      ]);

      $user = User::find($id);

      if (is_null($user)) {
        return redirect('/');
      }

      $user->username = $request->input('username');
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->phone_number = $request->input('phone_number');
      
      if($request->file('profile_pic') != NULL){
        $file_content = $request->file('profile_pic')->get();
        $path = "/profile_pics/".$id;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        if(!Storage::disk('public')->put($path, $file_content)) {
          return false;
        }
    }
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

      $requestjson = json_decode($request->getContent(), true);
      $validator = Validator::make($requestjson, [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'phone_number' => 'string||max:255',
        'password' => 'required|string|min:6|confirmed',
      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false,
          'error' => $validator->messages()]);
      }


      $username = $requestjson['username'];
      $name = $requestjson['name'];
      $email = $requestjson['email'];
      $phone_number = $requestjson['phone_number'];
      $password = $requestjson['password'];
      $user = User::create([
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'phone_number' => $phone_number,
        'password' => bcrypt($password),
      ]);

      return response()->json(['success' => true]);
    }

    public function getJson($id) {
      $user = User::find($id);
      if (is_null($user)) {
        return response()->json(['success' => false]);
      }
      return response()->json(['success' => true, 'user' => $user]);
    }
}
