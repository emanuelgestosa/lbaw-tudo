<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Invite;

class UserInvitesController extends Controller
{
    public static function received($id)
    {
        $user= User::find($id);
        if($user){
            $result = $user->invitesReceived()->get();
            return response()->json($result, 200);
        }
        else{
            return response()->json(["Message"=>"User not found"],404);
        }
    }
    public static function sent($id)
    {
        $user= User::find($id);
        if($user){
            $result = $user->invitesSent()->get();
            return response()->json($result, 200);
        }
        else{
            return response()->json(["Message"=>"User not found"],404);
        }
    }
    public static function accept($userId, $inviteId)
    {
        $invite = Invite::find($inviteId);
        if ($invite) {
            $invite->project()->first()->collaborators()->save(User::find($userId));
            $invite->delete();
            return response()->json(["Message" => "Accepted Invite"], 201);
        } else {
            return response()->json(["Message" => "Invite is no longer available"], 404);
        }
    }
    public static function decline($userId, $inviteId)
    {
        $invite = Invite::find($inviteId);
        if ($invite) {
            $invite->delete();
            return response()->json(["Message" => "Declined Invite"], 200);
        } else {
            return response()->json(["Message" => "Invite is no longer available"], 404);
        }
    }

    public static function deleteSentInvite($userId,$inviteId)
    {
        $invite = Invite::find('id', $inviteId);
        if ($invite) {
            if ($invite->id_inviter != $userId) {
                return response()->json(["Message" => "User Did Not Sent This Invite"], 405);
            } else {
                $invite->delete();
                return response()->json(["Message" => "Successefully Removed Invite"], 200);
            }
        } else {
            return response()->json(["Message" => "Invite Does Not Exists"], 404);
        }
    }
}
