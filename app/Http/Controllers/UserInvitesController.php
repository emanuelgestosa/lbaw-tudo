<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Invite;

class UserInvitesController extends Controller
{
    public static function received($id)
    {
        $result = User::find($id)->invitesReceived()->get();
        return response()->json($result, 200);
    }
    public static function sent($id)
    {
        $result = User::find($id)->invitesSent()->get();
        return response()->json($result);
    }
    public static function accept($userId, $inviteId)
    {
        $invite = Invite::find($inviteId);
        $invite->project()->first()->collaborators()->save(User::find($userId));
        $invite->delete();
        return response()->json(201);
    }
    public static function decline($userId, $inviteId)
    {
        $invite = Invite::find($inviteId);
        $invite->delete();
        return response()->json();
    }
}
